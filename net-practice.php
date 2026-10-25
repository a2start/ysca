<?php

require_once __DIR__ . '/includes/programs-data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Turf Net Practice & Bowling Machine Sessions in Greater Noida - 10+ natural turf and astroturf net lanes with automated bowling machines and floodlights at Young Star Cricket Academy.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Turf Net Practice &amp; Bowling Machine Sessions — Greater Noida | Young Star Cricket Academy</title>
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
            background: linear-gradient(rgba(10, 19, 34, 0.88), rgba(10, 19, 34, 0.94)), url('assets/images/zite-bowling-nets.webp') center/cover no-repeat;
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

        
        .net-intro-sec {
            padding: 70px 0;
            background: #ffffff;
        }
        .net-intro-title {
            font-size: clamp(26px, 3.2vw, 36px);
            font-weight: 800;
            color: var(--zite-navy);
            margin-bottom: 20px;
            line-height: 1.25;
            font-family: 'Philosopher', serif;
        }
        .net-intro-p {
            font-size: 15px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            margin-bottom: 16px;
        }
        .net-img-box {
            position: relative;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 16px 36px -10px rgba(15, 23, 42, 0.18);
            border: 1px solid var(--zite-border);
        }
        .net-img-box img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            display: block;
            transition: transform 0.6s ease;
        }
        .net-img-box:hover img {
            transform: scale(1.03);
        }

       
        .net-features-sec {
            padding: 75px 0;
            background-color: var(--zite-bg-muted);
            border-top: 1px solid var(--zite-border);
            border-bottom: 1px solid var(--zite-border);
        }
        .net-sec-title {
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 800;
            color: var(--zite-navy);
            text-align: center;
            margin-bottom: 40px;
            font-family: 'Philosopher', serif;
        }
        .net-card {
            background: #ffffff;
            border: 1px solid var(--zite-border);
            border-radius: 12px;
            padding: 28px 24px;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }
        .net-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 32px -8px rgba(15, 23, 42, 0.12);
            border-color: var(--zite-orange);
        }
        .net-icon {
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
        .net-card:hover .net-icon {
            background: var(--zite-orange);
            color: #ffffff;
            transform: scale(1.05);
        }
        .net-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--zite-navy);
            margin-bottom: 10px;
        }
        .net-desc {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.6;
            margin-bottom: 0;
        }

        
        .net-schedule-sec {
            padding: 80px 0;
            background: #ffffff;
        }
        .slot-row {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            border-radius: 8px;
            margin-bottom: 8px;
            transition: background 0.2s ease;
        }
        .slot-row.stripe {
            background-color: var(--zite-bg-muted);
        }
        .slot-time {
            font-size: 14px;
            font-weight: 800;
            color: var(--zite-orange);
            width: 140px;
            flex-shrink: 0;
            letter-spacing: 0.02em;
        }
        .slot-activity {
            font-size: 14px;
            font-weight: 600;
            color: var(--zite-navy);
            margin-bottom: 0;
        }

        
        .net-infra-sec {
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

        
        .net-faq-sec {
            padding: 80px 0;
            background: #ffffff;
        }
        .net-accordion .accordion-item {
            border: 1px solid var(--zite-border);
            border-radius: 10px !important;
            margin-bottom: 12px;
            overflow: hidden;
        }
        .net-accordion .accordion-button {
            font-size: 16px;
            font-weight: 700;
            color: var(--zite-navy);
            background: #ffffff;
            padding: 18px 22px;
            box-shadow: none;
        }
        .net-accordion .accordion-button:not(.collapsed) {
            color: var(--zite-orange);
            background: #fff8f3;
        }
        .net-accordion .accordion-body {
            font-size: 14px;
            color: var(--zite-text-muted);
            line-height: 1.7;
            padding: 18px 22px;
        }

        
        .net-cta-sec {
            background: linear-gradient(135deg, #ea580c 0%, #f97316 100%);
            padding: 55px 0;
            color: #ffffff;
            text-align: center;
        }
        .net-cta-title {
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            font-family: 'Philosopher', serif;
        }
        .net-cta-desc {
            font-size: 15px;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto 25px;
            line-height: 1.6;
        }
        .net-cta-btn {
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
        .net-cta-btn:hover {
            transform: scale(1.04);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.25);
            color: var(--zite-orange) !important;
        }

        @media (max-width: 767.98px) {
            .zite-hero-stage {
                padding: 100px 0 45px;
            }
            .net-intro-sec,
            .net-features-sec,
            .net-schedule-sec,
            .net-infra-sec,
            .net-faq-sec {
                padding: 45px 0;
            }
            .net-img-box img {
                height: 260px;
            }
            .slot-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
                padding: 12px 14px;
            }
            .slot-time {
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
                        <span class="zite-hero-badge" data-aos="fade-down">PRACTICE INFRASTRUCTURE</span>
                        <h1 class="zite-hero-title" data-aos="fade-up" data-aos-delay="100">Turf Net Practice &amp; Bowling Machines</h1>
                        <p class="zite-hero-subtitle" data-aos="fade-up" data-aos-delay="200">
                            10+ dedicated natural turf and astroturf batting lanes equipped with multi-variation automated bowling machines, full fast-bowler run-ups, and professional evening floodlights in Greater Noida.
                        </p>
                    </div>
                </section>
                <section class="net-intro-sec">
                    <div class="container">
                        <div class="row align-items-center g-5">
                            <div class="col-lg-6" data-aos="fade-right">
                                <h2 class="net-intro-title">Repetition Breeds Mastery. Real Turf Bounce.</h2>
                                <p class="net-intro-p">
                                    Quality practice on true wickets is the defining difference between average performers and tournament match-winners. At Young Star Cricket Academy, our net practice complex provides players with genuine match-like conditions every single day.
                                </p>
                                <p class="net-intro-p">
                                    We maintain over 10 active practice nets featuring clay-curated natural turf wickets and high-density astroturf surfaces. Trainees experience authentic bounce, lateral seam movement, and spin off the deck, preparing them thoroughly for competitive district and state pitch conditions.
                                </p>
                                <p class="net-intro-p">
                                    Our lanes feature automated programmable bowling machines delivering speeds up to 150 km/h with swing, seam, and spin simulations, alongside specialized sidearm throwdown specialists who test your footwork and reflexes against extreme pace.
                                </p>
                                <div class="pt-2">
                                    <a href="contact?subject=Net+Practice+Booking+Enquiry" class="net-cta-btn" style="background:var(--zite-orange); color:#ffffff !important;">
                                        Book a Net Practice Session <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-left">
                                <div class="net-img-box">
                                    <img src="assets/images/zite-bowling-nets.webp" alt="Young Star Cricket Academy Turf Net Practice Greater Noida" width="600" height="400" loading="lazy">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="net-features-sec">
                    <div class="container">
                        <h2 class="net-sec-title" data-aos="fade-up">Elite Practice Infrastructure</h2>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="50">
                                <div class="net-card">
                                    <div class="net-icon"><i class="fas fa-layer-group"></i></div>
                                    <h3 class="net-title">10+ Dedicated Turf Lanes</h3>
                                    <p class="net-desc">Curated red-soil and black-soil natural turf pitches offering authentic carry, bounce, and seam movement mirroring Ranji &amp; BCCI grounds.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="net-card">
                                    <div class="net-icon"><i class="fas fa-robot"></i></div>
                                    <h3 class="net-title">Automated Bowling Machines</h3>
                                    <p class="net-desc">Dual-wheel programmable machines delivering in-swing, out-swing, off-spin, and leg-break deliveries at controlled speeds up to 150 km/h.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="150">
                                <div class="net-card">
                                    <div class="net-icon"><i class="fas fa-shield-alt"></i></div>
                                    <h3 class="net-title">All-Weather Astroturf Lanes</h3>
                                    <p class="net-desc">Heavy-duty synthetic astroturf tracks ensuring non-stop batting practice regardless of weather conditions, rainfall, or ground maintenance.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="net-card">
                                    <div class="net-icon"><i class="fas fa-running"></i></div>
                                    <h3 class="net-title">Full 25-Yard Fast Run-Ups</h3>
                                    <p class="net-desc">Spacious bowler approach areas allowing fast bowlers to complete their full unrestricted run-up without crowding or safety concerns.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="250">
                                <div class="net-card">
                                    <div class="net-icon"><i class="fas fa-baseball-ball"></i></div>
                                    <h3 class="net-title">Sidearm Speed Specialists</h3>
                                    <p class="net-desc">Dedicated coach throwdown specialists generating rapid 135+ km/h steep bounce and yorkers to sharpen reaction time against genuine pace.</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="net-card">
                                    <div class="net-icon"><i class="fas fa-lightbulb"></i></div>
                                    <h3 class="net-title">Floodlit Evening Net Sessions</h3>
                                    <p class="net-desc">High-lumen LED floodlighting covering all practice lanes, enabling focused post-school and after-work training sessions until late evening.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="net-schedule-sec">
                    <div class="container">
                        <div class="text-center mb-5" data-aos="fade-up">
                            <h2 class="net-sec-title mb-2">Practice Slot Architecture</h2>
                            <p class="text-muted">Structured practice slots for academy trainees, individual batters, and bowlers.</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                                <div class="slot-row stripe">
                                    <span class="slot-time">6:00 AM – 9:00 AM</span>
                                    <span class="slot-activity">Morning Match Prep &amp; Fresh Turf Seam Bowling Sessions</span>
                                </div>
                                <div class="slot-row">
                                    <span class="slot-time">9:30 AM – 12:00 PM</span>
                                    <span class="slot-activity">Individual 1-on-1 Corrective Net Batches &amp; High-Speed Video Capture</span>
                                </div>
                                <div class="slot-row stripe">
                                    <span class="slot-time">3:00 PM – 5:00 PM</span>
                                    <span class="slot-activity">Technical Bowling Machine Throwdown Drills (Bouncer, Yorker &amp; Spin)</span>
                                </div>
                                <div class="slot-row">
                                    <span class="slot-time">5:30 PM – 8:30 PM</span>
                                    <span class="slot-activity">Floodlit Intensive Group Nets, Target Bowling &amp; Scenario Pressure Batting</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="net-infra-sec">
                    <div class="container">
                        <div class="text-center mb-5" data-aos="fade-up">
                            <span class="zite-hero-badge">FACILITY SPECIFICATIONS</span>
                            <h2 style="font-size:clamp(24px, 3vw, 34px); font-weight:800; color:#fff; font-family:'Philosopher', serif; margin-top:8px;">
                                Net Safety &amp; Professional Equipment
                            </h2>
                            <p style="color:rgba(255,255,255,0.7); max-width:640px; margin:0 auto; font-size:14.5px;">
                                Every lane is built to professional player safety and international standards.
                            </p>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="50">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-border-all"></i></div>
                                    <p class="infra-label">Heavy-Duty Knotted Netting</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-eye-slash"></i></div>
                                    <p class="infra-label">Full Sight Screens on Ends</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-circle-notch"></i></div>
                                    <p class="infra-label">New SG Leather Match Balls</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-tint"></i></div>
                                    <p class="infra-label">Dedicated Curators &amp; Rollers</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-medkit"></i></div>
                                    <p class="infra-label">First Aid &amp; Physio On-Site</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-chair"></i></div>
                                    <p class="infra-label">Shaded Player Dugouts</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="350">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-video"></i></div>
                                    <p class="infra-label">Camera Mounting Tripods</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                                <div class="infra-item">
                                    <div class="infra-icon"><i class="fas fa-user-check"></i></div>
                                    <p class="infra-label">Dedicated Coach Supervision</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="net-faq-sec">
                    <div class="container">
                        <div class="text-center mb-5" data-aos="fade-up">
                            <h2 class="net-sec-title mb-2">Frequently Asked Questions</h2>
                            <p class="text-muted">Common questions about net practice and bowling machine sessions.</p>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                                <div class="accordion net-accordion" id="netFaq">
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#nfaq1">
                                                Can non-academy players or guest cricketers book net sessions?
                                            </button>
                                        </h3>
                                        <div id="nfaq1" class="accordion-collapse collapse show" data-bs-parent="#netFaq">
                                            <div class="accordion-body">
                                                Yes. While our regular batches have scheduled slots, dedicated turf and bowling machine lanes can be booked on hourly or monthly subscriptions by visiting players, corporate teams, and club cricketers subject to advance reservation.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nfaq2">
                                                Are bowling machine balls provided by the academy?
                                            </button>
                                        </h3>
                                        <div id="nfaq2" class="accordion-collapse collapse" data-bs-parent="#netFaq">
                                            <div class="accordion-body">
                                                Yes. Specialized polyurethane dimple machine balls and leather machine balls calibrated for machine wheels are provided with all bowling machine lane bookings.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nfaq3">
                                                What protective equipment is mandatory for net practice?
                                            </button>
                                        </h3>
                                        <div id="nfaq3" class="accordion-collapse collapse" data-bs-parent="#netFaq">
                                            <div class="accordion-body">
                                                Safety is paramount at YSCA. Full protective gear (BCCI/ICC compliant helmet with grille, batting pads, gloves, thigh guard, chest guard, and abdominal guard) is strictly mandatory for any player batting against leather balls or bowling machines.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h3 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#nfaq4">
                                                Can fast bowlers use spikes on the turf wickets?
                                            </button>
                                        </h3>
                                        <div id="nfaq4" class="accordion-collapse collapse" data-bs-parent="#netFaq">
                                            <div class="accordion-body">
                                                Yes, full-metal or rubber spikes are permitted and encouraged on our natural clay turf lanes to ensure authentic grip and bowling safety. Rubber studs or athletic sneakers are used on astroturf lanes.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="net-cta-sec">
                    <div class="container" data-aos="fade-up">
                        <h2 class="net-cta-title">Sharpen Your Batting &amp; Bowling Skills</h2>
                        <p class="net-cta-desc">
                            Experience 10+ professional turf nets and automated bowling machines in Greater Noida. Book your trial net session today.
                        </p>
                        <a href="contact?action=trial&amp;subject=Book+Net+Practice+Trial" class="net-cta-btn">
                            <i class="fas fa-baseball-ball"></i> Book Free Trial Net Session <i class="fas fa-arrow-right ms-1"></i>
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
