<?php

$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$isHome = ($currentPage === 'index.php' || $currentPage === 'index.html' || $currentPage === '');
$isAbout = ($currentPage === 'about.php' || $currentPage === 'about.html');
$isCoaches = in_array($currentPage, [
    'coach.php', 'coach-detail.php', 'coach-kapil-pratap-singh.php', 
    'coach-lokesh-bharti.php', 'coach-manoj-gupta.php', 'coach-nayan-bhardwaj.php', 
    'coach-nikhil-yadav.php', 'coach-rajeev-gupta.php', 'coach-suryabhan-singh.php',
    'coach.html', 'coach-detail.html', 'coach-kapil-pratap-singh.html', 
    'coach-lokesh-bharti.html', 'coach-manoj-gupta.html', 'coach-nayan-bhardwaj.html', 
    'coach-nikhil-yadav.html', 'coach-rajeev-gupta.html', 'coach-suryabhan-singh.html'
]);
$isPrograms = in_array($currentPage, [
    'our-programs.php', 'program-detail.php', 'program-foundation-cricket.php',
    'program-junior-development.php', 'program-senior-performance.php',
    'program-professional-coaching.php',
    'our-programs.html', 'program-detail.html', 'program-foundation-cricket.html',
    'program-junior-development.html', 'program-senior-performance.html',
    'program-professional-coaching.html'
]);
$isFacilities = in_array($currentPage, [
    'hostel.php', 'gym.php', 'program-cricket-hostel.php', 'program-gym-fitness.php',
    'cricket-training.php', 'net-practice.php',
    'hostel.html', 'gym.html', 'program-cricket-hostel.html', 'program-gym-fitness.html',
    'cricket-training.html', 'net-practice.html'
]);
$isGallery = ($currentPage === 'photo-gallery.php' || $currentPage === 'photo-gallery.html');
$isContact = ($currentPage === 'contact.php' || $currentPage === 'contact.html');
?>

<div class="preloader" id="preloader">
    <div class="ysca-loader-container">
        <div class="ysca-loader-spinner">
            <div class="ysca-spinner-ring ysca-ring-outer"></div>
            <div class="ysca-spinner-ring ysca-ring-inner"></div>
            <div class="ysca-loader-logo">
                <img src="assets/images/ysca-logo1.png" alt="Young Star Cricket Academy" width="76" height="76">
            </div>
        </div>
        <div class="ysca-loader-text">
            <span class="ysca-loader-title">Young Star Cricket Academy</span>
            <div class="ysca-loader-bar">
                <div class="ysca-loader-progress"></div>
            </div>
        </div>
    </div>
</div>
<script>
(function() {
    function hideLoader() {
        var p = document.getElementById('preloader');
        if (p && !p.classList.contains('loaded')) {
            p.classList.add('loaded');
            setTimeout(function() {
                if (p) p.style.display = 'none';
            }, 450);
        }
    }
    if (document.readyState === 'complete') {
        setTimeout(hideLoader, 50);
    } else {
        window.addEventListener('load', function() { setTimeout(hideLoader, 150); });
        document.addEventListener('DOMContentLoaded', function() { setTimeout(hideLoader, 600); });
        setTimeout(hideLoader, 1500); 
    }
})();
</script>

