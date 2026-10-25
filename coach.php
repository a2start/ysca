<?php
require_once __DIR__ . '/includes/coaches-data.php';
$coaches = getCoachesList();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Meet the elite coaching faculty at Young Star Cricket Academy, Greater Noida. Former Ranji Trophy and certified ECB, BCCI, ICC coaches.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Our Coaches | Coaching Faculty - Young Star Cricket Academy</title>
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300..800;1,9..40,300..800&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.css">
    <link rel="stylesheet" href="assets/css/spacings.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        :root {
            --ys-navy-dark:  #07162c;
            --ys-navy:       #0b1747;
            --ys-navy-light: #152766;
            --ys-gold:       #fea630;
            --ys-gold-hover: #e89903;
            --ys-gold-soft:  #fff6e8;
            --ys-teal:       #0e91b2;
            --ys-card-border:#e2e8f0;
            --ys-bg-light:   #f8fafc;
            --ys-text-main:  #1e293b;
            --ys-text-muted: #64748b;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--ys-text-main);
            overflow-x: hidden;
            background-color: #f8fafc;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Philosopher', serif;
            color: var(--ys-navy);
        }

        .coaches-hero-area {
            background: linear-gradient(135deg, #07162c 0%, #0b1747 60%, #152766 100%);
            padding: 104px 0 42px;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 1199.98px) {
            .coaches-hero-area {
                padding: 96px 0 38px;
            }
        }

        @media (max-width: 767.98px) {
            .coaches-hero-area {
                padding: 86px 0 32px;
            }
        }

        .coaches-hero-area::before {
            content: "";
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(254, 166, 48, 0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        .breadcrumb-trail {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.75);
            margin-bottom: 16px;
            font-weight: 500;
        }

        .breadcrumb-trail a {
            color: rgba(255, 255, 255, 0.85);
            transition: color 0.2s;
        }

        .breadcrumb-trail a:hover {
            color: var(--ys-gold);
        }

        .breadcrumb-trail i {
            font-size: 11px;
            color: var(--ys-gold);
        }

        .coaches-hero-title {
            color: #ffffff !important;
            font-size: clamp(34px, 4.5vw, 50px);
            font-weight: 700;
            margin-bottom: 12px;
        }

        .coaches-hero-sub {
            color: rgba(255, 255, 255, 0.85);
            font-size: 17px;
            max-width: 650px;
            margin-bottom: 0;
            line-height: 1.6;
        }

        .coaches-roster-section {
            padding: 80px 0 100px;
        }

        .coaches-intro-header {
            text-align: center;
            max-width: 750px;
            margin: 0 auto 55px;
        }

        .coaches-intro-header h2 {
            font-size: 36px;
            font-weight: 700;
            color: var(--ys-navy);
            margin-bottom: 12px;
        }

        .coaches-intro-header p {
            color: var(--ys-text-muted);
            font-size: 16px;
            line-height: 1.6;
        }

        .coach-roster-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid var(--ys-card-border);
            box-shadow: 0 10px 30px rgba(11, 23, 71, 0.05);
            margin-bottom: 35px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .coach-roster-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(11, 23, 71, 0.1);
            border-color: rgba(254, 166, 48, 0.4);
        }

        .coach-card-row {
            display: flex;
            align-items: stretch;
            flex-wrap: wrap;
        }

        .coach-card-media {
            width: 300px;
            background: #091530;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 35px 25px;
            flex-shrink: 0;
            text-align: center;
        }

        @media (max-width: 991.98px) {
            .coach-card-media {
                width: 100%;
                padding: 30px 20px;
            }
        }

        .coach-card-avatar {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            padding: 5px;
            background: linear-gradient(135deg, var(--ys-gold) 0%, #ffffff 50%, var(--ys-gold) 100%);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            margin-bottom: 16px;
        }

        .coach-card-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            display: block;
        }

        .coach-badge-pill {
            background: var(--ys-gold);
            color: #0b1747;
            font-size: 12px;
            font-weight: 700;
            padding: 5px 14px;
            border-radius: 20px;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .coach-card-content {
            flex: 1;
            padding: 35px 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        @media (max-width: 767.98px) {
            .coach-card-content {
                padding: 25px 20px;
            }
        }

        .coach-card-title-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 12px;
        }

        .coach-card-name {
            font-size: 26px;
            font-weight: 700;
            color: var(--ys-navy);
            margin: 0;
        }

        .coach-card-role {
            font-size: 15px;
            font-weight: 600;
            color: var(--ys-teal);
            margin-bottom: 14px;
        }

        .coach-card-bio {
            color: #475569;
            font-size: 15px;
            line-height: 1.65;
            margin-bottom: 20px;
        }

        .coach-pill-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 24px;
        }

        .coach-pill-tag {
            background: #f1f5f9;
            color: var(--ys-navy);
            font-size: 12.5px;
            font-weight: 600;
            padding: 5px 12px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .coach-card-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
            padding-top: 15px;
            border-top: 1px solid #f1f5f9;
        }

        .coach-view-btn {
            background: var(--ys-navy);
            color: #ffffff !important;
            font-size: 14px;
            font-weight: 700;
            padding: 12px 24px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
        }

        .coach-view-btn:hover {
            background: var(--ys-gold);
            color: #0b1747 !important;
            transform: translateX(2px);
        }

        .coach-trial-btn {
            background: rgba(254, 166, 48, 0.15);
            color: #b45309 !important;
            font-size: 14px;
            font-weight: 700;
            padding: 11px 22px;
            border-radius: 10px;
            border: 1px solid rgba(254, 166, 48, 0.35);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
        }

        .coach-trial-btn:hover {
            background: var(--ys-gold);
            color: #ffffff !important;
            border-color: var(--ys-gold);
        }

        .roster-cta-banner {
            background: linear-gradient(135deg, #0b1747 0%, #152766 100%);
            border-radius: 20px;
            padding: 45px 40px;
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(11, 23, 71, 0.12);
            text-align: center;
            margin-top: 50px;
        }

        .roster-cta-banner h3 {
            color: #ffffff !important;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .roster-cta-banner p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 16px;
            max-width: 600px;
            margin: 0 auto 25px;
        }
    </style>
</head>
<body>

    <?php include_once __DIR__ . '/header.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>

                <section class="coaches-hero-area">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-9">
                                <div class="breadcrumb-trail">
                                    <a href="./"><i class="fas fa-home"></i> Home</a>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Our Coaches</span>
                                </div>
                                <h1 class="coaches-hero-title">Meet Our Expert Coaches</h1>
                                <p class="coaches-hero-sub">
                                    Guided by former First-Class, Ranji Trophy, and certified ECB &amp; BCCI coaches. Explore each coach’s dedicated profile, career accomplishments, and coaching philosophy below.
                                </p>
                            </div>
                            <div class="col-lg-3 text-lg-end mt-4 mt-lg-0">
                                <a href="contact" class="theme-btn style-one">
                                    Book Free Trial <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="coaches-roster-section">
                    <div class="container">

                        <div class="coaches-intro-header">
                            <span class="sub-title"><img src="assets/images/line1.png" alt="line">YSCA Coaching Faculty<img src="assets/images/line2.png" alt="line"></span>
                            <h2>Professional Mentors. Proven Champions.</h2>
                            <p>Every member of our coaching team brings real competitive pedigree, certified coaching credentials, and an unwavering commitment to developing future cricket champions.</p>
                        </div>

                        <?php foreach ($coaches as $c): ?>
                        <div class="coach-roster-card" data-aos="fade-up" data-aos-duration="900">
                            <div class="coach-card-row">
                                <div class="coach-card-media">
                                    <div class="coach-card-avatar">
                                        <img src="<?php echo htmlspecialchars($c['image']); ?>" alt="<?php echo htmlspecialchars($c['name']); ?>">
                                    </div>
                                    <span class="coach-badge-pill"><?php echo htmlspecialchars($c['badge']); ?></span>
                                </div>

                                <div class="coach-card-content">
                                    <div>
                                        <div class="coach-card-title-row">
                                            <div>
                                                <h3 class="coach-card-name">
                                                    <?php echo !empty($c['honorific']) ? htmlspecialchars($c['honorific']) . ' ' : ''; ?><?php echo htmlspecialchars($c['name']); ?>
                                                </h3>
                                                <div class="coach-card-role"><?php echo htmlspecialchars($c['role']); ?> &bull; <?php echo htmlspecialchars($c['experience']); ?></div>
                                            </div>
                                        </div>

                                        <p class="coach-card-bio">
                                            <?php echo htmlspecialchars($c['bio']); ?>
                                        </p>

                                        <div class="coach-pill-tags">
                                            <?php foreach ($c['specialization_tags'] as $tag): ?>
                                                <span class="coach-pill-tag"><i class="fas fa-check text-warning me-1"></i> <?php echo htmlspecialchars($tag); ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="coach-card-actions">
                                        <a href="<?php echo htmlspecialchars($c['slug']); ?>" class="coach-view-btn">
                                            View Dedicated Profile <i class="fas fa-arrow-right"></i>
                                        </a>
                                        <a href="contact?subject=<?php echo urlencode($c['contact_subject']); ?>" class="coach-trial-btn">
                                            <i class="far fa-calendar-alt"></i> Book Trial With <?php echo htmlspecialchars($c['name']); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                        <div class="roster-cta-banner" data-aos="fade-up">
                            <h3>Ready to Train With Our Elite Coaching Team?</h3>
                            <p>Book a free one-on-one trial session to evaluate your skills, discuss personalized development goals, and experience professional academy training.</p>
                            <a href="contact" class="theme-btn style-one" style="background-color: var(--ys-gold); color: #0b1747;">
                                Register For Free Trial <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </section>

            </main>

            <?php include_once __DIR__ . '/fotter.php'; ?>

        </div>
    </div>

    <script src="assets/js/plugins/jquery-3.7.1.min.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/gsap/gsap.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollSmoother.min.js"></script>
    <script src="assets/js/plugins/gsap/ScrollTrigger.min.js"></script>
    <script src="assets/js/plugins/slick.min.js"></script>
    <script src="assets/js/plugins/aos.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>