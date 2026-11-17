/**
 * YSCA Universal Multi-Platform Social Share Module
 * Handles 1-click sharing across all platforms via Web Share API (mobile)
 * and custom accessible fallback modal (desktop).
 * Integrates UTM parameters for conversion tracking in Google Analytics 4.
 */

(function (window, document) {
    'use strict';

    var ACADEMY_NAME = 'Young Star Cricket Academy';
    var DEFAULT_TAGLINE = 'Cricket Coaching in Malakpur, Greater Noida (Ages 5+ to Open Age)';

    // Create and inject modal & toast DOM elements if not already present
    function ensureModalDOMElements() {
        if (document.getElementById('ysca-share-modal-container')) {
            return;
        }

        var container = document.createElement('div');
        container.id = 'ysca-share-modal-container';
        container.innerHTML = [
            '<div id="ysca-share-modal" class="ysca-share-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="ysca-share-title">',
            '  <div class="ysca-share-backdrop" data-close-share="true"></div>',
            '  <div class="ysca-share-dialog">',
            '    <div class="ysca-share-header">',
            '      <div class="ysca-share-header-text">',
            '        <h4 id="ysca-share-title" class="ysca-share-heading">Share with Friends & Family</h4>',
            '        <p class="ysca-share-subheading">Young Star Cricket Academy</p>',
            '      </div>',
            '      <button type="button" class="ysca-share-close-btn" data-close-share="true" aria-label="Close share dialog">&times;</button>',
            '    </div>',
            '    <div class="ysca-share-body">',
            '      <p id="ysca-share-preview-title" class="ysca-share-item-name"></p>',
            '      <div class="ysca-share-grid">',
            '        <a href="#" class="ysca-share-item ysca-share-wa" data-platform="whatsapp" target="_blank" rel="noopener noreferrer">',
            '          <span class="ysca-share-icon"><i class="fab fa-whatsapp"></i></span>',
            '          <span class="ysca-share-label">WhatsApp</span>',
            '        </a>',
            '        <a href="#" class="ysca-share-item ysca-share-fb" data-platform="facebook" target="_blank" rel="noopener noreferrer">',
            '          <span class="ysca-share-icon"><i class="fab fa-facebook-f"></i></span>',
            '          <span class="ysca-share-label">Facebook</span>',
            '        </a>',
            '        <a href="#" class="ysca-share-item ysca-share-x" data-platform="twitter" target="_blank" rel="noopener noreferrer">',
            '          <span class="ysca-share-icon"><i class="fab fa-x-twitter"></i></span>',
            '          <span class="ysca-share-label">X / Twitter</span>',
            '        </a>',
            '        <a href="#" class="ysca-share-item ysca-share-in" data-platform="linkedin" target="_blank" rel="noopener noreferrer">',
            '          <span class="ysca-share-icon"><i class="fab fa-linkedin-in"></i></span>',
            '          <span class="ysca-share-label">LinkedIn</span>',
            '        </a>',
            '        <a href="#" class="ysca-share-item ysca-share-tg" data-platform="telegram" target="_blank" rel="noopener noreferrer">',
            '          <span class="ysca-share-icon"><i class="fab fa-telegram-plane"></i></span>',
            '          <span class="ysca-share-label">Telegram</span>',
            '        </a>',
            '        <button type="button" class="ysca-share-item ysca-share-copy" data-platform="copy">',
            '          <span class="ysca-share-icon"><i class="fas fa-link"></i></span>',
            '          <span class="ysca-share-label">Copy Link</span>',
            '        </button>',
            '      </div>',
            '      <div class="ysca-share-copy-bar">',
            '        <input type="text" id="ysca-share-url-input" readonly aria-label="Share URL">',
            '        <button type="button" id="ysca-share-copy-btn" class="ysca-copy-btn">Copy</button>',
            '      </div>',
            '    </div>',
            '  </div>',
            '</div>',
            '<div id="ysca-share-toast" class="ysca-share-toast" role="alert" aria-live="assertive">',
            '  <i class="fas fa-check-circle"></i> Link copied to clipboard!',
            '</div>'
        ].join('\n');

        document.body.appendChild(container);

        // Bind modal close events
        var closeTriggers = container.querySelectorAll('[data-close-share="true"]');
        for (var i = 0; i < closeTriggers.length; i++) {
            closeTriggers[i].addEventListener('click', closeShareModal);
        }

        // Close on ESC
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' || e.keyCode === 27) {
                closeShareModal();
            }
        });

        // Copy button in copy bar
        var copyBtn = document.getElementById('ysca-share-copy-btn');
        if (copyBtn) {
            copyBtn.addEventListener('click', function () {
                var input = document.getElementById('ysca-share-url-input');
                if (input) {
                    copyToClipboard(input.value);
                }
            });
        }
    }

    function showToast(msg) {
        var toast = document.getElementById('ysca-share-toast');
        if (!toast) return;
        if (msg) {
            toast.innerHTML = '<i class="fas fa-check-circle"></i> ' + msg;
        }
        toast.classList.add('is-visible');
        setTimeout(function () {
            toast.classList.remove('is-visible');
        }, 3000);
    }

    function copyToClipboard(text) {
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(function () {
                showToast('Link copied to clipboard!');
            }).catch(function () {
                fallbackCopy(text);
            });
        } else {
            fallbackCopy(text);
        }
    }

    function fallbackCopy(text) {
        var input = document.getElementById('ysca-share-url-input');
        if (input) {
            input.value = text;
            input.focus();
            input.select();
            try {
                document.execCommand('copy');
                showToast('Link copied to clipboard!');
            } catch (err) {
                showToast('Please copy the link manually');
            }
        }
    }

    function openShareModal(options) {
        ensureModalDOMElements();

        var title = options.title || ACADEMY_NAME;
        var text = options.text || DEFAULT_TAGLINE;
        var rawUrl = options.url || window.location.href.split('?')[0];

        // Format clean target URL
        var previewElem = document.getElementById('ysca-share-preview-title');
        if (previewElem) {
            previewElem.textContent = title;
        }

        var inputElem = document.getElementById('ysca-share-url-input');
        if (inputElem) {
            inputElem.value = rawUrl;
        }

        // Attach platform-specific handlers with UTM parameters
        var platforms = {
            whatsapp: function () {
                var waUrl = rawUrl + (rawUrl.indexOf('?') === -1 ? '?' : '&') + 'utm_source=whatsapp&utm_medium=social_share&utm_campaign=visitor_share';
                var waText = '*' + title + '*\n' + text + '\n\n' + waUrl;
                return 'https://api.whatsapp.com/send?text=' + encodeURIComponent(waText);
            },
            facebook: function () {
                var fbUrl = rawUrl + (rawUrl.indexOf('?') === -1 ? '?' : '&') + 'utm_source=facebook&utm_medium=social_share&utm_campaign=visitor_share';
                return 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(fbUrl);
            },
            twitter: function () {
                var twUrl = rawUrl + (rawUrl.indexOf('?') === -1 ? '?' : '&') + 'utm_source=twitter&utm_medium=social_share&utm_campaign=visitor_share';
                var twText = title + ' — ' + text;
                return 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(twText) + '&url=' + encodeURIComponent(twUrl) + '&hashtags=CricketCoaching,GreaterNoida,YSCA';
            },
            linkedin: function () {
                var liUrl = rawUrl + (rawUrl.indexOf('?') === -1 ? '?' : '&') + 'utm_source=linkedin&utm_medium=social_share&utm_campaign=visitor_share';
                return 'https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(liUrl);
            },
            telegram: function () {
                var tgUrl = rawUrl + (rawUrl.indexOf('?') === -1 ? '?' : '&') + 'utm_source=telegram&utm_medium=social_share&utm_campaign=visitor_share';
                return 'https://t.me/share/url?url=' + encodeURIComponent(tgUrl) + '&text=' + encodeURIComponent(title + '\n' + text);
            }
        };

        var items = document.querySelectorAll('#ysca-share-modal .ysca-share-item');
        for (var i = 0; i < items.length; i++) {
            var item = items[i];
            var platform = item.getAttribute('data-platform');
            if (platform === 'copy') {
                item.onclick = function (e) {
                    e.preventDefault();
                    copyToClipboard(rawUrl);
                };
            } else if (platforms[platform]) {
                item.href = platforms[platform]();
            }
        }

        var modal = document.getElementById('ysca-share-modal');
        if (modal) {
            modal.classList.add('is-open');
            modal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('ysca-share-open');
        }
    }

    function closeShareModal() {
        var modal = document.getElementById('ysca-share-modal');
        if (modal) {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('ysca-share-open');
        }
    }

    /**
     * Primary entrypoint:
     * Attempts navigator.share on supporting mobile devices.
     * Falls back to branded modal on desktop or unsupported devices.
     */
    function triggerShare(options) {
        options = options || {};
        var title = options.title || document.title || ACADEMY_NAME;
        var text = options.text || DEFAULT_TAGLINE;
        var rawUrl = options.url || window.location.href.split('?')[0];

        // Append base referral UTM
        var shareUrl = rawUrl + (rawUrl.indexOf('?') === -1 ? '?' : '&') + 'utm_source=web_share&utm_medium=referral&utm_campaign=visitor_share';

        if (navigator.share) {
            navigator.share({
                title: title,
                text: text,
                url: shareUrl
            }).catch(function (err) {
                // Ignore User abort / cancelled share dialog
                if (err && err.name !== 'AbortError') {
                    openShareModal({ title: title, text: text, url: rawUrl });
                }
            });
        } else {
            openShareModal({ title: title, text: text, url: rawUrl });
        }
    }

    // Auto-bind click handlers to any button or link with [data-ysca-share]
    document.addEventListener('DOMContentLoaded', function () {
        ensureModalDOMElements();

        document.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-ysca-share]');
            if (btn) {
                e.preventDefault();
                var title = btn.getAttribute('data-share-title') || document.title;
                var text = btn.getAttribute('data-share-text') || DEFAULT_TAGLINE;
                var url = btn.getAttribute('data-share-url') || window.location.href;
                triggerShare({ title: title, text: text, url: url });
            }
        });
    });

    // Expose to global window
    window.yscaShare = triggerShare;
    window.yscaOpenShareModal = openShareModal;
    window.yscaCloseShareModal = closeShareModal;

})(window, document);
