/**
 * Cloudflare Pages Function for Contact & Free Trial Inquiries
 * Handles POST requests to /api/contact
 */
export async function onRequestPost({ request, env }) {
  try {
    const contentType = request.headers.get("content-type") || "";
    let data = {};

    const allowedFields = new Set(["name", "email", "phone", "subject", "message", "_gotcha"]);
    if (contentType.includes("application/json")) {
      const body = await request.json();
      for (const field of allowedFields) {
        if (typeof body?.[field] === "string") data[field] = body[field];
      }
    } else {
      const formData = await request.formData();
      for (const [key, value] of formData.entries()) {
        if (allowedFields.has(key) && typeof value === "string") data[key] = value;
      }
    }

    // 1. Spam Honeypot Protection
    if (data._gotcha || data.bot_field) {
      // Silently accept without processing spam bot
      return new Response(JSON.stringify({ success: true, message: "Inquiry received." }), {
        headers: { "Content-Type": "application/json" }
      });
    }

    // 2. Extract and Sanitize Fields
    const name = (data.name || "").toString().trim();
    const email = (data.email || "").toString().trim();
    const phone = (data.phone || "").toString().trim();
    const subject = (data.subject || "Cricket Training Inquiry").toString().trim();
    const message = (data.message || "").toString().trim();
    const tooLong = name.length > 100 || email.length > 254 || phone.length > 20 || subject.length > 120 || message.length > 2000;

    if (tooLong) {
      return json({ success: false, error: "Please shorten one or more fields and try again." }, 400);
    }

    // 3. Validation
    if (!name || name.length < 2) {
      return json({ success: false, error: "Please enter your full name (minimum 2 characters)." }, 400);
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailRegex.test(email)) {
      return json({ success: false, error: "Please enter a valid email address." }, 400);
    }

    const phoneRegex = /^[0-9+\s()\-]{8,20}$/;
    if (!phone || !phoneRegex.test(phone)) {
      return json({ success: false, error: "Please enter a valid phone number (minimum 8 digits)." }, 400);
    }

    // 4. Log or Store if Cloudflare KV/D1 is configured
    // If env.CONTACTS_KV or env.DB exists in Cloudflare Pages dashboard:
    const submission = {
      id: createSubmissionId(),
      name,
      email,
      phone,
      subject,
      message,
      submittedAt: new Date().toISOString(),
      userAgent: request.headers.get("user-agent") || ""
    };

    if (!env?.CONTACTS_KV) {
      return json({ success: false, error: "The enquiry service is not configured yet. Please call or WhatsApp the academy instead." }, 503);
    }

    try {
      const clientAddress = request.headers.get("CF-Connecting-IP") || "unknown";
      const rateKey = `contact-rate:${await hashValue(clientAddress)}:${Math.floor(Date.now() / 3600000)}`;
      const attempts = Number(await env.CONTACTS_KV.get(rateKey)) || 0;
      if (attempts >= 5) {
        return json({ success: false, error: "Too many enquiries were sent from this connection. Please wait and try again later." }, 429);
      }
      await env.CONTACTS_KV.put(rateKey, String(attempts + 1), { expirationTtl: 3600 });
      await env.CONTACTS_KV.put(`inquiry:${submission.id}`, JSON.stringify(submission));
    } catch (kvErr) {
      console.error("Contact storage error:", kvErr);
      return json({ success: false, error: "We could not store your enquiry. Please call or WhatsApp the academy instead." }, 503);
    }

    // 5. Handle Response
    const isAjax = request.headers.get("accept")?.includes("application/json") ||
                   request.headers.get("x-requested-with") === "XMLHttpRequest" ||
                   contentType.includes("application/json");

    if (!isAjax) {
      // Native browser form submission fallback redirect
      return Response.redirect(new URL("/contact?submitted=1", request.url), 303);
    }

    return json({
      success: true,
      message: "Thank you. Your enquiry has been received. The academy will contact you using the details provided."
    });

  } catch (err) {
    return json({
      success: false,
      error: "An unexpected error occurred while processing your request. Please call or WhatsApp us at +91 99105 43666."
    }, 500);
  }
}

function json(body, status = 200) {
  return new Response(JSON.stringify(body), {
    status,
    headers: { "Content-Type": "application/json", "Cache-Control": "no-store" }
  });
}

async function hashValue(value) {
  try {
    if (globalThis.crypto?.subtle) {
      const bytes = new TextEncoder().encode(value);
      const digest = await globalThis.crypto.subtle.digest("SHA-256", bytes);
      return Array.from(new Uint8Array(digest), (byte) => byte.toString(16).padStart(2, "0")).join("");
    }
  } catch (error) {
    // Fall through to the deterministic local hash below. Rate limiting must
    // not make a valid enquiry fail when a runtime lacks Web Crypto support.
  }

  let hash = 2166136261;
  for (let index = 0; index < value.length; index += 1) {
    hash ^= value.charCodeAt(index);
    hash = Math.imul(hash, 16777619);
  }
  return `fallback-${(hash >>> 0).toString(16)}`;
}

function createSubmissionId() {
  return `inquiry-${Date.now()}-${Math.random().toString(36).slice(2, 12)}`;
}

export async function onRequestGet({ request }) {
  return new Response(JSON.stringify({ status: "healthy", endpoint: "/api/contact" }), {
    headers: { "Content-Type": "application/json" }
  });
}
