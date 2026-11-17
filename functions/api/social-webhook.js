/**
 * Cloudflare Pages Function: /api/social-webhook
 * Receives automated syndication payloads from https://manager.youngstarcricketacademy.com/
 * and dispatches to connected social networks (Telegram Bot API, Make.com / Zapier / Buffer).
 */

function json(data, status = 200) {
  return new Response(JSON.stringify(data), {
    status,
    headers: {
      "Content-Type": "application/json",
      "Access-Control-Allow-Origin": "https://manager.youngstarcricketacademy.com",
      "Access-Control-Allow-Methods": "POST, OPTIONS",
      "Access-Control-Allow-Headers": "Content-Type, Authorization"
    }
  });
}

export async function onRequestOptions() {
  return new Response(null, {
    status: 204,
    headers: {
      "Access-Control-Allow-Origin": "https://manager.youngstarcricketacademy.com",
      "Access-Control-Allow-Methods": "POST, OPTIONS",
      "Access-Control-Allow-Headers": "Content-Type, Authorization"
    }
  });
}

export async function onRequestPost({ request, env }) {
  try {
    // 1. Authenticate Request
    const authHeader = request.headers.get("Authorization") || "";
    const expectedSecret = env.MANAGER_WEBHOOK_SECRET;

    if (expectedSecret && authHeader !== `Bearer ${expectedSecret}`) {
      return json({ success: false, error: "Unauthorized: Invalid or missing API secret." }, 401);
    }

    // 2. Parse Body
    let payload;
    try {
      payload = await request.json();
    } catch {
      return json({ success: false, error: "Malformed JSON payload." }, 400);
    }

    const {
      title = "Young Star Cricket Academy Update",
      content = "",
      imageUrl = "",
      url = "https://youngstarcricketacademy.com/",
      tags = ["CricketCoaching", "GreaterNoida", "YSCA"]
    } = payload;

    const results = {
      telegram: null,
      make_hub: null,
      kv_stored: false
    };

    const hashtagStr = tags.map(t => `#${t.replace(/[^a-zA-Z0-9]/g, '')}`).join(" ");
    const fullCaption = `${title}\n\n${content}\n\n📍 Young Star Cricket Academy, Malakpur, Greater Noida\n🌐 ${url}\n\n${hashtagStr}`.trim();

    // 3. Dispatch to Telegram Channel (if credentials provided)
    if (env.TELEGRAM_BOT_TOKEN && env.TELEGRAM_CHAT_ID) {
      try {
        const tgEndpoint = imageUrl
          ? `https://api.telegram.org/bot${env.TELEGRAM_BOT_TOKEN}/sendPhoto`
          : `https://api.telegram.org/bot${env.TELEGRAM_BOT_TOKEN}/sendMessage`;

        const tgBody = imageUrl
          ? {
              chat_id: env.TELEGRAM_CHAT_ID,
              photo: imageUrl,
              caption: fullCaption.slice(0, 1024),
              parse_mode: "HTML"
            }
          : {
              chat_id: env.TELEGRAM_CHAT_ID,
              text: fullCaption.slice(0, 4096),
              parse_mode: "HTML"
            };

        const tgRes = await fetch(tgEndpoint, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(tgBody)
        });
        results.telegram = await tgRes.json();
      } catch (tgErr) {
        results.telegram = { success: false, error: tgErr.message };
      }
    }

    // 4. Forward to Make.com / Zapier / Buffer Webhook for Meta, GBP, X & LinkedIn
    if (env.MAKE_WEBHOOK_URL) {
      try {
        const makeRes = await fetch(env.MAKE_WEBHOOK_URL, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            title,
            content,
            caption: fullCaption,
            imageUrl,
            url,
            tags,
            timestamp: new Date().toISOString()
          })
        });
        results.make_hub = { status: makeRes.status, ok: makeRes.ok };
      } catch (makeErr) {
        results.make_hub = { success: false, error: makeErr.message };
      }
    }

    // 5. Optionally Cache in Cloudflare KV (for live announcements on homepage)
    if (env.ANNOUNCEMENTS_KV) {
      try {
        await env.ANNOUNCEMENTS_KV.put("latest_announcement", JSON.stringify({
          title,
          content,
          imageUrl,
          url,
          publishedAt: new Date().toISOString()
        }), { expirationTtl: 86400 * 30 });
        results.kv_stored = true;
      } catch (kvErr) {
        console.error("KV store error:", kvErr);
      }
    }

    return json({
      success: true,
      message: "Update syndicated successfully across connected channels.",
      results
    });

  } catch (err) {
    return json({ success: false, error: err.message }, 500);
  }
}