<header class="zite-header <?= $isHome ? 'zite-header-home' : 'zite-header-page' ?>" id="ziteHeader">
    <div class="zite-header-container">
        <div class="zite-header-inner">

            <a href="./" class="zite-logo-link" title="Young Star Cricket Academy" aria-label="Young Star Cricket Academy Home">
                <img src="assets/images/ysca-zite-logo.webp" onerror="this.src='assets/images/ys-logo.png'" alt="Young Star Cricket Academy" class="zite-logo-img" width="170" height="52">
            </a>

            <nav class="zite-desktop-nav" aria-label="Main Navigation">
                <div class="zite-nav-item">
                    <a href="./" class="zite-nav-link <?= $isHome ? 'active' : '' ?>">Home</a>
                </div>

                <div class="zite-nav-item">
                    <a href="about" class="zite-nav-link <?= $isAbout ? 'active' : '' ?>">About</a>
                </div>

                <div class="zite-nav-item has-dropdown">
                    <a href="our-programs" class="zite-nav-link <?= $isPrograms ? 'active' : '' ?>">
                        <span>Programs</span>
                        <svg class="zite-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="zite-dropdown-menu">
                        <a href="program-foundation-cricket" class="zite-dropdown-link">Foundation Cricket</a>
                        <a href="program-junior-development" class="zite-dropdown-link">Junior Development</a>
                        <a href="program-senior-performance" class="zite-dropdown-link">Senior Performance</a>
                        <a href="program-professional-coaching" class="zite-dropdown-link">Professional Coaching</a>
                        <a href="hostel" class="zite-dropdown-link">Academy Hostel</a>
                        <a href="gym" class="zite-dropdown-link">Gym &amp; Fitness</a>
                    </div>
                </div>

                <div class="zite-nav-item">
                    <a href="coach" class="zite-nav-link <?= $isCoaches ? 'active' : '' ?>">Coaches</a>
                </div>

                <div class="zite-nav-item has-dropdown">
                    <a href="hostel" class="zite-nav-link <?= $isFacilities ? 'active' : '' ?>">
                        <span>Facilities</span>
                        <svg class="zite-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </a>
                    <div class="zite-dropdown-menu">
                        <a href="cricket-training" class="zite-dropdown-link">Cricket Training</a>
                        <a href="net-practice" class="zite-dropdown-link">Turf Net Practice</a>
                        <a href="hostel" class="zite-dropdown-link">Academy Hostel</a>
                        <a href="gym" class="zite-dropdown-link">Gym &amp; Fitness</a>
                    </div>
                </div>

                <div class="zite-nav-item">
                    <a href="photo-gallery" class="zite-nav-link <?= $isGallery ? 'active' : '' ?>">Gallery</a>
                </div>

                <div class="zite-nav-item">
                    <a href="contact" class="zite-nav-link <?= $isContact ? 'active' : '' ?>">Contact</a>
                </div>

                <div class="zite-nav-cta-wrap">
                    <a href="contact?action=trial" class="zite-btn-trial">
                        BOOK FREE TRIAL
                    </a>
                </div>
            </nav>

            <button type="button" class="zite-mobile-toggle" id="ziteMobileToggle" aria-label="Toggle navigation menu" aria-expanded="false" aria-controls="ziteMobileMenu">
                <svg class="zite-menu-icon icon-hamburger" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="6" x2="20" y2="6"></line>
                    <line x1="4" y1="12" x2="20" y2="12"></line>
                    <line x1="4" y1="18" x2="20" y2="18"></line>
                </svg>
                <svg class="zite-menu-icon icon-close" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>

        </div>

        <div class="zite-mobile-menu" id="ziteMobileMenu">
            <nav class="zite-mobile-nav">
                <a href="./" class="zite-mobile-link <?= $isHome ? 'active' : '' ?>">Home</a>
                
                <a href="about" class="zite-mobile-link <?= $isAbout ? 'active' : '' ?>">About Us</a>

                <div class="zite-mobile-accordion">
                    <button type="button" class="zite-mobile-accordion-toggle <?= $isPrograms ? 'active' : '' ?>" aria-expanded="false">
                        <span>Programs</span>
                        <svg class="zite-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="zite-mobile-sub">
                        <a href="our-programs" class="zite-mobile-sub-link zite-sub-highlight">
                            <i class="fas fa-th-large me-2"></i> All Programs Overview
                        </a>
                        <a href="program-foundation-cricket" class="zite-mobile-sub-link">Foundation Cricket (U-12)</a>
                        <a href="program-junior-development" class="zite-mobile-sub-link">Junior Development (U-16)</a>
                        <a href="program-senior-performance" class="zite-mobile-sub-link">Senior Performance (U-19+)</a>
                        <a href="program-professional-coaching" class="zite-mobile-sub-link">Professional Coaching</a>
                        <a href="hostel" class="zite-mobile-sub-link">Academy Cricket Hostel</a>
                        <a href="gym" class="zite-mobile-sub-link">Gym &amp; Fitness Center</a>
                    </div>
                </div>

                <a href="coach" class="zite-mobile-link <?= $isCoaches ? 'active' : '' ?>">Coaching Faculty</a>

                <div class="zite-mobile-accordion">
                    <button type="button" class="zite-mobile-accordion-toggle <?= $isFacilities ? 'active' : '' ?>" aria-expanded="false">
                        <span>Facilities</span>
                        <svg class="zite-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="zite-mobile-sub">
                        <a href="our-programs#facilities-section" class="zite-mobile-sub-link zite-sub-highlight">
                            <i class="fas fa-shield-alt me-2"></i> All Academy Facilities
                        </a>
                        <a href="cricket-training" class="zite-mobile-sub-link">Cricket Training Grounds</a>
                        <a href="net-practice" class="zite-mobile-sub-link">Turf Net Practice</a>
                        <a href="hostel" class="zite-mobile-sub-link">Residential Hostel</a>
                        <a href="gym" class="zite-mobile-sub-link">Modern Gym &amp; Fitness</a>
                    </div>
                </div>

                <a href="photo-gallery" class="zite-mobile-link <?= $isGallery ? 'active' : '' ?>">Photo Gallery</a>

                <a href="contact" class="zite-mobile-link <?= $isContact ? 'active' : '' ?>">Contact &amp; Location</a>

                <div class="zite-mobile-cta-wrap">
                    <a href="contact?action=trial" class="zite-mobile-btn-trial">
                        <span>BOOK FREE TRIAL SESSION</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </nav>
        </div>

    </div>
