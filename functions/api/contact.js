/**
 * YSCA website enquiry endpoint (Cloudflare Pages Functions).
 * Persists first, then attempts manager + parent notification via SMTP2GO.
 * Credentials are configured as encrypted Cloudflare secrets, never in the repository.
 */
const ACADEMY_EMAIL = "contact@youngstarcricketacademy.com";
const MAX_BODY = 12000;
const ALLOWED_FIELDS = ["name", "email", "phone", "subject", "message", "_gotcha"];
const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function reply(body, status = 200) {
  return new Response(JSON.stringify(body), {
    status,
    headers: {
      "Content-Type": "application/json; charset=utf-8",
      "Cache-Control": "no-store",
      "X-Content-Type-Options": "nosniff"
    }
  });
}
function clean(value) {
  return typeof value === "string" ? value.trim() : "";
}
function safeHeader(value) {
  return clean(value).replace(/[\r\n\x00-\x1f\x7f]/g, " ").slice(0, 120);
}
function htmlEscape(value) {
  return String(value).replace(/[&<>"']/g, ch => ({
    "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;"
  }[ch]));
}
function sameOrigin(request) {
  const origin = request.headers.get("Origin");
  const site = request.headers.get("Sec-Fetch-Site");
  if (site === "cross-site") return false;
  return !origin || origin === new URL(request.url).origin;
}
async function sha256(input) {
  const bytes = new TextEncoder().encode(input);
  const hash = await crypto.subtle.digest("SHA-256", bytes);
  return Array.from(new Uint8Array(hash), x => x.toString(16).padStart(2, "0")).join("");
}
async function parseFields(request) {
  const contentType = request.headers.get("content-type") || "";
  const data = {};
  if (contentType.includes("application/json")) {
    const body = await request.json();
    if (!body || typeof body !== "object" || Array.isArray(body)) throw new Error("Invalid form");
    for (const field of ALLOWED_FIELDS) data[field] = clean(body[field]);
  } else if (contentType.includes("application/x-www-form-urlencoded") || contentType.includes("multipart/form-data")) {
    const body = await request.formData();
    for (const field of ALLOWED_FIELDS) data[field] = clean(body.get(field));
  } else {
    throw new Error("Unsupported form format");
  }
  return data;
}
async function storeD1(env, submission, rateHash) {
  if (!env?.DB) return false;
  const now = Math.floor(Date.now() / 1000);
  const windowStart = Math.floor(now / 3600);
  // D1 schema must be installed first: database/ysca_contact_enquiries.sql.
  const rateKey = rateHash + ":" + windowStart;
  const limited = await env.DB.prepare(
    "INSERT INTO ysca_enquiry_rate (rate_key, attempts, expires_at) VALUES (?, 1, ?) " +
    "ON CONFLICT(rate_key) DO UPDATE SET attempts = attempts + 1"
  ).bind(rateKey, now + 7200).run();
  if (!limited.success) throw new Error("Rate limit storage failed");
  const count = await env.DB.prepare("SELECT attempts FROM ysca_enquiry_rate WHERE rate_key = ?")
    .bind(rateKey).first();
  if ((count?.attempts || 0) > 5) return "rate_limited";
  const stored = await env.DB.prepare(
    "INSERT INTO ysca_contact_enquiries (id, name, email, phone, subject, message, submitted_at, status) " +
    "VALUES (?, ?, ?, ?, ?, ?, ?, 'new')"
  ).bind(submission.id, submission.name, submission.email, submission.phone, submission.subject,
    submission.message, submission.submittedAt).run();
  if (!stored.success) throw new Error("Enquiry not stored");
  return true;
}
async function storeKV(env, submission, rateHash) {
  if (!env?.CONTACTS_KV) return false;
  const key = "contact-rate:" + rateHash + ":" + Math.floor(Date.now() / 3600000);
  const attempts = Number(await env.CONTACTS_KV.get(key)) || 0;
  if (attempts >= 5) return "rate_limited";
  await env.CONTACTS_KV.put(key, String(attempts + 1), { expirationTtl: 3600 });
  await env.CONTACTS_KV.put("inquiry:" + submission.id, JSON.stringify(submission));
  return true;
}
async function persist(env, submission, rateHash) {
  if (env?.DB) {
    try {
      return await storeD1(env, submission, rateHash);
    } catch (error) {
      console.error("D1 enquiry storage unavailable:", String(error));
      // Retain legacy KV storage when the D1 migration has not been applied yet.
      if (!env?.CONTACTS_KV) throw error;
    }
  }
  return storeKV(env, submission, rateHash);
}
async function sendMail(env, to, subject, body, replyTo) {
  if (!env?.SMTP2GO_API_KEY) return { skipped: true };
  const payload = {
    sender: "Young Star Cricket Academy <" + ACADEMY_EMAIL + ">",
    to: [to],
    subject,
    text_body: body
  };
  if (replyTo) payload.custom_headers = [{ header: "Reply-To", value: replyTo }];
  const response = await fetch("https://api.smtp2go.com/v3/email/send", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json",
      "X-Smtp2go-Api-Key": env.SMTP2GO_API_KEY
    },
    body: JSON.stringify(payload),
    signal: AbortSignal.timeout(10000)
  });
  const result = await response.json();
  if (!response.ok || (result?.data?.failed || 0) > 0 || (result?.data?.succeeded || 0) < 1) {
    throw new Error("SMTP2GO request not accepted");
  }
  return { accepted: true };
}
async function notify(env, submission) {
  if (!env?.SMTP2GO_API_KEY) return;
  const managerBody = [
    "New academy enquiry", "",
    "Reference: " + submission.id,
    "Name: " + submission.name,
    "Email: " + submission.email,
    "Phone: " + submission.phone,
    "Enquiry: " + submission.subject,
    "", "Message:", submission.message || "(no message)", "",
    "Received: " + submission.submittedAt,
    "", "Reply to the parent directly or call the supplied phone number."
  ].join("\n");
  const parentBody = [
    "Hello " + submission.name + ",", "",
    "Thank you for contacting Young Star Cricket Academy.",
    "We have received your enquiry and will contact you using the details you provided.",
    "", "Enquiry reference: " + submission.id,
    "Topic: " + submission.subject, "",
    "Young Star Cricket Academy",
    "Malakpur, Greater Noida, Uttar Pradesh",
    "Phone / WhatsApp: +91 98917 85053",
    "Email: " + ACADEMY_EMAIL,
    "Website: https://youngstarcricketacademy.com/",
    "", "If you did not submit this enquiry, you can ignore this message."
  ].join("\n");
  const results = await Promise.allSettled([
    sendMail(env, ACADEMY_EMAIL,
      "New academy enquiry: " + safeHeader(submission.subject), managerBody, submission.email),
    sendMail(env, submission.email, "We received your enquiry | Young Star Cricket Academy", parentBody)
  ]);
  for (let i = 0; i < results.length; i++) {
    if (results[i].status === "rejected") {
      console.error(i === 0 ? "Manager notification failed" : "Parent confirmation failed",
        String(results[i].reason));
    }
  }
}
export async function onRequestPost({ request, env, waitUntil }) {
  try {
    if (!sameOrigin(request)) return reply({ success: false, error: "Invalid submission origin." }, 403);
    const size = Number(request.headers.get("content-length") || 0);
    if (size > MAX_BODY) return reply({ success: false, error: "Form submission is too large." }, 413);
    let data;
    try { data = await parseFields(request); }
    catch (_) { return reply({ success: false, error: "Invalid form submission." }, 400); }
    if (data._gotcha) return reply({ success: true, message: "Inquiry received." });
    const name = data.name, email = data.email, phone = data.phone;
    const subject = data.subject || "Cricket Training Enquiry";
    const message = data.message || "";
    if (name.length < 2 || name.length > 100 || !emailPattern.test(email) ||
        email.length > 254 || !/^[0-9+\s()\-]{8,20}$/.test(phone) ||
        subject.length > 120 || message.length > 2000) {
      return reply({ success: false, error: "Please check the enquiry fields and try again." }, 400);
    }
    const submission = {
      id: crypto.randomUUID(), name, email, phone, subject, message,
      submittedAt: new Date().toISOString()
    };
    const ip = request.headers.get("CF-Connecting-IP") || "unknown";
    const rateHash = await sha256((env?.YSCA_ENQUIRY_RATE_SALT || "ysca-enquiry") + ":" + ip);
    let stored;
    try { stored = await persist(env, submission, rateHash); }
    catch (error) {
      console.error("Enquiry persist failed", String(error));
      return reply({ success: false, error: "The enquiry service is unavailable. Please call or WhatsApp +91 98917 85053." }, 503);
    }
    if (stored === "rate_limited") {
      return reply({ success: false, error: "Too many enquiries. Please try again later." }, 429);
    }
    if (!stored) {
      return reply({ success: false, error: "The enquiry service is not configured. Please call or WhatsApp +91 98917 85053." }, 503);
    }
    const task = notify(env, submission).catch(error => console.error("Email notifications failed", String(error)));
    if (typeof waitUntil === "function") waitUntil(task);
    else await task;
    const jsonRequest = (request.headers.get("accept") || "").includes("application/json") ||
      (request.headers.get("content-type") || "").includes("application/json") ||
      request.headers.get("x-requested-with") === "XMLHttpRequest";
    if (!jsonRequest) return Response.redirect(new URL("/contact?submitted=1", request.url), 303);
    return reply({ success: true, message: "Thank you. Your enquiry has been received. We will contact you soon." });
  } catch (error) {
    console.error("Enquiry endpoint error", String(error));
    return reply({ success: false, error: "Please call or WhatsApp the academy at +91 98917 85053." }, 500);
  }
}
export async function onRequestGet() {
  return reply({ status: "healthy", endpoint: "/api/contact" });
}
