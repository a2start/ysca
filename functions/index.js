/**
 * The manager custom domain uses the existing ysca Cloudflare Pages project.
 * Only the root on the manager host redirects to the login UI.
 * All other hosts, including ysca.pages.dev and preview aliases,
 * retain their existing static homepage and API behavior.
 */
export async function onRequestGet({ request, next }) {
 const host = new URL(request.url).hostname.toLowerCase();
 if (host !== 'manager.youngstarcricketacademy.com') return next();
 return new Response(null, {
  status: 302,
  headers: {
   'Location': '/manager/updates.html',
   'Cache-Control': 'no-store',
   'X-Robots-Tag': 'noindex, nofollow, noarchive',
   'Referrer-Policy': 'strict-origin-when-cross-origin'
  }
 });
}