</header>
<div class="zite-mobile-backdrop" id="ziteMobileBackdrop" aria-hidden="true"></div>

<script>
(function() {
    function initZiteNavbar() {
        var header = document.getElementById('ziteHeader');
        var mobileToggle = document.getElementById('ziteMobileToggle');
        var mobileMenu = document.getElementById('ziteMobileMenu');
        var backdrop = document.getElementById('ziteMobileBackdrop');
        if (!header) return;

        var isFloating = false;
        function checkScroll() {
            if (mobileMenu && mobileMenu.classList.contains('is-open')) return;
            var scrollY = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollY > 120) {
                if (!isFloating) {
                    isFloating = true;
                    header.classList.add('is-floating');
                }
            } else {
                if (isFloating) {
                    isFloating = false;
                    header.classList.remove('is-floating');
                }
            }
        }

        window.addEventListener('scroll', checkScroll, { passive: true });
        checkScroll();

        function resetMenuScroll() {
            if (mobileMenu) {
                mobileMenu.scrollTop = 0;
            }
        }

        function openMenu() {
            if (!mobileMenu || !mobileToggle) return;
            resetMenuScroll();
            mobileMenu.classList.add('is-open');
            mobileToggle.classList.add('is-active');
            mobileToggle.setAttribute('aria-expanded', 'true');
            if (backdrop) backdrop.classList.add('is-active');
            document.body.classList.add('zite-menu-locked');

            if (window.requestAnimationFrame) {
                requestAnimationFrame(resetMenuScroll);
            }
            setTimeout(resetMenuScroll, 30);
            setTimeout(resetMenuScroll, 150);
        }

        function closeMenu() {
            if (!mobileMenu || !mobileToggle) return;
            mobileMenu.classList.remove('is-open');
            mobileToggle.classList.remove('is-active');
            mobileToggle.setAttribute('aria-expanded', 'false');
            if (backdrop) backdrop.classList.remove('is-active');
            document.body.classList.remove('zite-menu-locked');
            resetMenuScroll();
            checkScroll();
        }

        if (mobileToggle && mobileMenu) {
            mobileToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                if (mobileMenu.classList.contains('is-open')) {
                    closeMenu();
                } else {
                    openMenu();
                }
            });
        }

        var accordions = document.querySelectorAll('.zite-mobile-accordion-toggle');
        accordions.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var sub = this.nextElementSibling;
                if (sub) {
                    var isSubOpen = sub.classList.contains('is-open');
                    if (isSubOpen) {
                        sub.classList.remove('is-open');
                        this.classList.remove('is-open');
                        this.setAttribute('aria-expanded', 'false');
                    } else {
                        sub.classList.add('is-open');
                        this.classList.add('is-open');
                        this.setAttribute('aria-expanded', 'true');
                    }
                }
            });
        });

        if (backdrop) {
            backdrop.addEventListener('click', function(e) {
                e.preventDefault();
                closeMenu();
            });
        }

        var navLinks = mobileMenu ? mobileMenu.querySelectorAll('a') : [];
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && mobileMenu && mobileMenu.classList.contains('is-open')) {
                closeMenu();
            }
        });

        window.addEventListener('pageshow', function() {
            resetMenuScroll();
        });

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024 && mobileMenu && mobileMenu.classList.contains('is-open')) {
                closeMenu();
            }
        }, { passive: true });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initZiteNavbar);
    } else {
        initZiteNavbar();
    }
})();
</script>