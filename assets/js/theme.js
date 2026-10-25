
(function($) {
    'use strict';

    function mainMenu() {
        
        var var_window = $(window),
        navContainer = $('.header-navigation'),
        navbarToggler = $('.navbar-toggler'),
        navMenu = $('.theme-nav-menu'),
        navMenuLi = $('.theme-nav-menu ul li ul li'),
        closeIcon = $('.navbar-close');

        navbarToggler.on('click', function() {
            navbarToggler.toggleClass('active');
            navMenu.toggleClass('menu-on');
        });

        closeIcon.on('click', function() {
            navMenu.removeClass('menu-on');
            navbarToggler.removeClass('active');
        });

        navMenu.find("li a").each(function() {
            if ($(this).children('.dd-trigger').length < 1) {
                if ($(this).next().length > 0) {
                    $(this).append('<span class="dd-trigger"><i class="far fa-angle-down"></i></span>')
                }
            }
        });

        navMenu.on('click', '.dd-trigger', function(e) {
            e.preventDefault();
            $(this).parent().parent().siblings().children('ul.sub-menu').slideUp();
            $(this).parent().next('ul.sub-menu').stop(true, true).slideToggle(350);
            $(this).toggleClass('sub-menu-open');
        });

    };

    function offCanvas() {
        const $overlay = $(".offcanvas__overlay");
        const $toggler = $(".navbar-toggler");
        const $menu = $(".theme-nav-menu");
        $toggler.add($overlay).add(".navbar-close").on("click", function () {
            $overlay.toggleClass("overlay-open");
            if ($(this).is($overlay)) {
                $toggler.removeClass("active");
                $menu.removeClass("menu-on");
            }
        });
        $(window).on("resize", function () {
            if ($(window).width() > 991) $overlay.removeClass("overlay-open");
        });
    }
    function initOffcanvasPanel() {
		const overlay = $(".offcanvas__overlay");
		var panelIcon = $('.offcanvas-toggle'),
		panelClose = $('.panel-close-btn'),
		panelWrap = $('.renvia-offcanvas-panel');
		panelIcon.on('click', function (e) {
			e.preventDefault();
			overlay.addClass("overlay-open");
			panelWrap.addClass('panel-on');
		});
		panelClose.on('click', function (e) {
			e.preventDefault();
			overlay.removeClass("overlay-open");
			panelWrap.removeClass('panel-on');
		});
		overlay.on('click', function (e) {
			e.preventDefault();
			overlay.removeClass("overlay-open");
			panelWrap.removeClass('panel-on');
		});
	}

    $(window).on('load', function(event) {
        $('.preloader').addClass('loaded').fadeOut(300);
    });

    
    
    $(document).ready(function () {
        function initStickyHeader(headerSelector) {
            const header = $(headerSelector);
            let lastScroll = 0;
            $(window).on('scroll', function () {
                const currentScroll = $(this).scrollTop();
                if (currentScroll > 200) {
                    if (currentScroll < lastScroll) {
                        if (!header.hasClass('sticky')) {
                            header.addClass('sticky');
                        }
                    } else {
                        header.removeClass('sticky');
                    }
                } else if (currentScroll === 0) {
                    header.removeClass('sticky');
                }
                lastScroll = currentScroll;
            });
        }
        initStickyHeader('header');
    });

    
    if ($('.video-popup').length){
        $('.video-popup').magnificPopup({
            type: 'iframe',
            removalDelay: 300,
            mainClass: 'mfp-fade'
        });
    }

    if ($('.hero-slider').length) {
        var sliderDots = $('.hero-dots');
        $('.hero-slider').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 800,
            fade: true,
            appendDots: sliderDots,
            cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>'
        });
    }
    if ($('.service-slider').length) {
        $('.service-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 1000,
            autoplay: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>',
            responsive: [
                {
                    breakpoint: 1450,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if ($('.course-slider').length) {
        $('.course-slider').slick({
            dots: true,
            arrows: true,
            prevArrow: '<button class="prev-arrow slick-arrow" aria-label="Previous"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button class="next-arrow slick-arrow" aria-label="Next"><i class="fas fa-chevron-right"></i></button>',
            infinite: true,
            speed: 800,
            autoplay: true,
            autoplaySpeed: 3000,
            pauseOnHover: true,
            pauseOnFocus: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        autoplay: true,
                        autoplaySpeed: 3000
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        arrows: false,
                        autoplay: true,
                        autoplaySpeed: 3000
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        autoplay: true,
                        autoplaySpeed: 3000
                    }
                }
            ]
        });
    }

    function refreshPageScrollLayout() {
        if (typeof ScrollTrigger !== 'undefined') {
            ScrollTrigger.refresh(true);
        }
        if (typeof ScrollSmoother !== 'undefined') {
            var smoother = ScrollSmoother.get();
            if (smoother) {
                smoother.refresh();
            }
        }
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }

    var yscaStageData = {
        grassroots: {
            badge: '<i class="fas fa-seedling"></i> Grassroots Pathway',
            agePill: 'Age: 6–10 Yrs',
            title: 'Grassroots Development Syllabus',
            desc: 'Designed specifically to ignite cricket passion in young children through play-based biomechanics, safe equipment, and motor coordination drills.',
            milestones: [
                'Foundational grip, balanced stance & swing mechanics',
                'Zero-fear training with high-grade safety incrediballs',
                'Agility ladders, reaction ball drills & reflex games',
                '1:12 Coach-to-student ratio ensuring individualized care'
            ],
            batchDate: 'Fresh Intake Every Monday',
            timings: 'Morning 6:30–8:30 AM | Eve 4:00–6:00 PM',
            ctaText: 'Book 1-Day Free Net Assessment',
            ctaLink: 'contact?action=trial&program=grassroots',
            waMsg: 'Hi, I want to know more about the grassroots cricket program'
        },
        junior: {
            badge: '<i class="fas fa-medal"></i> Junior Pathway',
            agePill: 'Age: 11–14 Yrs',
            title: 'Junior Competitive Syllabus',
            desc: 'Transitioning from recreational play to serious leather ball cricket with turf wickets, video biomechanics, and match tactics under pressure.',
            milestones: [
                'Standard 5.5oz leather ball nets with technical safety gear',
                'Backfoot play, power drives, spin revolutions & pace seam',
                'Weekly 30-over inter-academy match simulations',
                'Biomechanical video stroke review with certified coaches'
            ],
            batchDate: 'Weekday & Weekend Batches',
            timings: 'Daily 4:00 PM – 7:00 PM (Floodlit)',
            ctaText: 'Join Junior Selection Batch',
            ctaLink: 'contact?action=trial&program=junior',
            waMsg: 'Hi, I want to know more about the junior cricket program'
        },
        senior: {
            badge: '<i class="fas fa-trophy-alt"></i> Senior Pathway',
            agePill: 'Age: 15–19 Yrs',
            title: 'Senior High Performance Syllabus',
            desc: 'Rigorous Ranji Trophy and District selection preparation with high-speed bowling machines, match analysis, and direct club nominations.',
            milestones: [
                '140+ kmph bowling machine speed drills & bouncer prep',
                'Situational match temperaments & tactical masterclasses',
                'Direct trial nominations for DDCA, State & BCCI tournaments',
                'Personalized fitness regimes targeting peak match stamina'
            ],
            batchDate: 'Assessment Net Required',
            timings: 'Morning 6:00–9:00 AM | Eve 3:30–7:30 PM',
            ctaText: 'Apply For High Performance Trial',
            ctaLink: 'contact?action=trial&program=senior',
            waMsg: 'Hi, I want to know more about the senior performance program'
        },
        masterclass: {
            badge: '<i class="fas fa-star"></i> 1-on-1 Elite',
            agePill: 'All Age Categories',
            title: 'Head Coach 1-on-1 Masterclass',
            desc: 'Exclusive individual attention with BCCI certified coaches to eliminate technical flaws, refine bowling actions, or develop power hitting.',
            milestones: [
                'Dedicated private net with exclusive coach attention',
                'Ultra slow-motion camera frame-by-frame stroke breakdown',
                'Customized bowling action biomechanics & release angles',
                'Flexible scheduling tailored around school & tournament calendars'
            ],
            batchDate: 'By Appointment Only',
            timings: 'Custom 90-Min Private Slots',
            ctaText: 'Book Private 1-on-1 Slot',
            ctaLink: 'contact?action=masterclass',
            waMsg: 'Hi, I want to know more about 1-on-1 private coaching'
        },
        hostel: {
            badge: '<i class="fas fa-hotel"></i> Residential Campus',
            agePill: 'Ages 10 & Above',
            title: 'Academy Hostel & Sports Boarding',
            desc: 'Full residential accommodation 50 meters from our training turfs, ensuring complete immersion in cricket without daily commute stress.',
            milestones: [
                'Furnished twin-sharing rooms with 24/7 security & CCTV',
                'High-protein sports diet designed by certified nutritionists',
                'Dedicated evening study hours with Wi-Fi & quiet study room',
                'Unrestricted access to turf nets, gym & evening floodlit practice'
            ],
            batchDate: 'Annual & Short-Term Admissions',
            timings: '365 Days / Full Boarding Campus',
            ctaText: 'Enquire for Hostel Room',
            ctaLink: 'contact?subject=For+Academy+Hostel',
            waMsg: 'Hi, I want to know more about hostel boarding facilities'
        },
        gym: {
            badge: '<i class="fas fa-dumbbell"></i> Fitness Center',
            agePill: 'All Trainees & Members',
            title: 'Cricket Strength & Conditioning',
            desc: 'A specialized athletic conditioning facility engineered specifically for modern cricket demands — explosive rotational power and injury resistance.',
            milestones: [
                'Core torque & rotational velocity training for six-hitting',
                'Rotator cuff & shoulder durability regimens for fast bowlers',
                'Sprint acceleration, deceleration & agility cone testing',
                'In-house physiotherapists for injury prevention & rehab'
            ],
            batchDate: 'Open Daily For All Batches',
            timings: '6:00 AM – 9:30 PM (Daily)',
            ctaText: 'Join Fitness Conditioning',
            ctaLink: 'contact?subject=For+Gym+&+Fitness+Center',
            waMsg: 'Hi, I want to know more about gym & fitness training'
        }
    };

    function applyProgramsFilter(filterVal, $activeBtn) {
        var filter = (filterVal || 'grassroots').toLowerCase().trim();
        var $bar = $('.ysca-filter-bar');
        
        if ($activeBtn && $activeBtn.length) {
            $bar.find('.ysca-filter-btn').removeClass('active').attr('aria-pressed', 'false');
            $activeBtn.addClass('active').attr('aria-pressed', 'true');
        } else {
            $bar.find('.ysca-filter-btn').removeClass('active').attr('aria-pressed', 'false');
            $bar.find('.ysca-filter-btn[data-filter="' + filter + '"]').addClass('active').attr('aria-pressed', 'true');
        }

        var $curActive = $bar.find('.ysca-filter-btn.active');
        if ($curActive.length && $bar.length && $bar[0].scrollWidth > $bar[0].clientWidth) {
            var btnPos = $curActive.position().left + $bar.scrollLeft();
            var targetScroll = btnPos - ($bar.outerWidth() / 2) + ($curActive.outerWidth() / 2);
            $bar.stop().animate({ scrollLeft: Math.max(0, targetScroll) }, 200);
        }

        var $grid = $('#programsGrid');
        if (!$grid.length) {
            $grid = $('.ysca-programs-grid');
        }

        var $items = $grid.find('.program-grid-item');
        var $stageCol = $('#stageHighlightCol');
        var matchCount = 0;

        if (filter === 'all') {
            $items.each(function () {
                var $item = $(this);
                $item.removeClass('is-hidden is-animating-out').addClass('is-animating-in');
                matchCount++;
            });
            if ($stageCol.length) {
                $stageCol.hide();
            }
            $('#resetProgramsFilter').html('<i class="fas fa-undo-alt"></i> Reset Filter').fadeOut(180);
        } else {
            $items.each(function () {
                var $item = $(this);
                var categories = ($item.attr('data-category') || '').toLowerCase().split(/\s+/);
                if (categories.indexOf(filter) !== -1) {
                    $item.removeClass('is-hidden is-animating-out').addClass('is-animating-in');
                    matchCount++;
                } else {
                    $item.removeClass('is-animating-in').addClass('is-hidden');
                }
            });

            if ($stageCol.length && yscaStageData[filter]) {
                var data = yscaStageData[filter];
                $('#shcBadge').html(data.badge);
                $('#shcAgePill').text(data.agePill);
                $('#shcTitle').text(data.title);
                $('#shcDesc').text(data.desc);

                var milestonesHtml = '';
                for (var m = 0; m < data.milestones.length; m++) {
                    milestonesHtml += '<li><i class="fas fa-check-circle"></i> <span>' + data.milestones[m] + '</span></li>';
                }
                $('#shcMilestones').html(milestonesHtml);
                $('#shcBatchDate').text(data.batchDate);
                $('#shcTimings').text(data.timings);
                $('#shcCtaBtn').attr('href', data.ctaLink).html('<i class="fas fa-cricket"></i> ' + data.ctaText);
                $('.btn-shc-whatsapp').attr('href', 'https://wa.me/919910543666?text=' + encodeURIComponent(data.waMsg));
                
                $stageCol.fadeIn(200);
            }

            $('#resetProgramsFilter').html('<i class="fas fa-th-large"></i> View All Programs').fadeIn(180);
        }

        var labelText = $curActive.find('.yfb-title').text().trim() || $curActive.find('span:first').text().trim() || $curActive.text().trim();
        labelText = labelText.replace(/\s*\(\d+\)/g, '').trim();
        if ($('#filterCurrentName').length) {
            $('#filterCurrentName').text(labelText || 'Grassroots (6–10 Yrs)');
        }
        if ($('#filterCurrentCount').length) {
            $('#filterCurrentCount').text(matchCount);
        }

        if (matchCount === 0) {
            $('#noProgramsFound').fadeIn(150);
        } else {
            $('#noProgramsFound').hide();
        }

        refreshPageScrollLayout();
        setTimeout(refreshPageScrollLayout, 100);
    }

    $(document).on('click', '.ysca-filter-bar .ysca-filter-btn', function (e) {
        e.preventDefault();
        var $btn = $(this);
        var filter = ($btn.attr('data-filter') || 'grassroots').toLowerCase();
        applyProgramsFilter(filter, $btn);
    });

    $(document).on('click', '#resetProgramsFilter, #emptyResetBtn', function (e) {
        e.preventDefault();
        var currentActiveFilter = ($('.ysca-filter-bar .ysca-filter-btn.active').attr('data-filter') || '').toLowerCase();
        if (currentActiveFilter === 'all') {
            applyProgramsFilter('grassroots', $('.ysca-filter-bar .ysca-filter-btn[data-filter="grassroots"]'));
        } else {
            applyProgramsFilter('all', $('.ysca-filter-bar .ysca-filter-btn[data-filter="all"]'));
        }
    });
    if ($('.project-slider').length) {
        $('.project-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 800,
            autoplay: true,
            variableWidth: true,
            centerMode: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>',
            responsive: [
				{
                    breakpoint: 767,
                    settings: {
                        centerMode: false,
                        slidesToShow: 1,
                        variableWidth: false,
                    }
                }
            ]
        });
    }
    if ($('.projects-slider-two').length) {
        $('.projects-slider-two').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 800,
            autoplay: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>',
            responsive: [
                {
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2
                    }
                },
				{
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if ($('.testimonial-slider').length) {
        var sliderArrows = $('.testimonial-arrows');
        $('.testimonial-slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 800,
            autoplay: true,
            appendArrows: sliderArrows,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>',
            responsive: [
				{
                    breakpoint: 767,
                    settings: {
                        arrows: false,
                    }
                }
            ]
        });
    }
    if ($('.testimonial-slider-two').length) {
        var sliderDots = $('.testimonial-dots');
        $('.testimonial-slider-two').slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 800,
            appendDots: sliderDots,
            autoplay: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>',
            responsive: [
				{
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if ($('.testimonial-slider-three').length) {
        $('.testimonial-slider-three').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 800,
            autoplay: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>',
            responsive: [
				{
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if ($('.choose-slider').length) {
        var sliderArrows = $('.choose-arrows');
        $('.choose-slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 800,
            autoplay: true,
            appendArrows: sliderArrows,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<div class="prev">Previews</div>',
            nextArrow: '<div class="next">Next</div>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if ($('.gallery-slider').length) {
        $('.gallery-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 800,
            autoplay: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    if ($('.post-thumbnail-slider').length) {
        $('.post-thumbnail-slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 800,
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-arrow-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-arrow-right"></i></div>'
        });
    }
    if ($('.clients-slider').length) {
        $('.clients-slider').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 800,
            autoplay: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            prevArrow: '<div class="prev"><i class="far fa-angle-left"></i></div>',
            nextArrow: '<div class="next"><i class="far fa-angle-right"></i></div>',
            responsive: [
                {
                    breakpoint: 1450,
                    settings: {
                        slidesToShow: 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 570,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }

	if ($('.counter').length) {
		const observer = new IntersectionObserver((entries, observer) => {
			entries.forEach(entry => {
				if (entry.isIntersecting) {
					$(entry.target).counterUp({
						delay: 100,
						time: 4000
					});
					observer.unobserve(entry.target);
				}
			});
		}, {
			threshold: 1.0
		});
		$('.counter').each(function() {
			observer.observe(this);
		});
	}
    
    if (typeof gsap !== 'undefined') {
        if (typeof ScrollTrigger !== 'undefined' && typeof ScrollSmoother !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger, ScrollSmoother);
            var isTouchScreen = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0) || (window.innerWidth < 1024);
            ScrollSmoother.create({
                smooth: isTouchScreen ? 0 : 1,
                effects: !isTouchScreen,
                smoothTouch: false,
                normalizeScroll: false,
            });
        } else if (typeof ScrollTrigger !== 'undefined') {
            gsap.registerPlugin(ScrollTrigger);
        }

        if (typeof SplitText !== 'undefined' && $('.text-anm').length) {
            let staggerAmount = 0.01,
                translateXValue = 40,
                delayValue = .3,
                easeType = "power2.out",
                animatedTextElements = document.querySelectorAll('.text-anm');
            animatedTextElements.forEach((element) => {
                let animationSplitText = new SplitText(element, {
                    type: "chars, words"
                });
                gsap.from(animationSplitText.chars, {
                    duration: 1,
                    delay: delayValue,
                    x: translateXValue,
                    autoAlpha: 0,
                    stagger: staggerAmount,
                    ease: easeType,
                    scrollTrigger: {
                        trigger: element,
                        start: "top 85%"
                    },
                });
            });
        }

        $(function () {
            if (typeof ScrollTrigger === 'undefined') return;
            var width = $(window).width();
            if (width <= 1199) return;
            if ($(".renvia-project_one").length) {
                ScrollTrigger.create({
                    trigger: ".renvia-project_one",
                    start: "top top",
                    end: "bottom bottom",
                    pin: ".renvia-project_one .renvia-content-box",
                    pinSpacing: false,
                    markers: false
                });
            }
            let cards = gsap.utils.toArray(".renvia-proiect-list .renvia-project-item");
            if (cards.length > 0) {
                let stickDistance = 530;
                let lastCardST = ScrollTrigger.create({
                    trigger: cards[cards.length - 1],
                    start: "bottom bottom",
                    markers: false
                });
                cards.forEach((card, index) => {
                    ScrollTrigger.create({
                        trigger: card,
                        start: "top top",
                        end: () => lastCardST.start + stickDistance,
                        pin: true,
                        pinSpacing: false,
                        scrub: true,
                        markers: false
                    });
                });
            }
        });
    }
    

    $("#pricingBox").change(function () {
        if ($(this).is(":checked")) {
            $(".price").each(function () {
                var yearPrice = $(this).data("year");
                $(this).html('<span class="currency">$</span>' + yearPrice + '<span class="duration">/Year</span>');
            });
        } else {
            $(".price").each(function () {
                var monthPrice = $(this).data("month");
                $(this).html('<span class="currency">$</span>' + monthPrice + '<span class="duration">/Month</span>');
            });
        }
    });

    
    if (typeof $.fn.niceSelect === 'function' && $('select').length){
        $('select').niceSelect();
    }
    

    function dynamicBackground() {
        $('[data-src]').each(function () {
          var src = $(this).attr('data-src');
          $(this).css({
            'background-image': 'url(' + src + ')',
          });
        });
    }

    function initAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                offset: 20,
                duration: 600,
                once: true,
                disableMutationObserver: false
            });
            setTimeout(function() {
                if (typeof AOS !== 'undefined') AOS.refresh();
            }, 300);
            setTimeout(function() {
                if (typeof AOS !== 'undefined') AOS.refresh();
            }, 1000);
        }
    }

    $(function() {
        mainMenu();
        offCanvas();
        initOffcanvasPanel();
        dynamicBackground();
        initAOS();
    });

    $(window).on('load', function() {
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    });

})(window.jQuery);