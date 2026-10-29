/**
 * Cloudflare Pages Functions do not use the static `_headers` rules.
 * Apply the same non-indexing policy to every Function response so preview
 * routes cannot accidentally become indexable. This header does not affect
 * request handling, storage, redirects, or response bodies.
 */
export async function onRequest(context) {
  const response = await context.next();
  response.headers.set("X-Robots-Tag", "noindex, nofollow");
  return response;
}
