<?php

require_once __DIR__ . '/includes/programs-data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Professional Cricket Training in Greater Noida - BCCI certified coaches, full-size match grounds, natural turf pitches, floodlit practice nets and bio-mechanical video analysis at Young Star Cricket Academy.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cricket Training &amp; Coaching Grounds — Greater Noida | Young Star Cricket Academy</title>
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
            background: linear-gradient(rgba(10, 19, 34, 0.88), rgba(10, 19, 34, 0.94)), url('assets/images/zite-ground.jpg') center/cover no-repeat;
            padding: 130px 0 65px;
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
            font-size: clamp(30px, 4.5vw, 48px);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }
        .zite-hero-subtitle {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.85);
            max-width: 740px;
            line-height: 1.65;
            margin-bottom: 0;
        }

        .facility-intro-sec {
            padding: 70px 0;
            background: #ffffff;
        }
        .facility-intro-title {
            font-size: clamp(26px, 3.2vw, 36px);
            font-weight: 800;
            color: var(--zite-navy);
            margin-bottom: 20px;
            line-height: 1.25;
            font-family: 'Philosopher', serif;
        }
        .facility-intro-p {
            font-size: 15px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            margin-bottom: 16px;
        }
        .facility-img-box {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 16px 36px -10px rgba(15, 23, 42, 0.18);
            border: 1px solid var(--zite-border);
        }
        .facility-img-box img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }
        .facility-img-box:hover img {
            transform: scale(1.03);
        }

        .facility-features-sec {
            padding: 75px 0;
            background-color: var(--zite-bg-muted);
            border-top: 1px solid var(--zite-border);
            border-bottom: 1px solid var(--zite-border);
        }
        .facility-sec-title {
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 800;
            color: var(--zite-navy);
            text-align: center;
            margin-bottom: 40px;
            font-family: 'Philosopher', serif;
        }
        .pillar-card {
            background: #ffffff;
            border: 1px solid var(--zite-border);
            border-radius: 12px;
            padding: 28px 24px;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }
        .pillar-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px -8px rgba(15, 23, 42, 0.12);
            border-color: var(--zite-orange);
        }
        .pillar-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: rgba(249, 115, 22, 0.12);
            color: var(--zite-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 18px;
            transition: all 0.3s ease;
        }
        .pillar-card:hover .pillar-icon {
            background: var(--zite-orange);
            color: #ffffff;
            transform: scale(1.05);
        }
        .pillar-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--zite-navy);
            margin-bottom: 10px;
        }
        .pillar-desc {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.6;
            margin-bottom: 0;
        }

        .facility-schedule-sec {
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
            width: 140px;
            flex-shrink: 0;
            letter-spacing: 0.02em;
        }
        .schedule-activity {
            font-size: 14px;
            font-weight: 600;
            color: var(--zite-navy);
            margin-bottom: 0;
        }

        .facility-infra-sec {
            background-color: var(--zite-navy);
            padding: 80px 0;
            color: #ffffff;
        }
        .infra-item {
            display: flex;
            align-items: center;
            gap: 14px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 18px 20px;
            transition: background 0.3s ease;
        }
        .infra-item:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        .infra-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(249, 115, 22, 0.2);
            color: var(--zite-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 16px;
        }
        .infra-label {
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
            margin-bottom: 0;
        }

        .facility-faq-sec {
            padding: 80px 0;
            background: #ffffff;
        }
        .facility-accordion .accordion-item {
            border: 1px solid var(--zite-border);
            border-radius: 10px !important;
            margin-bottom: 12px;
            overflow: hidden;
        }
        .facility-accordion .accordion-button {
            font-size: 16px;
            font-weight: 700;
            color: var(--zite-navy);
            background: #ffffff;
            padding: 18px 22px;
            box-shadow: none;
        }
        .facility-accordion .accordion-button:not(.collapsed) {
            color: var(--zite-orange);
            background: #fff8f3;
        }
        .facility-accordion .accordion-body {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            padding: 18px 22px;
        }

        .facility-cta-sec {
            background: linear-gradient(135deg, #ea580c 0%, #f97316 100%);
            padding: 55px 0;
            color: #ffffff;
            text-align: center;
        }
        .facility-cta-title {
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            font-family: 'Philosopher', serif;
        }
        .facility-cta-desc {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto 25px;
            line-height: 1.6;
        }
        .facility-cta-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            color: var(--zite-navy) !important;
            padding: 13px 30px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            text-decoration: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.25s ease;
        }
        .facility-cta-btn:hover {
            transform: scale(1.04);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.25);
            color: var(--zite-orange) !important;
        }

        @media (max-width: 767.98px) {
            .zite-hero-stage {
                padding: 100px 0 45px;
            }
            .facility-intro-sec,
            .facility-features-sec,
            .facility-schedule-sec,
            .facility-infra-sec,
            .facility-faq-sec {
                padding: 45px 0;
            }
            .facility-img-box img {
                height: 260px;
            }
            .schedule-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                padding: 12px 14px;
            }
            .schedule-time {
                width: auto;
            }
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
                        <span class="zite-hero-badge" data-aos="fade-down">ACADEMY TRAINING FACILITY</span>
                        <h1 class="zite-hero-title" data-aos="fade-up" data-aos-delay="100">Cricket Training &amp; Coaching Grounds</h1>
                        <p class="zite-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                            Comprehensive cricket coaching on BCCI-standard turf wickets, full-size match grounds, and all-weather practice tracks supervised by certified coaching mentors in Greater Noida.
                        </p>
                    </div>
                </section>

                <section class="facility-intro-sec">
                    <div class="container">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6" data-aos="fade-right">
                                <h2 class="facility-intro-title">Train With Precision. Build Champion Mindset.</h2>
                                <p class="facility-intro-p">
                                    At Young Star Cricket Academy (YSCA), cricket training is treated as a science as much as an art. Our training ecosystem combines rigorous technical biomechanics, situational match play simulations, and athletic discipline to groom players capable of competing at district, state, and national age-group tournaments.
                                </p>
                                <p class="facility-intro-p">
                                    Our expansive cricket grounds feature multiple natural turf pitches prepared with professional clay soil, floodlit open-wicket practice zones, and cutting-edge bowling machine tracks. Trainees benefit from structured technical batting drills, pace and spin bowling masterclasses, and high-intensity fielding circuits.
                                </p>
                                <p class="facility-intro-p">
                                    Whether starting out in grassroots cricket or preparing for competitive Ranji and state trials, our NIS &amp; BCCI certified coaching panel provides structured, measurable, and personalized development pathways.
                                </p>
                                <div class="pt-2">
                                    <a href="contact?subject=Cricket+Training+Program+Enquiry" class="facility-cta-btn" style="background:var(--zite-orange); color:#ffffff !important;">
                                        Book Free Training Trial <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-left">
                                <div class="facility-img-box">
                                    <img src="assets/images/zite-fielding.jpg" alt="Young Star Cricket Academy Practice &amp; Fielding Sessions" width="600" height="400" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="facility-features-sec">
                    <div class="container">
                        <h2 class="facility-sec-title" data-aos="fade-up">Pillars of Our Cricket Training Architecture</h2>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                                <div class="pillar-card">
                                    <div class="pillar-icon"><i class="fas fa-baseball-ball"></i></div>
                                    <h3 class="pillar-title">Batting Technical Mastery</h3>
                                    <p class="pillar-desc">Grip alignment, head stillness, balance, front and back-foot strokeplay, shot selection under pressure, and power-hitting technique.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="pillar-card">
                                    <div class="pillar-icon"><i class="fas fa-bolt"></i></div>
                                    <h3 class="pillar-title">Pace &amp; Seam Craft</h3>
                                    <p class="pillar-desc">Run-up consistency, gather and leap alignment, upright wrist seam presentation, reverse swing, and bouncer/yorker accuracy.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                                <div class="pillar-card">
                                    <div class="pillar-icon"><i class="fas fa-undo-alt"></i></div>
                                    <h3 class="pillar-title">Spin Bowling Artistry</h3>
                                    <p class="pillar-desc">Finger and wrist spin revolutions, flight and drift control, subtle variations (arm ball, googly, carrom ball), and bowling to strategic fields.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="pillar-card">
                                    <div class="pillar-icon"><i class="fas fa-shield-alt"></i></div>
                                    <h3 class="pillar-title">Dynamic Athletic Fielding</h3>
                                    <p class="pillar-desc">Direct-hit target drills, slip and close-in catching reflexes, boundary diving, relay throwing, and fast ground pick-and-release mechanics.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                                <div class="pillar-card">
                                    <div class="pillar-icon"><i class="fas fa-video"></i></div>
                                    <h3 class="pillar-title">Biomechanical Video Analysis</h3>
                                    <p class="pillar-desc">High-speed slow-motion cameras tracking batting elbow angles, bowling release height, and front-foot landing to rectify technical flaws.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="pillar-card">
                                    <div class="pillar-icon"><i class="fas fa-trophy"></i></div>
                                    <h3 class="pillar-title">Match Temperament &amp; Tactics</h3>
                                    <p class="pillar-desc">Weekly inter-academy red-ball and white-ball matches, chase pressure scenarios, field captaincy drills, and psychological resilience coaching.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="facility-schedule-sec">
                    <div class="container">
                        <div class="text-center mb-5" data-aos="fade-up">
                            <h2 class="facility-sec-title mb-2">Weekly Training Structure</h2>
                            <p class="text-muted">A balanced blend of technical instruction, net volume, match scenarios, and recovery.</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                                <div class="schedule-row stripe">
                                    <span class="schedule-time">Monday</span>
                                    <span class="schedule-activity">Batting Biomechanics &amp; Top-Hand Drills + Pace Bowling Alignment Nets</span>
                                </div>
                                <div class="schedule-row">
                                    <span class="schedule-time">Tuesday</span>
                                    <span class="schedule-activity">Spin Bowling Flight &amp; Drift + Range Hitting &amp; Bowling Machine Drills</span>
                                </div>
                                <div class="schedule-row stripe">
                                    <span class="schedule-time">Wednesday</span>
                                    <span class="schedule-activity">High-Intensity Fielding Obstacle Circuits, Direct Hits &amp; Slip Catching</span>
                                </div>
                                <div class="schedule-row">
                                    <span class="schedule-time">Thursday</span>
                                    <span class="schedule-activity">Open Wicket Match Simulations &amp; Situational Target Chasing (20/40 Overs)</span>
                                </div>
                                <div class="schedule-row stripe">
                                    <span class="schedule-time">Friday</span>
                                    <span class="schedule-activity">Technical Video Review Analysis + Individual 1-on-1 Corrective Net Batches</span>
                                </div>
                                <div class="schedule-row">
                                    <span class="schedule-time">Saturday</span>
                                    <span class="schedule-activity">Full-Dress Inter-Academy League Practice Matches &amp; Umpired Scenarios</span>
                                </div>
                                <div class="schedule-row stripe">
                                    <span class="schedule-time">Sunday</span>
                                    <span class="schedule-activity">Active Recovery, Mobility Screening &amp; Optional Masterclass Throwdowns</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="facility-infra-sec">
                    <div class="container">
                        <div class="text-center mb-5" data-aos="fade-up">
                            <span class="zite-hero-badge">GROUND &amp; EQUIPMENT</span>
                            <h2 style="font-size:clamp(24px, 3vw, 34px); font-weight:800; color:#fff; font-family:'Philosopher', serif; margin-top:8px;">
                                Professional Infrastructure at YSCA
                            </h2>
                            <p style="color:rgba(255,255,255,0.7); max-width:640px; margin:0 auto; font-size:14.5px;">
                                Every training tool a cricketer requires to transition from grassroots potential to professional selection.
                            </p>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-sun"></i></div>
                                    <p class="infra-label">Full Cricket Ground</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-lightbulb"></i></div>
                                    <p class="infra-label">Floodlit Evening Nets</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-microchip"></i></div>
                                    <p class="infra-label">Programmable Bowling Machines</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    <p class="infra-label">Radar Bowling Speed Guns</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-video"></i></div>
                                    <p class="infra-label">High-Frame Video Cameras</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-dumbbell"></i></div>
                                    <p class="infra-label">Athletic Conditioning Gym</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-hotel"></i></div>
                                    <p class="infra-label">On-Campus Boarding Hostel</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-user-tie"></i></div>
                                    <p class="infra-label">NIS &amp; BCCI Certified Coaches</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="facility-faq-sec">
                    <div class="container">
                        <div class="text-center mb-5" data-aos="fade-up">
                            <h2 class="facility-sec-title mb-2">Frequently Asked Questions</h2>
                            <p class="text-muted">Everything you need to know about joining cricket training at YSCA.</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                                <div class="accordion facility-accordion" id="trainingFaq">
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tfaq1">
                                                What is the minimum age to enroll in cricket training?
                                            </button>
                                        </h3>
                                        <div id="tfaq1" class="accordion-collapse collapse show" data-bs-parent="#trainingFaq">
                                            <div class="accordion-body">
                                                We train players starting from age 6 in our grassroots Foundation Cricket Program. We offer age-segregated batches for Under-10, Under-14, Under-16, Under-19, and senior competitive players.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tfaq2">
                                                Is there a skill trial before joining?
                                            </button>
                                        </h3>
                                        <div id="tfaq2" class="accordion-collapse collapse" data-bs-parent="#trainingFaq">
                                            <div class="accordion-body">
                                                Yes. Every prospective trainee participates in a 1-day free trial assessment session where our head coaches evaluate basic motor skills, hand-eye coordination, current technique, and fitness to assign the ideal training batch.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tfaq3">
                                                Do you provide cricket gear or do players bring their own?
                                            </button>
                                        </h3>
                                        <div id="tfaq3" class="accordion-collapse collapse" data-bs-parent="#trainingFaq">
                                            <div class="accordion-body">
                                                The academy provides practice balls, cones, agility hurdles, bowling machines, and starter kits for trial sessions. Regular trainees are expected to have their personal cricket kit (bat, pads, gloves, helmet, and abdominal guard) for hygiene and fit.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tfaq4">
                                                What opportunities exist for match play and trials?
                                            </button>
                                        </h3>
                                        <div id="tfaq4" class="accordion-collapse collapse" data-bs-parent="#trainingFaq">
                                            <div class="accordion-body">
                                                We organize regular weekend match leagues, inter-academy invitationals, and state trial exposure matches. High-performing players receive direct nominations for district and state age-group trials under BCCI-affiliated bodies.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="facility-cta-sec">
                    <div class="container" data-aos="fade-up">
                        <h2 class="facility-cta-title">Start Your Professional Cricket Journey Today</h2>
                        <p class="facility-cta-desc">
                            Train with the finest coaches and infrastructure in Greater Noida. Limited batch seats to preserve individual attention.
                        </p>
                        <a href="contact?action=trial&amp;subject=Book+Cricket+Training+Trial" class="facility-cta-btn">
                            <i class="fas fa-baseball-ball"></i> Book Free 1-Day Trial Session <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </section>
            </main>

            <?php include_once 'fotter.php'; ?>
        </div>
    </div>

    <script src="assets/js/plugins/jquery-3.7.1.min.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/plugins/gsap/gsap.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollTrigger.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollSmoother.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>
