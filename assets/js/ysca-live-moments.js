/**
 * YSCA live media: progressive enhancement for EXISTING homepage and gallery.
 * Data is published from the authenticated Manager Dashboard to Cloudflare D1.
 * No write operations or browser credentials; failed requests preserve static content.
 */
(function () {
  "use strict";

  var FEED_URL = "https://ysca.pages.dev/api/updates";
  var MEDIA_BASE = "https://ysca.pages.dev/api/updates/media/";
  var MAX_HOMEPAGE_VIDEOS = 8;
  var MAX_MOMENTS = 48;
  var VIDEO_ID = /^[A-Za-z0-9_-]{11}$/;
  var UUID = /^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/i;

  function youtubeId(href) {
    if (typeof href !== "string" || href.length > 320) return null;
    try {
      var u = new URL(href);
      if (u.protocol !== "https:") return null;
      var host = u.hostname.toLowerCase();
      var id = null;
      if (host === "youtu.be") id = u.pathname.split("/")[1];
      else if (host === "youtube.com" || host === "www.youtube.com") {
        var path = u.pathname.split("/").filter(Boolean);
        if (path[0] === "watch") id = u.searchParams.get("v");
        if (["shorts", "live", "embed", "v"].indexOf(path[0]) !== -1) id = path[1];
      }
      return id && VIDEO_ID.test(id) ? id : null;
    } catch (_) { return null; }
  }

  function el(name, cls, value) {
    var element = document.createElement(name);
    if (cls) element.className = cls;
    if (value !== undefined) element.textContent = value;
    return element;
  }

  function validItems(data) {
    if (!data || !Array.isArray(data.items)) return [];
    return data.items.filter(function (item) {
      return item && typeof item.id === "string" &&
        typeof item.title === "string" && item.title.length <= 140 &&
        item.category !== "fee";
    });
  }

  function renderHomeVideos(items) {
    var grid = document.getElementById("ysca-home-video-gallery");
    if (!grid) return;
    var existing = new Set();
    grid.querySelectorAll("[data-video-id]").forEach(function (poster) {
      existing.add(poster.dataset.videoId);
    });
    var fragment = document.createDocumentFragment();
    var count = 0;

    items.forEach(function (item) {
      var id = youtubeId(item.video_url);
      if (!id || existing.has(id) || count >= MAX_HOMEPAGE_VIDEOS) return;
      existing.add(id);
      count += 1;

      var wrapper = el("div", "ysca-home-video ysca-live-video");
      var poster = el("a", "ysca-home-video-poster");
      poster.href = "https://www.youtube.com/watch?v=" + id;
      poster.dataset.videoId = id;
      poster.setAttribute("aria-label", "Play video: " + item.title);
      var img = el("img");
      img.src = "https://i.ytimg.com/vi/" + id + "/hqdefault.jpg";
      img.alt = item.title + " – video thumbnail";
      img.width = 480;
      img.height = 360;
      img.loading = "lazy";
      img.decoding = "async";
      var play = el("span", "ysca-home-video-play");
      play.setAttribute("aria-hidden", "true");
      poster.append(img, play);
      var close = el("button", "ysca-home-video-close", "\u00d7");
      close.type = "button";
      close.hidden = true;
      close.setAttribute("aria-label", "Close video: " + item.title);
      wrapper.append(poster, close);
      fragment.appendChild(wrapper);
    });

    // Newest approved media first, followed by the existing curated videos.
    if (count) grid.prepend(fragment);
  }

  function makeCaption(item) {
    var title = el("strong", "ysca-moment-title", item.title);
    var label = el("span", "ysca-moment-label", (youtubeId(item.video_url) || String(item.media_mime || "").startsWith("video/")) ? "Video" : "Photo");
    var caption = el("div", "ysca-moment-caption");
    caption.append(label, title);
    return caption;
  }

  function photoCard(item) {
    if (!UUID.test(item.media_id)) return null;
    var uri = MEDIA_BASE + encodeURIComponent(item.media_id);
    var link = el("a", "ysca-moment-card ysca-moment-photo");
    link.href = uri;
    link.setAttribute("aria-label", "View photo: " + item.title);
    var img = el("img");
    img.src = uri;
    img.alt = item.title;
    img.loading = "lazy";
    img.decoding = "async";
    img.onerror = function () { link.hidden = true; };
    link.append(img, makeCaption(item));
    return link;
  }

  function fileVideoCard(item) {
    if (!UUID.test(item.media_id)) return null;
    var card = el("article", "ysca-moment-card ysca-moment-filevideo");
    var video = el("video", "ysca-moment-video");
    video.src = MEDIA_BASE + encodeURIComponent(item.media_id);
    video.controls = true;
    video.preload = "none";
    video.playsInline = true;
    video.setAttribute("aria-label", item.title);
    card.append(video, makeCaption(item));
    return card;
  }

  function youtubeCard(item) {
    var id = youtubeId(item.video_url);
    if (!id) return null;
    var card = el("article", "ysca-moment-card ysca-moment-youtube");
    var frame = el("div", "ysca-moment-youtube-media");
    var poster = el("button", "ysca-moment-youtube-poster");
    poster.type = "button";
    poster.dataset.videoId = id;
    poster.setAttribute("aria-label", "Play video: " + item.title);
    var img = el("img");
    img.src = "https://i.ytimg.com/vi/" + id + "/hqdefault.jpg";
    img.alt = "";
    img.loading = "lazy";
    var play = el("span", "ysca-moment-play", "\u25b6");
    play.setAttribute("aria-hidden", "true");
    poster.append(img, play);
    var close = el("button", "ysca-moment-video-close", "\u00d7");
    close.hidden = true;
    close.type = "button";
    close.setAttribute("aria-label", "Close video: " + item.title);
    frame.append(poster, close);
    card.append(frame, makeCaption(item));
    return card;
  }

  function enableYoutubePlayback(grid) {
    var playing = null;
    function stop() {
      if (!playing) return;
      playing.iframe.remove();
      playing.poster.hidden = false;
      playing.close.hidden = true;
      playing = null;
    }
    grid.addEventListener("click", function (event) {
      var close = event.target.closest(".ysca-moment-video-close");
      if (close && grid.contains(close)) {
        stop();
        return;
      }
      var button = event.target.closest(".ysca-moment-youtube-poster");
      if (!button || !grid.contains(button)) return;
      var id = button.dataset.videoId;
      if (!VIDEO_ID.test(id)) return;
      stop();
      var parent = button.parentElement;
      var iframe = el("iframe", "ysca-moment-embed");
      iframe.src = "https://www.youtube-nocookie.com/embed/" + id + "?autoplay=1&playsinline=1&rel=0";
      iframe.title = "Academy video player";
      iframe.setAttribute("allow", "accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture");
      iframe.setAttribute("allowfullscreen", "");
      iframe.setAttribute("referrerpolicy", "strict-origin-when-cross-origin");
      button.hidden = true;
      parent.appendChild(iframe);
      var closeButton = parent.querySelector(".ysca-moment-video-close");
      closeButton.hidden = false;
      playing = { iframe: iframe, poster: button, close: closeButton };
    });
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") stop();
    });
    window.addEventListener("pagehide", stop);
  }

  function renderMoments(items) {
    var section = document.getElementById("ysca-live-moments-section");
    var grid = document.getElementById("ysca-live-moments-gallery");
    if (!section || !grid) return;

    var images = document.createDocumentFragment();
    var videos = document.createDocumentFragment();
    var hasImages = false, hasVideos = false;
    var visible = 0;
    items.some(function (item) {
      if (visible >= MAX_MOMENTS) return true;
      var mime = typeof item.media_mime === "string" ? item.media_mime : "";
      var card = null;
      if (mime.startsWith("image/")) {
        card = photoCard(item);
        if (card) { images.appendChild(card); hasImages = true; }
      } else if (mime.startsWith("video/")) {
        card = fileVideoCard(item);
        if (card) { videos.appendChild(card); hasVideos = true; }
      } else if (youtubeId(item.video_url)) {
        card = youtubeCard(item);
        if (card) { videos.appendChild(card); hasVideos = true; }
      }
      if (card) visible += 1;
      return false;
    });

    if (!visible) return; // Existing album cards remain visible as fallback.
    grid.replaceChildren(images);
    var videoGrid = document.getElementById("ysca-live-moments-videos");
    var videoHeading = document.getElementById("ysca-live-videos-heading");
    if (videoGrid) { videoGrid.replaceChildren(videos); videoGrid.hidden = !hasVideos; }
    if (videoHeading) videoHeading.hidden = !hasVideos;
    var photoHeading = document.getElementById("ysca-live-photos-heading");
    if (photoHeading) photoHeading.hidden = !hasImages;
    section.hidden = false;
    // LightGallery is initialized on the static page and must be refreshed after inserting new photos.
    if (typeof window.yscaRefreshMomentsGallery === "function" && hasImages) {
      window.yscaRefreshMomentsGallery();
    }
    if (videoGrid && hasVideos && !videoGrid.dataset.playerReady) {
      enableYoutubePlayback(videoGrid);
      videoGrid.dataset.playerReady = "true";
    }
  }

  if (!document.getElementById("ysca-home-video-gallery") &&
      !document.getElementById("ysca-live-moments-gallery")) return;

  fetch(FEED_URL, { mode: "cors", credentials: "omit", cache: "no-store" })
    .then(function (response) {
      if (!response.ok) throw new Error("YSCA feed unavailable");
      return response.json();
    })
    .then(function (data) {
      var items = validItems(data);
      renderHomeVideos(items);
      renderMoments(items);
    })
    .catch(function () {
      // Keep existing videos and album cards usable if the feed is temporarily unavailable.
    });
})();