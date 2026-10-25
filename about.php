<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="Young Star Cricket Academy - Dedicated to cultivating exceptional cricket talent with certified coaches, turf pitches, and world-class training facilities.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>About Us | Young Star Cricket Academy</title>
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Philosopher:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
        <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/plugins/slick.css">
        <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/plugins/aos.css">
        <link rel="stylesheet" href="assets/css/spacings.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <style>

        .page-hero {
          position: relative;
          background-size: cover;
          background-position: center;
          padding: 130px 0 65px;
          border-bottom: 2px solid #fea630;
        }
        .page-hero::after {
          position: absolute;
          top: 0;
          left: 0;
          content: "";
          width: 100%;
          height: 100%;
          background: linear-gradient(180deg, rgba(7, 22, 44, 0.88) 0%, rgba(7, 22, 44, 0.94) 100%);
          z-index: 1;
        }
        .page-hero .container {
          position: relative;
          z-index: 2;
        }
        .page-hero .page-content h1 {
          font-family: 'Philosopher', serif;
          font-size: clamp(30px, 5.5vw, 52px);
          font-weight: 700;
          color: #ffffff;
          margin-bottom: 12px;
          letter-spacing: -0.5px;
        }
        .page-hero .page-content ul {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-wrap: wrap;
          gap: 8px;
          list-style: none;
          padding: 0;
          margin: 0;
        }
        .page-hero .page-content ul li {
          color: #cbd5e1;
          font-size: 15px;
          font-weight: 500;
          display: inline-flex;
          align-items: center;
        }
        .page-hero .page-content ul li a {
          color: #fea630;
          text-decoration: none;
          transition: color 0.2s ease;
        }
        .page-hero .page-content ul li a:hover {
          color: #ffffff;
        }
        .page-hero .page-content ul li:not(:last-child)::after {
          content: "\f105";
          font-family: "Font Awesome 5 Free", "FontAwesome";
          font-weight: 900;
          margin-left: 8px;
          color: #64748b;
          font-size: 13px;
        }

        .ysca-about-sec {
          padding: 85px 0 65px;
          background-color: #ffffff;
        }
        .ysca-about-img-wrap {
          position: relative;
          border-radius: 20px;
        }
        .ysca-about-img-box {
          position: relative;
          border-radius: 20px;
          overflow: hidden;
          box-shadow: 0 16px 40px rgba(7, 22, 44, 0.1);
          border: 1px solid #e2e8f0;
          background: #f8fafc;
        }
        .ysca-about-main-img {
          width: 100%;
          height: auto;
          aspect-ratio: 4 / 3.8;
          object-fit: cover;
          display: block;
          transition: transform 0.5s ease;
        }
        .ysca-about-img-box:hover .ysca-about-main-img {
          transform: scale(1.03);
        }
        .ysca-about-exp-badge {
          position: absolute;
          bottom: -18px;
          right: -15px;
          background: linear-gradient(135deg, #0b1747 0%, #07162c 100%);
          border: 2px solid #fea630;
          border-radius: 16px;
          padding: 14px 20px;
          color: #ffffff;
          display: flex;
          align-items: center;
          gap: 14px;
          box-shadow: 0 12px 28px rgba(7, 22, 44, 0.22);
          z-index: 3;
        }
        .badge-num {
          font-family: 'Philosopher', serif;
          font-size: 32px;
          font-weight: 700;
          color: #fea630;
          line-height: 1;
        }
        .badge-text {
          font-size: 12px;
          font-weight: 700;
          line-height: 1.35;
          text-transform: uppercase;
          letter-spacing: 0.05em;
          color: #f1f5f9;
        }

        .ysca-about-content {
          padding-left: 15px;
        }
        .ysca-about-badge {
          display: inline-flex;
          align-items: center;
          gap: 6px;
          font-size: 12.5px;
          font-weight: 800;
          letter-spacing: 0.16em;
          color: #ea580c;
          text-transform: uppercase;
          margin-bottom: 12px;
        }
        .ysca-about-title {
          font-family: 'Philosopher', serif;
          font-size: clamp(26px, 3.8vw, 42px);
          font-weight: 700;
          color: #0b1747;
          line-height: 1.22;
          margin-bottom: 18px;
        }
        .ysca-gold-text {
          color: #fea630;
        }
        .ysca-about-desc {
          font-size: 15.5px;
          line-height: 1.72;
          color: #475569;
          margin-bottom: 14px;
        }
        .ysca-about-highlights {
          list-style: none;
          padding: 0;
          margin: 22px 0 28px 0;
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          gap: 12px 18px;
        }
        .ysca-about-highlights li {
          display: flex;
          align-items: center;
          gap: 10px;
          font-size: 14px;
          font-weight: 700;
          color: #1e293b;
        }
        .ysca-about-highlights li i {
          color: #16a34a;
          font-size: 15px;
          flex-shrink: 0;
        }

        .ysca-vm-sec {
          padding: 10px 0 70px;
          background: #ffffff;
        }
        .ysca-vm-card {
          background: #ffffff;
          border-radius: 20px;
          border: 1.5px solid #e2e8f0;
          padding: 34px 30px;
          height: 100%;
          box-shadow: 0 10px 30px rgba(7, 22, 44, 0.05);
          transition: all 0.35s ease;
          position: relative;
          overflow: hidden;
          display: flex;
          flex-direction: column;
        }
        .ysca-vm-card::before {
          content: "";
          position: absolute;
          top: 0;
          left: 0;
          right: 0;
          height: 4px;
          background: linear-gradient(90deg, #fea630, #ea580c);
          opacity: 0;
          transition: opacity 0.3s ease;
        }
        .ysca-vm-card:hover {
          transform: translateY(-5px);
          border-color: #cbd5e1;
          box-shadow: 0 18px 40px rgba(7, 22, 44, 0.1);
        }
        .ysca-vm-card:hover::before {
          opacity: 1;
        }
        .ysca-vm-icon-pod {
          width: 54px;
          height: 54px;
          border-radius: 14px;
          background: rgba(254, 166, 48, 0.14);
          border: 1px solid rgba(254, 166, 48, 0.35);
          color: #ea580c;
          display: inline-flex;
          align-items: center;
          justify-content: center;
          font-size: 22px;
          margin-bottom: 20px;
        }
        .ysca-vm-title {
          font-family: 'Philosopher', serif;
          font-size: 24px;
          font-weight: 700;
          color: #0b1747;
          margin-bottom: 12px;
        }
        .ysca-vm-desc {
          font-size: 15px;
          line-height: 1.72;
          color: #475569;
          margin-bottom: 22px;
          flex-grow: 1;
        }
        .ysca-vm-pill {
          display: inline-block;
          background: #f8fafc;
          border: 1px solid #e2e8f0;
          color: #0b1747;
          font-size: 12.5px;
          font-weight: 700;
          padding: 6px 16px;
          border-radius: 30px;
          align-self: flex-start;
        }

        .ysca-pillars-sec {
          padding: 75px 0;
          background-color: #f8fafc;
          border-top: 1px solid #e2e8f0;
          border-bottom: 1px solid #e2e8f0;
        }
        .ysca-pillars-header {
          text-align: center;
          max-width: 680px;
          margin: 0 auto 45px;
        }
        .ysca-pillar-card {
          background: #ffffff;
          border: 1px solid #e2e8f0;
          border-radius: 18px;
          padding: 26px 22px;
          height: 100%;
          box-shadow: 0 6px 20px rgba(7, 22, 44, 0.04);
          transition: all 0.3s ease;
          text-align: left;
        }
        .ysca-pillar-card:hover {
          transform: translateY(-4px);
          border-color: #fea630;
          box-shadow: 0 14px 32px rgba(7, 22, 44, 0.09);
        }
        .ysca-pillar-icon {
          width: 46px;
          height: 46px;
          border-radius: 12px;
          background: rgba(11, 23, 71, 0.06);
          color: #0b1747;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 19px;
          margin-bottom: 18px;
          transition: all 0.3s ease;
        }
        .ysca-pillar-card:hover .ysca-pillar-icon {
          background: #fea630;
          color: #07162c;
        }
        .ysca-pillar-title {
          font-family: 'Philosopher', serif;
          font-size: 19px;
          font-weight: 700;
          color: #0b1747;
          margin-bottom: 10px;
        }
        .ysca-pillar-desc {
          font-size: 14px;
          line-height: 1.62;
          color: #64748b;
          margin-bottom: 0;
        }

        .ysca-stats-ribbon {
          padding: 60px 0;
          background: linear-gradient(135deg, #0b1747 0%, #07162c 100%);
          color: #ffffff;
          border-bottom: 2px solid #fea630;
        }
        .ysca-stat-item {
          text-align: center;
          padding: 10px;
        }
        .ysca-stat-num {
          font-family: 'Philosopher', serif;
          font-size: clamp(34px, 4.5vw, 48px);
          font-weight: 700;
          color: #fea630;
          line-height: 1;
          margin-bottom: 8px;
        }
        .ysca-stat-label {
          font-size: 13px;
          font-weight: 700;
          color: #cbd5e1;
          text-transform: uppercase;
          letter-spacing: 0.08em;
        }

        .ysca-about-cta-sec {
          padding: 75px 0 85px;
          background: #ffffff;
        }
        .ysca-about-cta-box {
          background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
          border: 1.5px solid #e2e8f0;
          border-radius: 24px;
          padding: 48px 36px;
          text-align: center;
          box-shadow: 0 10px 30px rgba(7, 22, 44, 0.05);
        }
        .ysca-about-cta-box h3 {
          font-family: 'Philosopher', serif;
          font-size: clamp(24px, 3.5vw, 36px);
          font-weight: 700;
          color: #0b1747;
          margin-bottom: 12px;
        }
        .ysca-about-cta-box p {
          font-size: 15.5px;
          color: #475569;
          max-width: 680px;
          margin: 0 auto 28px;
          line-height: 1.68;
        }
        .ysca-about-cta-btns {
          display: flex;
          justify-content: center;
          align-items: center;
          flex-wrap: wrap;
          gap: 14px;
        }
        .btn-ysca-primary {
          background: linear-gradient(135deg, #fea630 0%, #f59e0b 100%);
          color: #07162c !important;
          font-weight: 800;
          font-size: 14px;
          padding: 13px 28px;
          border-radius: 10px;
          text-decoration: none;
          display: inline-flex;
          align-items: center;
          gap: 8px;
          box-shadow: 0 4px 14px rgba(254, 166, 48, 0.35);
          transition: all 0.25s ease;
        }
        .btn-ysca-primary:hover {
          transform: translateY(-2px);
          box-shadow: 0 6px 18px rgba(254, 166, 48, 0.45);
          background: #07162c;
          color: #ffffff !important;
        }
        .btn-ysca-secondary {
          background: #ffffff;
          color: #0b1747 !important;
          border: 1.5px solid #cbd5e1;
          font-weight: 700;
          font-size: 14px;
          padding: 13px 26px;
          border-radius: 10px;
          text-decoration: none;
          display: inline-flex;
          align-items: center;
          gap: 8px;
          transition: all 0.25s ease;
        }
        .btn-ysca-secondary:hover {
          border-color: #0b1747;
          background: #0b1747;
          color: #ffffff !important;
          transform: translateY(-2px);
        }

        @media (max-width: 991.98px) {
          .ysca-about-sec {
            padding: 60px 0 45px;
          }
          .ysca-about-content {
            padding-left: 0;
            margin-top: 36px;
          }
          .ysca-about-exp-badge {
            bottom: -15px;
            right: 15px;
            padding: 10px 16px;
          }
          .badge-num {
            font-size: 26px;
          }
          .badge-text {
            font-size: 11px;
          }
          .ysca-about-highlights {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
          }
        }

        @media (max-width: 767.98px) {
          .page-hero {
            padding: 90px 0 45px;
          }
          .page-hero .page-content h1 {
            font-size: 32px;
          }
          .ysca-about-sec {
            padding: 45px 0 30px;
          }
          .ysca-about-main-img {
            aspect-ratio: 16 / 11;
          }
          .ysca-about-exp-badge {
            position: static;
            margin-top: 14px;
            display: inline-flex;
            width: auto;
          }
          .ysca-about-highlights {
            grid-template-columns: 1fr;
            gap: 9px;
            margin-bottom: 20px;
          }
          .ysca-vm-sec {
            padding: 10px 0 50px;
          }
          .ysca-vm-card {
            padding: 24px 20px;
          }
          .ysca-vm-title {
            font-size: 20px;
          }
          .ysca-pillars-sec {
            padding: 50px 0;
          }
          .ysca-pillars-header {
            margin-bottom: 30px;
          }
          .ysca-stat-item {
            margin-bottom: 20px;
          }
          .ysca-about-cta-sec {
            padding: 50px 0 60px;
          }
          .ysca-about-cta-box {
            padding: 32px 20px;
            border-radius: 18px;
          }
          .ysca-about-cta-btns {
            flex-direction: column;
            width: 100%;
          }
          .btn-ysca-primary,
          .btn-ysca-secondary {
            width: 100%;
            justify-content: center;
          }
        }

        @media (max-width: 480px) {
          .page-hero {
            padding: 75px 0 35px;
          }
          .page-hero .page-content h1 {
            font-size: 28px;
          }
          .ysca-about-title {
            font-size: 24px;
          }
          .ysca-about-desc {
            font-size: 14.5px;
          }
          .ysca-pillar-card {
            padding: 20px 16px;
          }
        }
        </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="page-hero bg_cover p-r z-1" style="background-image: url('assets/images/abt-bg.jpg');" data-src="assets/images/abt-bg.jpg">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="page-content text-center">
                                    <h1>About Us</h1>
                                    <ul>
                                        <li><a href="./">Home</a></li>
                                        <li>About Us</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ysca-about-sec">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-12 mb-4 mb-lg-0">
                                <div class="ysca-about-img-wrap" data-aos="fade-right" data-aos-duration="900">
                                    <div class="ysca-about-img-box">
                                        <img src="assets/images/cric-wel.webp" alt="Young Star Cricket Academy Practice Ground" class="img-fluid ysca-about-main-img" width="500" height="475" loading="eager">
                                    </div>
                                    <div class="ysca-about-exp-badge">
                                        <span class="badge-num">15+</span>
                                        <span class="badge-text">Years of Coaching<br>Excellence</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7 col-12">
                                <div class="ysca-about-content" data-aos="fade-left" data-aos-duration="900">
                                    <span class="ysca-about-badge">
                                        <i class="fas fa-certificate"></i> ABOUT OUR ACADEMY
                                    </span>
                                    <h2 class="ysca-about-title">
                                        Young Star <span class="ysca-gold-text">Cricket Academy</span>
                                    </h2>
                                    
                                    <p class="ysca-about-desc">
                                        Young Star Cricket Academy is a professionally managed cricket training institute focused on developing young talent through structured coaching, discipline, and real match exposure. We believe that strong fundamentals and the right guidance are essential for long-term success in cricket.
                                    </p>
                                    <p class="ysca-about-desc">
                                        Our academy offers age-wise and skill-based training programs designed to help players improve technique, fitness, and game awareness. With limited batch sizes, we ensure personal attention and focused coaching for every trainee.
                                    </p>
                                    <p class="ysca-about-desc">
                                        The coaching team at Young Star Cricket Academy includes experienced and certified coaches with professional cricket backgrounds. Their match experience and mentoring approach help players understand the game beyond practice sessions.
                                    </p>
                                    <p class="ysca-about-desc">
                                        We aim to create a positive and competitive training environment where players grow with confidence, discipline, and a strong passion for the game, preparing them for higher levels of competitive cricket.
                                    </p>

                                    <ul class="ysca-about-highlights">
                                        <li><i class="fas fa-check-circle"></i> <span>BCCI &amp; NIS Certified Coaches</span></li>
                                        <li><i class="fas fa-check-circle"></i> <span>1:12 Coach-to-Player Ratio</span></li>
                                        <li><i class="fas fa-check-circle"></i> <span>12+ Turf &amp; Astro Net Pitches</span></li>
                                        <li><i class="fas fa-check-circle"></i> <span>Regular Match Simulation Exposure</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ysca-vm-sec">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-duration="800">
                                <div class="ysca-vm-card">
                                    <div class="ysca-vm-icon-pod">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                    <h3 class="ysca-vm-title">Our Vision</h3>
                                    <p class="ysca-vm-desc">
                                        Our vision is to become a trusted cricket academy known for quality coaching, player development, and producing disciplined, competitive cricketers at district, state, and higher levels.
                                    </p>
                                    <span class="ysca-vm-pill">
                                        <i class="fas fa-star text-warning me-1"></i> Quality Coaching &bull; Player Development
                                    </span>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-12" data-aos="fade-up" data-aos-duration="1000">
                                <div class="ysca-vm-card">
                                    <div class="ysca-vm-icon-pod">
                                        <i class="fas fa-bullseye"></i>
                                    </div>
                                    <h3 class="ysca-vm-title">Our Mission</h3>
                                    <p class="ysca-vm-desc">
                                        Our mission is to create a positive and professional training environment where young cricketers can develop skills, discipline, confidence, and a winning mindset. We aim to prepare players not only for matches, but for long-term success in cricket.
                                    </p>
                                    <span class="ysca-vm-pill">
                                        <i class="fas fa-trophy text-warning me-1"></i> Winning Mindset &bull; Long-Term Success
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ysca-pillars-sec">
                    <div class="container">
                        <div class="ysca-pillars-header" data-aos="fade-up" data-aos-duration="800">
                            <span class="ysca-about-badge">
                                <i class="fas fa-shield-alt"></i> WHY YOUNG STAR CRICKET ACADEMY
                            </span>
                            <h2 class="ysca-about-title mb-0">
                                Built for Complete <span class="ysca-gold-text">Player Development</span>
                            </h2>
                        </div>

                        <div class="row g-4">
                            <div class="col-lg-3 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="700">
                                <div class="ysca-pillar-card">
                                    <div class="ysca-pillar-icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <h4 class="ysca-pillar-title">Certified Mentors</h4>
                                    <p class="ysca-pillar-desc">
                                        BCCI, NIS &amp; ICC certified coaches with real professional domestic match backgrounds guide each trainee personally.
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="850">
                                <div class="ysca-pillar-card">
                                    <div class="ysca-pillar-icon">
                                        <i class="fas fa-cricket"></i>
                                    </div>
                                    <h4 class="ysca-pillar-title">Turf Nets &amp; Machines</h4>
                                    <p class="ysca-pillar-desc">
                                        12+ all-weather international standard turf pitches, cement tracks, and professional programmable bowling machines.
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1000">
                                <div class="ysca-pillar-card">
                                    <div class="ysca-pillar-icon">
                                        <i class="fas fa-dumbbell"></i>
                                    </div>
                                    <h4 class="ysca-pillar-title">Conditioning Gym</h4>
                                    <p class="ysca-pillar-desc">
                                        Specialized cricket-specific fitness facility focusing on bat-speed, bowling pace, rotational core, and injury prevention.
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1150">
                                <div class="ysca-pillar-card">
                                    <div class="ysca-pillar-icon">
                                        <i class="fas fa-hotel"></i>
                                    </div>
                                    <h4 class="ysca-pillar-title">Residential Hostel</h4>
                                    <p class="ysca-pillar-desc">
                                        Furnished outstation player hostel adjacent to the grounds with 24/7 security and sports nutritionist planned meals.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ysca-stats-ribbon">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-3 col-6">
                                <div class="ysca-stat-item">
                                    <div class="ysca-stat-num">500+</div>
                                    <div class="ysca-stat-label">Cricketers Trained</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="ysca-stat-item">
                                    <div class="ysca-stat-num">12+</div>
                                    <div class="ysca-stat-label">Turf &amp; Astro Nets</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="ysca-stat-item">
                                    <div class="ysca-stat-num">8+</div>
                                    <div class="ysca-stat-label">Certified Coaches</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="ysca-stat-item">
                                    <div class="ysca-stat-num">100%</div>
                                    <div class="ysca-stat-label">Match Exposure</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="ysca-about-cta-sec">
                    <div class="container">
                        <div class="ysca-about-cta-box" data-aos="zoom-in" data-aos-duration="850">
                            <h3>Ready to Start Your Professional Cricket Journey?</h3>
                            <p>
                                Experience our world-class training facilities firsthand. Book a 1-day free trial assessment session on live turf with our head coaching panel.
                            </p>
                            <div class="ysca-about-cta-btns">
                                <a href="contact?action=trial" class="btn-ysca-primary">
                                    <i class="fas fa-calendar-check"></i> Book 1-Day Free Trial
                                </a>
                                <a href="tel:+919910543666" class="btn-ysca-secondary">
                                    <i class="fas fa-phone-alt"></i> Call +91 99105 43666
                                </a>
                            </div>
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
    <script src="assets/js/plugins/gsap/SplitText.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollSmoother.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollTrigger.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.counterup.min.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>