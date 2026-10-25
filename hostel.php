<?php

require_once __DIR__ . '/includes/programs-data.php';
$program = getProgramById('cricket-hostel');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Academy Hostel in Greater Noida - Safe, disciplined residential facility with nutritious meals and 24/7 supervision for outstation cricket players at Young Star Cricket Academy.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Academy Hostel — Greater Noida | Young Star Cricket Academy</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Philosopher:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.css">
    <link rel="stylesheet" href="assets/css/spacings.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        :root {
            --zite-orange: #f97316;
            --zite-orange-dark: #ea580c;
            --zite-navy: #0e1b2e;
            --zite-navy-light: #162438;
            --zite-dark-surface: #0a1322;
            --zite-text-main: #0f172a;
            --zite-text-muted: #64748b;
            --zite-border: #e2e8f0;
            --zite-bg-muted: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--zite-text-main);
            background-color: #ffffff;
        }

        .zite-hero-stage {
            position: relative;
            background: linear-gradient(rgba(10, 19, 34, 0.88), rgba(10, 19, 34, 0.94)), url('assets/images/zite-hostel.jpg') center/cover no-repeat;
            padding: 130px 0 60px;
            color: #ffffff;
            border-bottom: 2px solid var(--zite-orange);
        }
        .zite-hero-badge {
            display: inline-block;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 0.22em;
            color: var(--zite-orange);
            text-transform: uppercase;
            margin-bottom: 12px;
        }
        .zite-hero-title {
            font-size: clamp(32px, 4.5vw, 48px);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
        }
        .zite-hero-subtitle {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.82);
            max-width: 720px;
            line-height: 1.65;
            margin-bottom: 0;
        }

        .hostel-intro-sec {
            padding: 70px 0;
            background: #ffffff;
        }
        .hostel-intro-title {
            font-size: clamp(26px, 3.2vw, 36px);
            font-weight: 800;
            color: var(--zite-navy);
            margin-bottom: 20px;
            line-height: 1.25;
        }
        .hostel-intro-p {
            font-size: 15px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            margin-bottom: 16px;
        }
        .hostel-img-box {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 16px 36px -10px rgba(15, 23, 42, 0.18);
            border: 1px solid var(--zite-border);
        }
        .hostel-img-box img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }
        .hostel-img-box:hover img {
            transform: scale(1.03);
        }

        .hostel-amenities-sec {
            padding: 75px 0;
            background-color: var(--zite-bg-muted);
            border-top: 1px solid var(--zite-border);
            border-bottom: 1px solid var(--zite-border);
        }
        .hostel-sec-title {
            font-size: clamp(24px, 3vw, 32px);
            font-weight: 800;
            color: var(--zite-navy);
            text-align: center;
            margin-bottom: 40px;
        }
        .amenity-card {
            background: #ffffff;
            border: 1px solid var(--zite-border);
            border-radius: 10px;
            padding: 28px 24px;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }
        .amenity-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -6px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }
        .amenity-icon {
            width: 46px;
            height: 46px;
            border-radius: 8px;
            background: rgba(249, 115, 22, 0.1);
            color: var(--zite-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 18px;
        }
        .amenity-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--zite-navy);
            margin-bottom: 8px;
        }
        .amenity-desc {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.6;
            margin-bottom: 0;
        }

        .hostel-schedule-sec {
            padding: 80px 0;
            background: #ffffff;
        }
        .schedule-row {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: background 0.2s ease;
        }
        .schedule-row.stripe {
            background-color: var(--zite-bg-muted);
        }
        .schedule-time {
            font-size: 14px;
            font-weight: 800;
            color: var(--zite-orange);
            width: 130px;
            flex-shrink: 0;
            letter-spacing: 0.02em;
        }
        .schedule-activity {
            font-size: 14px;
            font-weight: 600;
            color: var(--zite-navy);
            margin-bottom: 0;
        }

        .hostel-included-sec {
            background-color: var(--zite-navy);
            padding: 80px 0;
            color: #ffffff;
        }
        .included-item {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 16px 20px;
            transition: background 0.3s ease;
        }
        .included-item:hover {
            background: rgba(255, 255, 255, 0.09);
        }
        .included-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(249, 115, 22, 0.2);
            color: var(--zite-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 15px;
        }
        .included-label {
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 0;
        }

        .hostel-faq-sec {
            padding: 80px 0;
            background: #ffffff;
        }
        .hostel-accordion .accordion-item {
            border: 1px solid var(--zite-border);
            border-radius: 8px !important;
            margin-bottom: 12px;
            overflow: hidden;
        }
        .hostel-accordion .accordion-button {
            font-size: 16px;
            font-weight: 700;
            color: var(--zite-navy);
            background: #ffffff;
            padding: 18px 22px;
            box-shadow: none;
        }
        .hostel-accordion .accordion-button:not(.collapsed) {
            color: var(--zite-orange);
            background: #fff8f3;
        }
        .hostel-accordion .accordion-body {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            padding: 18px 22px;
        }

        .hostel-cta-sec {
            background: linear-gradient(135deg, #ea580c 0%, #f97316 100%);
            padding: 55px 0;
            color: #ffffff;
            text-align: center;
        }
        .hostel-cta-title {
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
        }
        .hostel-cta-p {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.92);
            max-width: 620px;
            margin: 0 auto 26px;
        }
        .btn-zite-white {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            color: #0f172a;
            font-weight: 700;
            font-size: 14px;
            padding: 13px 28px;
            border-radius: 6px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .btn-zite-white:hover {
            background: #f1f5f9;
            color: #ea580c;
            transform: translateY(-2px);
        }
        .btn-zite-whatsapp {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #25d366;
            color: #ffffff;
            font-weight: 700;
            font-size: 14px;
            padding: 13px 28px;
            border-radius: 6px;
            margin-left: 12px;
            transition: all 0.3s ease;
        }
        [data-aos] {
            opacity: 1 !important;
            transform: none !important;
            visibility: visible !important;
        }
    </style>
</head>

<body>
    <?php include_once 'header.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="zite-hero-stage">
            <div class="container">
                <span class="zite-hero-badge" data-aos="fade-down">RESIDENTIAL FACILITY</span>
                <h1 class="zite-hero-title" data-aos="fade-up" data-aos-delay="100">Academy Hostel — Greater Noida</h1>
                <p class="zite-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                    A safe, disciplined and focused residential facility for outstation cricket players committed to full-time training at Young Star Cricket Academy.
                </p>
            </div>
        </section>

        <section class="hostel-intro-sec">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h2 class="hostel-intro-title">Train Here. Stay Focused. Develop Faster.</h2>
                        <p class="hostel-intro-p">
                            Our academy hostel provides a safe, comfortable and disciplined living environment for outstation players who want to train full-time with Young Star Cricket Academy without the stress and time loss of daily commuting. Located near the training grounds in Greater Noida, the hostel allows players to fully immerse themselves in structured cricket development.
                        </p>
                        <p class="hostel-intro-p">
                            Residential players benefit from a structured daily routine that balances cricket training, fitness sessions, meals, rest and study time. The hostel environment builds independence, discipline and camaraderie among players — qualities that translate directly to better performance on the cricket field.
                        </p>
                        <p class="hostel-intro-p">
                            Whether a player is from another city in Uttar Pradesh, a neighbouring state, or anywhere across India, our hostel facility makes it possible to access professional cricket coaching at YSCA year-round.
                        </p>
                        <div class="pt-2">
                            <a href="contact?subject=Academy+Hostel+Admission+Enquiry" class="btn-psc-details" style="display:inline-block; padding: 12px 24px; font-size:14px; font-weight:700; border-radius:6px; background:var(--zite-orange); color:#fff;">
                                Enquire for Hostel Admission <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="hostel-img-box">
                            <img src="assets/images/zite-hostel.jpg" alt="Young Star Cricket Academy Hostel Greater Noida">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hostel-amenities-sec">
            <div class="container">
                <h2 class="hostel-sec-title" data-aos="fade-up">Hostel Facilities &amp; Amenities</h2>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                        <div class="amenity-card">
                            <div class="amenity-icon"><i class="fas fa-bed"></i></div>
                            <h3 class="amenity-title">Safe Accommodation</h3>
                            <p class="amenity-desc">Comfortable, clean living spaces designed for young athletes with proper ventilation, study areas and storage for personal belongings and cricket equipment.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="amenity-card">
                            <div class="amenity-icon"><i class="fas fa-utensils"></i></div>
                            <h3 class="amenity-title">Nutritious Meals</h3>
                            <p class="amenity-desc">Three balanced meals daily plus snacks, designed to support athletic performance, recovery and growth. Vegetarian and non-vegetarian options available.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="amenity-card">
                            <div class="amenity-icon"><i class="fas fa-shield-alt"></i></div>
                            <h3 class="amenity-title">24/7 Supervision</h3>
                            <p class="amenity-desc">Round-the-clock supervision by responsible staff ensuring discipline, safety and a structured daily routine for all residential players.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="amenity-card">
                            <div class="amenity-icon"><i class="fas fa-calendar-check"></i></div>
                            <h3 class="amenity-title">Year-Round Availability</h3>
                            <p class="amenity-desc">The hostel operates throughout the year to support continuous training schedules, with no break during school holidays for committed players.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                        <div class="amenity-card">
                            <div class="amenity-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <h3 class="amenity-title">Training Convenience</h3>
                            <p class="amenity-desc">Located near the academy grounds, eliminating daily commute stress so players can focus 100% on their cricket development and fitness.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="amenity-card">
                            <div class="amenity-icon"><i class="fas fa-door-closed"></i></div>
                            <h3 class="amenity-title">Limited Rooms</h3>
                            <p class="amenity-desc">Rooms are strictly limited to maintain quality standards, supervision ratios and individual attention for every residential player.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hostel-schedule-sec">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="hostel-sec-title mb-2">A Day at the YSCA Hostel</h2>
                    <p class="text-muted">Sample daily routine for residential players — structured for maximum development.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <?php
                        $hostelSchedule = [
                            ['time' => '5:30 AM', 'activity' => 'Wake Up & Morning Hydration'],
                            ['time' => '6:00 AM', 'activity' => 'Morning Fitness — Running, Agility, Core & Stretching'],
                            ['time' => '7:30 AM', 'activity' => 'Nutritious Breakfast & Protein Boost'],
                            ['time' => '8:00 AM', 'activity' => 'Morning Cricket Training Session (Turf Nets & Drills)'],
                            ['time' => '11:00 AM', 'activity' => 'Rest Break & Energy Snack'],
                            ['time' => '11:30 AM', 'activity' => 'Specialized Skills Practice / Bowling Machine Reps'],
                            ['time' => '1:00 PM', 'activity' => 'Athlete Balanced Lunch & Recovery Rest'],
                            ['time' => '4:00 PM', 'activity' => 'Evening Net Practice & Match Scenario Simulation'],
                            ['time' => '7:00 PM', 'activity' => 'Cool Down, Muscle Mobility & Daily Debrief'],
                            ['time' => '7:30 PM', 'activity' => 'Supervised Evening Study Time & School Homework'],
                            ['time' => '8:30 PM', 'activity' => 'Nutritious Dinner with Teammates'],
                            ['time' => '9:30 PM', 'activity' => 'Free Time, Calling Parents & Game Video Review'],
                            ['time' => '10:00 PM', 'activity' => 'Lights Out & Mandatory Recovery Sleep']
                        ];
                        foreach ($hostelSchedule as $index => $item):
                        ?>
                            <div class="schedule-row <?= $index % 2 === 0 ? 'stripe' : '' ?>">
                                <span class="schedule-time"><?= htmlspecialchars($item['time']) ?></span>
                                <span class="schedule-activity"><?= htmlspecialchars($item['activity']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="hostel-included-sec">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="hostel-sec-title text-white mb-2">What's Included</h2>
                    <p style="color: rgba(255,255,255,0.7);">Comprehensive boarding package designed for complete peace of mind.</p>
                </div>
                <div class="row g-3">
                    <?php
                    $included = [
                        ['icon' => 'fa-home', 'label' => 'Shared accommodation with study area'],
                        ['icon' => 'fa-utensils', 'label' => '3 meals + snacks daily'],
                        ['icon' => 'fa-dumbbell', 'label' => 'Full access to cricket & gym facilities'],
                        ['icon' => 'fa-user-shield', 'label' => '24/7 supervision & structured routine'],
                        ['icon' => 'fa-sun', 'label' => 'Morning & evening training sessions'],
                        ['icon' => 'fa-book-reader', 'label' => 'Evening study / homework time'],
                        ['icon' => 'fa-walking', 'label' => 'Walking distance to training nets'],
                        ['icon' => 'fa-mobile-alt', 'label' => 'Regular parent progress updates']
                    ];
                    foreach ($included as $item):
                    ?>
                        <div class="col-sm-6 col-lg-3" data-aos="fade-up">
                            <div class="included-item">
                                <div class="included-icon"><i class="fas <?= $item['icon'] ?>"></i></div>
                                <p class="included-label"><?= htmlspecialchars($item['label']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="hostel-faq-sec">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="hostel-sec-title mb-2">Hostel FAQs</h2>
                    <p class="text-muted">Frequently asked questions about residential boarding at YSCA.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9" data-aos="fade-up">
                        <div class="accordion hostel-accordion" id="hostelFaqAccordion">
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Who is eligible to stay at the academy hostel?
                                    </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#hostelFaqAccordion">
                                    <div class="accordion-body">
                                        The hostel is open to outstation and local players enrolled in full-time cricket coaching programs at Young Star Cricket Academy. Admission is granted based on commitment, discipline, and room availability.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Are all meals included in the hostel fee?
                                    </button>
                                </h3>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#hostelFaqAccordion">
                                    <div class="accordion-body">
                                        Yes. Three daily balanced meals (breakfast, lunch, dinner) along with evening energy snacks are included. The meals are nutritious, balanced and designed to support athletic performance.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Is there supervision for homework and school studies?
                                    </button>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#hostelFaqAccordion">
                                    <div class="accordion-body">
                                        Yes. Evening study time is built into the daily routine, and staff supervise to ensure players balance their academic responsibilities alongside cricket training. We also support open-school and regular CBSE school enrollments in Greater Noida.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Can parents visit the hostel?
                                    </button>
                                </h3>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#hostelFaqAccordion">
                                    <div class="accordion-body">
                                        Absolutely. Parents are welcome to visit during designated visiting hours. Regular updates on the player's training progress and well-being are also shared with parents weekly.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Is laundry service provided?
                                    </button>
                                </h3>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#hostelFaqAccordion">
                                    <div class="accordion-body">
                                        Basic laundry facilities are available at the hostel. Players are expected to maintain personal hygiene and keep their living spaces clean and organised.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        What about medical emergencies and first aid?
                                    </button>
                                </h3>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#hostelFaqAccordion">
                                    <div class="accordion-body">
                                        A first-aid kit is available on-site, and nearby multi-specialty hospitals and sports injury clinics in Greater Noida are partnered for immediate emergency medical care.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="hostel-cta-sec">
            <div class="container">
                <h2 class="hostel-cta-title">Ready to Join the YSCA Residential Program?</h2>
                <p class="hostel-cta-p">Seats are strictly limited to ensure quality supervision and training attention. Reserve a spot or schedule a visit with our hostel warden today.</p>
                <div>
                    <a href="contact?subject=Academy+Hostel+Booking" class="btn-zite-white">
                        <i class="fas fa-calendar-check"></i> Book Campus Visit
                    </a>
                    <a href="https://wa.me/919999999999?text=Hello%20Young%20Star%20Cricket%20Academy%2C%20I%20am%20interested%20in%20hostel%20facility%20details." target="_blank" class="btn-zite-whatsapp">
                        <i class="fab fa-whatsapp"></i> Chat on WhatsApp
                    </a>
                </div>
            </div>
        </section>
    </main>

    <?php include_once 'fotter.php'; ?>

        </div>
    </div>

    <script src="assets/js/plugins/jquery-3.7.1.min.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/gsap/gsap.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollSmoother.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollTrigger.min.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof AOS !== 'undefined') {
                AOS.init({ duration: 700, once: true });
            }
        });
    </script>
</body>
</html>
