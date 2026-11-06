/**
 * Cloudinary storage for YSCA updates. Authenticated delivery only:
 * raw Cloudinary URLs are never handed to browsers.
 *
 * REST upload uses Cloudinary HTTP Basic Auth; signed asset/download uses
 * Cloudinary's SHA-1 parameter signature. All credentials remain server-side.
 * Docs: https://cloudinary.com/documentation/image_upload_api_reference
 */
const encoder = new TextEncoder();

export function cloudinaryConfigured(env) {
  return !!(
    typeof env?.CLOUDINARY_CLOUD_NAME === 'string' &&
    /^[a-zA-Z0-9_-]{2,64}$/.test(env.CLOUDINARY_CLOUD_NAME) &&
    typeof env?.CLOUDINARY_API_KEY === 'string' &&
    /^\d{5,30}$/.test(env.CLOUDINARY_API_KEY) &&
    typeof env?.CLOUDINARY_API_SECRET === 'string' &&
    env.CLOUDINARY_API_SECRET.length >= 16
  );
}

async function sha1(input) {
  const hash = await crypto.subtle.digest('SHA-1', encoder.encode(input));
  return [...new Uint8Array(hash)].map(n => n.toString(16).padStart(2, '0')).join('');
}

export async function signCloudinaryParams(params, secret) {
  const payload = Object.entries(params)
    .filter(([key, value]) => !['file', 'api_key', 'signature', 'cloud_name', 'resource_type'].includes(key) &&
      value !== undefined && value !== null)
    .sort(([a], [b]) => a.localeCompare(b, 'en'))
    .map(([key, value]) => key + '=' + String(value))
    .join('&');
  return sha1(payload + secret);
}

export async function uploadCloudinary(env, bytes, mime, id, extension) {
  if (!cloudinaryConfigured(env)) throw new Error('Cloudinary secrets are missing or invalid');
  const resource = mime.startsWith('video/') ? 'video' : 'image';
  // Cloudinary's Upload API expects /image/upload or /video/upload.
  // Protected delivery is requested using the `type` upload parameter.
  const url = 'https://api.cloudinary.com/v1_1/' +
    encodeURIComponent(env.CLOUDINARY_CLOUD_NAME) + '/' + resource + '/upload';
  const publicId = 'ysca-update-' + id;
  const file = new Blob([bytes], { type: mime });
  const form = new FormData();
  form.append('file', file, publicId + '.' + extension);
  form.append('public_id', publicId);
  form.append('folder', 'ysca-updates');
  form.append('overwrite', 'false');
  // Fail closed if Cloudinary does not honor authenticated delivery.
  form.append('type', 'authenticated');
  // Use server-side Basic Auth: never send API secret to the browser.
  const basicAuth = btoa(env.CLOUDINARY_API_KEY + ':' + env.CLOUDINARY_API_SECRET);
  const response = await fetch(url, {
    method: 'POST',
    headers: { 'Authorization': 'Basic ' + basicAuth },
    body: form
  });
  const result = await response.json().catch(() => ({}));
  if (!response.ok) {
    const providerError = String(result?.error?.message || '');
    // Managers need an actionable error, but never expose any Cloudinary credentials.
    const sanitized = providerError
      .replaceAll(env.CLOUDINARY_API_SECRET, '[redacted]')
      .replaceAll(env.CLOUDINARY_API_KEY, '[redacted]')
      .replace(/[\r\n\t]+/g, ' ')
      .slice(0, 180);
    console.error('Cloudinary upload error:', { status: response.status, details: sanitized });
    let reason = 'Cloudinary rejected the upload';
    if (response.status === 400) reason = 'Invalid media file or upload parameters';
    else if (response.status === 401) reason = 'Authentication rejected — check Cloudinary API key and secret';
    else if (response.status === 403) reason = 'Upload forbidden — check account permissions';
    else if (response.status === 404) reason = 'Cloudinary cloud name or upload endpoint not found';
    else if (response.status === 429) reason = 'Too many requests';
    const error = new Error('Cloudinary HTTP ' + response.status + ': ' + reason +
      (sanitized ? '. Provider message: ' + sanitized : ''));
    error.code = 'CLOUDINARY_HTTP_ERROR';
    throw error;
  }
  if (result.type !== 'authenticated') {
    console.error('Cloudinary unexpected delivery type');
    const error = new Error('Cloudinary returned a non-protected file type. Upload rejected for privacy.');
    error.code = 'CLOUDINARY_TYPE_ERROR';
    throw error;
  }
  if (!/^[\w-]{12,100}$/.test(String(result.asset_id || ''))) {
    console.error('Cloudinary response missing valid asset ID');
    const error = new Error('Cloudinary did not return a valid media asset ID');
    error.code = 'CLOUDINARY_ASSET_ID_ERROR';
    throw error;
  }
  return 'cloudinary:' + result.asset_id;
}

export async function downloadCloudinary(env, objectKey, range = null) {
  if (!cloudinaryConfigured(env)) return null;
  if (!objectKey?.startsWith('cloudinary:')) return null;
  const assetId = objectKey.slice('cloudinary:'.length);
  if (!/^[\w-]{12,100}$/.test(assetId)) return null;
  const timestamp = Math.floor(Date.now() / 1000);
  const params = { asset_id: assetId, timestamp };
  const signature = await signCloudinaryParams(params, env.CLOUDINARY_API_SECRET);
  const url = new URL('https://api.cloudinary.com/v1_1/' +
    encodeURIComponent(env.CLOUDINARY_CLOUD_NAME) + '/asset/download');
  url.searchParams.set('asset_id', assetId);
  url.searchParams.set('timestamp', String(timestamp));
  url.searchParams.set('api_key', env.CLOUDINARY_API_KEY);
  url.searchParams.set('signature', signature);
  const headers = {};
  if (range && /^bytes=\d*-\d*$/.test(range)) headers.Range = range;
  const response = await fetch(url.href, { method: 'GET', headers, redirect: 'follow' });
  if (!(response.ok || response.status === 206)) {
    console.error('Cloudinary private download failed:', response.status);
    return null;
  }
  return response;
}

/** R2-only uploads are no longer used, but existing R2 media remains readable. */
export async function readLegacyR2(env, objectKey) {
  if (!env?.YSCA_MEDIA || objectKey?.startsWith('cloudinary:')) return null;
  const resource = await env.YSCA_MEDIA.get(objectKey);
  return resource ? new Response(resource.body) : null;
}

export function mediaResponse(upstream, mime, isPrivate, allowCors = false) {
  const headers = new Headers({
    'Content-Type': mime,
    'Cache-Control': isPrivate ? 'private, no-store' : 'public, max-age=30',
    'X-Content-Type-Options': 'nosniff',
    'Content-Security-Policy': "default-src 'none'; sandbox",
    'Content-Disposition': 'inline'
  });
  if (allowCors) headers.set('Access-Control-Allow-Origin', '*');
  for (const name of ['Content-Range', 'Accept-Ranges', 'Content-Length']) {
    const value = upstream.headers.get(name);
    if (value) headers.set(name, value);
  }
  return new Response(upstream.body, { status: upstream.status === 206 ? 206 : 200, headers });
}
