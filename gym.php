<?php

require_once __DIR__ . '/includes/programs-data.php';
$program = getProgramById('gym-fitness');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Cricket Fitness Training in Greater Noida - Strength, speed, agility and sports conditioning gym designed for the physical demands of modern competitive cricket.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cricket Fitness Training — Greater Noida | Young Star Cricket Academy</title>
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
            background: linear-gradient(rgba(10, 19, 34, 0.88), rgba(10, 19, 34, 0.94)), url('assets/images/zite-gym-interior.jpg') center/cover no-repeat;
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

        .gym-intro-sec {
            padding: 70px 0;
            background: #ffffff;
        }
        .gym-intro-title {
            font-size: clamp(26px, 3.2vw, 36px);
            font-weight: 800;
            color: var(--zite-navy);
            margin-bottom: 20px;
            line-height: 1.25;
        }
        .gym-intro-p {
            font-size: 15px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            margin-bottom: 16px;
        }
        .gym-badges-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 24px;
        }
        .gym-badge-item {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 700;
            color: var(--zite-navy);
        }
        .gym-badge-item i {
            color: var(--zite-orange);
            font-size: 16px;
        }
        .gym-img-box {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 16px 36px -10px rgba(15, 23, 42, 0.18);
            border: 1px solid var(--zite-border);
        }
        .gym-img-box img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }
        .gym-img-box:hover img {
            transform: scale(1.03);
        }

        .gym-pillars-sec {
            padding: 75px 0;
            background-color: var(--zite-bg-muted);
            border-top: 1px solid var(--zite-border);
            border-bottom: 1px solid var(--zite-border);
        }
        .gym-sec-title {
            font-size: clamp(24px, 3vw, 32px);
            font-weight: 800;
            color: var(--zite-navy);
            text-align: center;
            margin-bottom: 10px;
        }
        .gym-sec-desc {
            font-size: 15px;
            color: var(--zite-text-muted);
            text-align: center;
            max-width: 600px;
            margin: 0 auto 40px;
        }
        .pillar-card {
            background: #ffffff;
            border: 1px solid var(--zite-border);
            border-radius: 10px;
            padding: 28px 24px;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
        }
        .pillar-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 24px -6px rgba(0, 0, 0, 0.08);
            border-color: #cbd5e1;
        }
        .pillar-icon {
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
        .pillar-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--zite-navy);
            margin-bottom: 8px;
        }
        .pillar-desc {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.6;
            margin-bottom: 0;
        }

        .gym-schedule-sec {
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
        .schedule-day {
            font-size: 14px;
            font-weight: 800;
            color: var(--zite-orange);
            width: 140px;
            flex-shrink: 0;
            letter-spacing: 0.02em;
        }
        .schedule-focus {
            font-size: 14px;
            font-weight: 600;
            color: var(--zite-navy);
            margin-bottom: 0;
        }

        .gym-benefits-sec {
            background-color: var(--zite-navy);
            padding: 80px 0;
            color: #ffffff;
        }
        .benefit-card {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 20px;
            height: 100%;
            transition: background 0.3s ease;
        }
        .benefit-card:hover {
            background: rgba(255, 255, 255, 0.09);
        }
        .benefit-icon {
            color: var(--zite-orange);
            font-size: 18px;
            margin-top: 2px;
            flex-shrink: 0;
        }
        .benefit-text {
            font-size: 15px;
            font-weight: 600;
            color: #ffffff;
            line-height: 1.5;
            margin-bottom: 0;
        }

        .gym-faq-sec {
            padding: 80px 0;
            background: #ffffff;
        }
        .gym-accordion .accordion-item {
            border: 1px solid var(--zite-border);
            border-radius: 8px !important;
            margin-bottom: 12px;
            overflow: hidden;
        }
        .gym-accordion .accordion-button {
            font-size: 16px;
            font-weight: 700;
            color: var(--zite-navy);
            background: #ffffff;
            padding: 18px 22px;
            box-shadow: none;
        }
        .gym-accordion .accordion-button:not(.collapsed) {
            color: var(--zite-orange);
            background: #fff8f3;
        }
        .gym-accordion .accordion-body {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            padding: 18px 22px;
        }

        .gym-cta-sec {
            background: linear-gradient(135deg, #ea580c 0%, #f97316 100%);
            padding: 55px 0;
            color: #ffffff;
            text-align: center;
        }
        .gym-cta-title {
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
        }
        .gym-cta-p {
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
                <span class="zite-hero-badge" data-aos="fade-down">FITNESS &amp; CONDITIONING</span>
                <h1 class="zite-hero-title" data-aos="fade-up" data-aos-delay="100">Cricket Fitness Training — Greater Noida</h1>
                <p class="zite-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                    Build the athlete behind the cricketer. Strength, speed, agility and endurance training designed specifically for the physical demands of competitive cricket.
                </p>
            </div>
        </section>

        <section class="gym-intro-sec">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="gym-img-box">
                            <img src="assets/images/zite-gym-interior.jpg" alt="Cricket fitness training gym facility at Young Star Cricket Academy Greater Noida">
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <h2 class="gym-intro-title">Why Fitness Matters in Modern Cricket</h2>
                        <p class="gym-intro-p">
                            Cricket has evolved dramatically. Today's competitive cricket demands players who are not just technically skilled but also physically exceptional. A fast bowler needs explosive power and sustained endurance. A batsman needs quick reflexes, strong core stability and the stamina to bat through long innings. A fielder needs agility, speed and throwing power.
                        </p>
                        <p class="gym-intro-p">
                            At Young Star Cricket Academy, fitness training is not an add-on — it's integrated into every program. Our dedicated gym and fitness facility provides daily access to guided, sports-specific conditioning that complements on-field coaching and builds complete athletes who perform under pressure.
                        </p>
                        <div class="gym-badges-row">
                            <div class="gym-badge-item">
                                <i class="fas fa-bullseye"></i> Peak Performance
                            </div>
                            <div class="gym-badge-item">
                                <i class="fas fa-chart-line"></i> Daily Access
                            </div>
                            <div class="gym-badge-item">
                                <i class="fas fa-dumbbell"></i> Guided Sessions
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gym-pillars-sec">
            <div class="container">
                <h2 class="gym-sec-title" data-aos="fade-up">Six Core Areas of Athletic Conditioning</h2>
                <p class="gym-sec-desc" data-aos="fade-up" data-aos-delay="100">Six core areas of physical development tailored for cricket performance.</p>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                        <div class="pillar-card">
                            <div class="pillar-icon"><i class="fas fa-dumbbell"></i></div>
                            <h3 class="pillar-title">Strength Training</h3>
                            <p class="pillar-desc">Build functional cricket strength through targeted weight training, bodyweight exercises and resistance work — developing the power needed for explosive batting shots, fast bowling and powerful throws.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="pillar-card">
                            <div class="pillar-icon"><i class="fas fa-bolt"></i></div>
                            <h3 class="pillar-title">Speed &amp; Explosiveness</h3>
                            <p class="pillar-desc">Develop explosive acceleration for quick singles, boundary-saving sprints and rapid fielding reactions through sprint drills, plyometrics and reaction-time exercises.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                        <div class="pillar-card">
                            <div class="pillar-icon"><i class="fas fa-shoe-prints"></i></div>
                            <h3 class="pillar-title">Agility &amp; Footwork</h3>
                            <p class="pillar-desc">Improve change of direction, lateral movement and on-field responsiveness — critical for batting footwork, fielding agility and bowling run-up consistency.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="pillar-card">
                            <div class="pillar-icon"><i class="fas fa-heartbeat"></i></div>
                            <h3 class="pillar-title">Endurance &amp; Stamina</h3>
                            <p class="pillar-desc">Build the cardiovascular stamina to perform consistently through long match days, multi-day training blocks and demanding tournament schedules without fatigue affecting performance.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                        <div class="pillar-card">
                            <div class="pillar-icon"><i class="fas fa-child"></i></div>
                            <h3 class="pillar-title">Mobility &amp; Flexibility</h3>
                            <p class="pillar-desc">Maintain full range of motion essential for bowling actions, batting movements and fielding positions. Proper mobility reduces injury risk and improves technique execution.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="pillar-card">
                            <div class="pillar-icon"><i class="fas fa-running"></i></div>
                            <h3 class="pillar-title">Cricket-Specific Conditioning</h3>
                            <p class="pillar-desc">Workout plans designed specifically for the physical demands of competitive cricket — covering batting power, bowling endurance, throwing accuracy and fielding explosiveness.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gym-schedule-sec">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="gym-sec-title mb-2">Weekly Fitness Structure</h2>
                    <p class="text-muted">How fitness sessions are structured throughout a typical training week.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <?php
                        $gymSchedule = [
                            ['day' => 'Monday', 'focus' => 'Upper Body Strength + Core Stability'],
                            ['day' => 'Tuesday', 'focus' => 'Speed & Agility Drills + Plyometrics'],
                            ['day' => 'Wednesday', 'focus' => 'Lower Body Strength + Explosive Power'],
                            ['day' => 'Thursday', 'focus' => 'Cricket-Specific Conditioning + Endurance'],
                            ['day' => 'Friday', 'focus' => 'Full Body Circuit + Functional Mobility'],
                            ['day' => 'Saturday', 'focus' => 'Recovery Session — Yoga, Guided Stretching, Light Cardio']
                        ];
                        foreach ($gymSchedule as $index => $item):
                        ?>
                            <div class="schedule-row <?= $index % 2 === 0 ? 'stripe' : '' ?>">
                                <span class="schedule-day"><?= htmlspecialchars($item['day']) ?></span>
                                <span class="schedule-focus"><?= htmlspecialchars($item['focus']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="gym-benefits-sec">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="gym-sec-title text-white mb-2">Measurable Performance Benefits</h2>
                    <p style="color: rgba(255,255,255,0.7);">Direct athletic gains on the cricket pitch from systematic gym training.</p>
                </div>
                <div class="row g-4">
                    <?php
                    $benefits = [
                        'Improved batting power and shot execution through core torque',
                        'Faster bowling speed and stamina for longer spells',
                        'Quicker fielding reactions and stronger boundary throws',
                        'Reduced injury risk through proper joint prehab and conditioning',
                        'Better endurance for long multi-day matches and tournaments',
                        'Enhanced mental focus and supreme athletic confidence under pressure'
                    ];
                    foreach ($benefits as $b):
                    ?>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up">
                            <div class="benefit-card">
                                <i class="fas fa-check-circle benefit-icon"></i>
                                <p class="benefit-text"><?= htmlspecialchars($b) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="gym-faq-sec">
            <div class="container">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h2 class="gym-sec-title mb-2">Gym &amp; Fitness FAQs</h2>
                    <p class="text-muted">Common questions about athletic training at Young Star Cricket Academy.</p>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-9" data-aos="fade-up">
                        <div class="accordion gym-accordion" id="gymFaqAccordion">
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Is gym/fitness training included in the cricket coaching fee?
                                    </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#gymFaqAccordion">
                                    <div class="accordion-body">
                                        Fitness training is integrated into all our cricket programs. Players in the Junior, Senior and Professional programs have scheduled gym sessions as part of their weekly training plan. Dedicated external memberships are also available.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        What age can players start using the gym?
                                    </button>
                                </h3>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#gymFaqAccordion">
                                    <div class="accordion-body">
                                        Players typically start structured gym work from age 12–13 onwards, depending on physical maturity. Younger players do age-appropriate bodyweight exercises, agility drills and flexibility work.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Are workout plans personalised?
                                    </button>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#gymFaqAccordion">
                                    <div class="accordion-body">
                                        Yes. While group sessions follow a structured plan, coaches adjust exercises, weights and intensity based on each player's age, physical development, position (batsman/bowler/all-rounder) and any specific needs.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Is the gym supervised?
                                    </button>
                                </h3>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#gymFaqAccordion">
                                    <div class="accordion-body">
                                        All gym sessions are strictly supervised by qualified Strength &amp; Conditioning coaches who ensure proper form, appropriate progression and safety for all players.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h3 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        Do you focus on injury prevention?
                                    </button>
                                </h3>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#gymFaqAccordion">
                                    <div class="accordion-body">
                                        Absolutely. Warm-up routines, mobility work, proper form coaching and progressive loading are all designed to minimise injury risk. Recovery and stretching are emphasised alongside strength work.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="gym-cta-sec">
            <div class="container">
                <h2 class="gym-cta-title">Start Your Cricket Fitness Journey</h2>
                <p class="gym-cta-p">Experience how professional strength and conditioning can transform your game on the field.</p>
                <div>
                    <a href="contact?subject=Gym+Fitness+Enquiry" class="btn-zite-white">
                        <i class="fas fa-dumbbell"></i> Book Fitness Assessment
                    </a>
                    <a href="https://wa.me/919999999999?text=Hello%20Young%20Star%20Cricket%20Academy%2C%20I%20am%20interested%20in%20gym%20and%20fitness%20programs." target="_blank" class="btn-zite-whatsapp">
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
