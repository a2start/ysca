/**
 * Apply the non-indexing policy only to the Cloudflare Pages preview host.
 * This does not alter request handling, storage, redirects, response bodies,
 * or the production custom-domain indexability policy.
 */
export async function onRequest(context) {
  const response = await context.next();
  const hostname = new URL(context.request.url).hostname.toLowerCase();
  const isPagesPreview = hostname === "ysca.pages.dev" || hostname.endsWith(".ysca.pages.dev");

  if (isPagesPreview) {
    response.headers.set("X-Robots-Tag", "noindex, nofollow");
  } else {
    response.headers.delete("X-Robots-Tag");
  }

  return response;
}
