<?php
require_once __DIR__ . '/includes/programs-data.php';

$requestedProgramId = $program_id ?? ($_GET['program'] ?? ($_GET['id'] ?? 'foundation-cricket'));
$program = getProgramById($requestedProgramId);

if (!$program) {
    $programs = getProgramsList();
    $program = reset($programs);
}

$allPrograms = getProgramsList();
$otherPrograms = array_filter($allPrograms, static function ($p) use ($program) {
    return $p['id'] !== $program['id'];
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?php echo htmlspecialchars($program['title']); ?> at Young Star Cricket Academy, Greater Noida. <?php echo htmlspecialchars($program['tagline']); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($program['title']); ?> | Courses &amp; Programs - Young Star Cricket Academy</title>
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
            --prog-accent:       <?php echo $program['accent_color']; ?>;
            --prog-accent-light: <?php echo $program['accent_light']; ?>;
            --pro-dark:          #060e1a;
            --pro-navy:          #0b1a30;
            --pro-navy-card:     #0f2240;
            --pro-gold:          #fea630;
            --pro-gold-dark:     #e89903;
            --pro-gold-light:    #fff7ec;
            --pro-gold-gradient: linear-gradient(135deg, #fea630 0%, #ff8c00 100%);
            --pro-border:        #e2e8f0;
            --pro-card-bg:       #ffffff;
            --pro-surface:       #f8fafc;
            --pro-text:          #0f172a;
            --pro-muted:         #64748b;
        }

        body {
            background-color: #f1f5f9;
            color: var(--pro-text);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Philosopher', serif;
            color: var(--pro-navy);
            letter-spacing: -0.2px;
        }

        .pro-hero-stage {
            background: linear-gradient(135deg, #050d18 0%, #0b1a30 55%, #132746 100%);
            position: relative;
            padding: 104px 0 42px;
            color: #ffffff;
            overflow: hidden;
            border-bottom: 3px solid var(--pro-gold);
        }

        @media (max-width: 1199.98px) {
            .pro-hero-stage {
                padding: 96px 0 38px;
            }
        }

        @media (max-width: 767.98px) {
            .pro-hero-stage {
                padding: 86px 0 32px;
            }
        }

        .pro-hero-stage::before {
            content: "";
            position: absolute;
            top: -120px;
            right: -80px;
            width: 650px;
            height: 650px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(254, 166, 48, 0.18) 0%, rgba(254, 166, 48, 0.02) 60%, transparent 80%);
            pointer-events: none;
        }

        .pro-hero-stage::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 120px;
            background: linear-gradient(to top, rgba(6, 14, 26, 0.7), transparent);
            pointer-events: none;
        }

        .pro-breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 500;
            margin-bottom: 12px;
        }

        .pro-breadcrumb a {
            color: rgba(255, 255, 255, 0.75);
            transition: color 0.2s;
        }

        .pro-breadcrumb a:hover {
            color: var(--pro-gold);
        }

        .pro-breadcrumb i {
            font-size: 11px;
            color: var(--pro-gold);
        }

        .pro-hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(254, 166, 48, 0.18);
            border: 1px solid rgba(254, 166, 48, 0.45);
            color: var(--pro-gold);
            padding: 5px 14px;
            border-radius: 30px;
            font-size: 11.5px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .pro-hero-name {
            color: #ffffff !important;
            font-size: clamp(28px, 3.2vw, 44px);
            font-weight: 700;
            line-height: 1.18;
            margin-bottom: 8px;
        }

        .pro-hero-role {
            font-size: 16px;
            font-weight: 600;
            color: var(--pro-gold);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .pro-hero-role span.academy-label {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14.5px;
            font-weight: 400;
        }

        .pro-hero-summary {
            font-size: 15px;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.88);
            max-width: 660px;
            margin-bottom: 20px;
        }

        .pro-stats-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px 14px;
            max-width: 660px;
            margin-bottom: 22px;
        }

        @media (max-width: 575.98px) {
            .pro-stats-grid {
                grid-template-columns: 1fr;
            }
        }

        .pro-stat-box {
            background: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            padding: 10px 14px;
            text-align: left;
            transition: all 0.25s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-height: 64px;
        }

        .pro-stat-box:hover {
            background: rgba(254, 166, 48, 0.12);
            border-color: rgba(254, 166, 48, 0.4);
            transform: translateY(-2px);
        }

        .pro-stat-num {
            font-size: 14.5px;
            font-weight: 700;
            color: var(--pro-gold);
            line-height: 1.35;
            display: block;
            font-family: 'DM Sans', sans-serif;
            white-space: normal !important;
            word-break: normal !important;
            overflow: visible !important;
            text-overflow: unset !important;
        }

        .pro-stat-label {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.72);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        
        .pro-hero-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn-pro-gold {
            background: var(--pro-gold-gradient);
            color: #060e1a !important;
            font-weight: 800;
            font-size: 14.5px;
            padding: 12px 24px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 8px 24px rgba(254, 166, 48, 0.4);
            transition: all 0.25s ease;
        }

        .btn-pro-gold:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(254, 166, 48, 0.55);
            color: #060e1a !important;
        }

        .btn-pro-outline {
            background: rgba(255, 255, 255, 0.08);
            color: #ffffff !important;
            font-weight: 600;
            font-size: 14px;
            padding: 12px 22px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.25s ease;
        }

        .btn-pro-outline:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: #ffffff;
            transform: translateY(-2px);
        }

        .pro-card-showcase {
            position: relative;
            max-width: 420px;
            margin-left: auto;
            z-index: 2;
        }

        @media (max-width: 991.98px) {
            .pro-card-showcase {
                margin: 35px auto 0;
            }
        }

        .program-feature-card {
            background: linear-gradient(145deg, #091528 0%, #0f2240 100%);
            border-radius: 20px;
            padding: 22px 22px;
            border: 2px solid rgba(254, 166, 48, 0.45);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.6);
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .program-feature-card::before {
            content: "";
            position: absolute;
            top: -60px;
            right: -60px;
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(254, 166, 48, 0.25) 0%, transparent 70%);
            pointer-events: none;
        }

        .program-badge-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.45);
            color: #4ade80;
            font-size: 11.5px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 20px;
            margin-bottom: 12px;
        }

        .program-badge-status span.dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 8px #22c55e;
        }

        .program-showcase-title {
            font-size: 20px;
            font-weight: 700;
            color: #ffffff !important;
            margin-bottom: 4px;
            line-height: 1.25;
        }

        .program-showcase-subtitle {
            font-size: 12.5px;
            color: var(--pro-gold);
            font-weight: 600;
            margin-bottom: 14px;
        }

        .program-quick-info-list {
            list-style: none;
            padding: 0;
            margin: 0 0 16px 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .program-quick-info-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: rgba(255, 255, 255, 0.88);
            background: rgba(255, 255, 255, 0.05);
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            line-height: 1.4;
        }

        .program-quick-info-list li i {
            color: var(--pro-gold);
            font-size: 14px;
            flex-shrink: 0;
            width: 18px;
            text-align: center;
        }

        .program-quick-info-list li strong {
            color: #ffffff;
            margin-right: 4px;
        }

        .program-card-enroll-btn {
            background: var(--pro-gold-gradient);
            color: #060e1a !important;
            font-weight: 800;
            font-size: 14px;
            padding: 11px 18px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            width: 100%;
            text-align: center;
            box-shadow: 0 8px 20px rgba(254, 166, 48, 0.35);
            transition: all 0.25s;
        }

        .program-card-enroll-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(254, 166, 48, 0.5);
            color: #060e1a !important;
        }

        .pro-bento-section {
            padding: 70px 0 90px;
        }

        .bento-card {
            background: var(--pro-card-bg);
            border: 1px solid var(--pro-border);
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(11, 26, 48, 0.05);
            padding: 36px;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .bento-card:hover {
            box-shadow: 0 16px 40px rgba(11, 26, 48, 0.08);
            transform: translateY(-3px);
        }

        .bento-card.dark-theme {
            background: linear-gradient(145deg, #091528 0%, #0f2240 100%);
            color: #ffffff;
            border-color: rgba(254, 166, 48, 0.25);
            box-shadow: 0 15px 35px rgba(9, 21, 40, 0.25);
        }

        .bento-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 2px solid #f1f5f9;
        }

        .bento-card.dark-theme .bento-header {
            border-bottom-color: rgba(255, 255, 255, 0.1);
        }

        .bento-icon {
            width: 46px;
            height: 46px;
            border-radius: 12px;
            background: var(--pro-gold-light);
            color: var(--pro-gold-dark);
            border: 1px solid rgba(254, 166, 48, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        .bento-card.dark-theme .bento-icon {
            background: rgba(254, 166, 48, 0.15);
            color: var(--pro-gold);
            border-color: rgba(254, 166, 48, 0.4);
        }

        .bento-title {
            font-size: 24px;
            font-weight: 700;
            margin: 0;
            color: var(--pro-navy);
        }

        .bento-card.dark-theme .bento-title {
            color: #ffffff !important;
        }

        .bento-bio-text {
            font-size: 16px;
            line-height: 1.75;
            color: #334155;
            margin-bottom: 20px;
        }

        .bento-qualification-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #f8fafc;
            border: 1px solid var(--pro-border);
            padding: 10px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            color: var(--pro-navy);
            margin-top: 10px;
            width: 100%;
        }

        .bento-advantage-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .bento-advantage-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 15px;
            color: rgba(255, 255, 255, 0.88);
            line-height: 1.55;
        }

        .bento-advantage-list li i {
            color: var(--pro-gold);
            font-size: 16px;
            margin-top: 4px;
            flex-shrink: 0;
        }

     
        .curriculum-module-card {
            background: #ffffff;
            border: 1px solid var(--pro-border);
            border-radius: 18px;
            padding: 26px 24px;
            height: 100%;
            display: flex;
            flex-direction: column;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .curriculum-module-card:hover {
            border-color: var(--pro-gold);
            box-shadow: 0 12px 28px rgba(11, 26, 48, 0.08);
            transform: translateY(-3px);
        }

        .module-card-icon {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--pro-navy);
            color: var(--pro-gold);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
            margin-bottom: 16px;
        }

        .module-card-title {
            font-size: 18.5px;
            font-weight: 700;
            color: var(--pro-navy);
            margin-bottom: 10px;
        }

        .module-card-desc {
            font-size: 14.5px;
            line-height: 1.65;
            color: #475569;
            margin: 0;
        }

 
        .coach-mentor-card {
            background: #ffffff;
            border: 1px solid var(--pro-border);
            border-radius: 18px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: all 0.25s ease;
            box-shadow: 0 8px 24px rgba(11, 26, 48, 0.04);
            height: 100%;
        }

        .coach-mentor-card:hover {
            border-color: var(--pro-gold);
            box-shadow: 0 14px 30px rgba(11, 26, 48, 0.09);
            transform: translateY(-3px);
        }

        .coach-mentor-avatar {
            width: 80px;
            height: 80px;
            border-radius: 16px;
            object-fit: cover;
            border: 2px solid var(--pro-gold);
            flex-shrink: 0;
        }

        .coach-mentor-body h5 {
            font-size: 18px;
            font-weight: 700;
            color: var(--pro-navy);
            margin-bottom: 4px;
        }

        .coach-mentor-body p {
            font-size: 13.5px;
            color: var(--pro-gold-dark);
            font-weight: 600;
            margin-bottom: 10px;
        }

        .coach-mentor-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 700;
            color: var(--pro-navy);
            transition: color 0.2s, gap 0.2s;
        }

        .coach-mentor-btn:hover {
            color: var(--pro-gold-dark);
            gap: 10px;
        }
        .routine-item {
            background: #f8fafc;
            border: 1px solid var(--pro-border);
            border-radius: 14px;
            padding: 16px 20px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 12px;
            transition: all 0.2s;
        }

        .routine-item:hover {
            background: #ffffff;
            border-color: var(--pro-gold);
            box-shadow: 0 4px 14px rgba(254, 166, 48, 0.12);
        }

        .routine-day {
            background: var(--pro-navy);
            color: var(--pro-gold);
            font-size: 12.5px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            white-space: nowrap;
            flex-shrink: 0;
        }

        .routine-text {
            font-size: 14.5px;
            color: #334155;
            font-weight: 600;
            line-height: 1.45;
            padding-top: 4px;
        }

        .facility-item-box {
            background: #f8fafc;
            border: 1px solid var(--pro-border);
            border-radius: 14px;
            padding: 16px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 12px;
            transition: all 0.2s;
        }

        .facility-item-box:hover {
            background: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.12);
        }

        .facility-icon-circle {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: #2563eb;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            flex-shrink: 0;
        }

        .facility-name {
            font-size: 14.5px;
            font-weight: 700;
            color: var(--pro-navy);
        }

        .program-faq-box {
            background: #ffffff;
            border: 1px solid var(--pro-border);
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 16px;
            transition: all 0.25s;
        }

        .program-faq-box:hover {
            border-color: var(--pro-gold);
            box-shadow: 0 8px 22px rgba(11, 26, 48, 0.06);
        }

        .faq-q {
            font-size: 17px;
            font-weight: 700;
            color: var(--pro-navy);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .faq-q i {
            color: var(--pro-gold-dark);
            font-size: 18px;
        }

        .faq-a {
            font-size: 14.5px;
            line-height: 1.65;
            color: #475569;
            margin: 0;
            padding-left: 28px;
        }

        .pro-booking-banner {
            background: linear-gradient(135deg, #091528 0%, #0b1a30 70%, #152766 100%);
            border: 1px solid rgba(254, 166, 48, 0.35);
            border-radius: 22px;
            padding: 45px 40px;
            color: #ffffff;
            box-shadow: 0 15px 40px rgba(11, 26, 48, 0.2);
            margin-top: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 25px;
        }

        .pro-booking-text h3 {
            color: #ffffff !important;
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .pro-booking-text p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 16px;
            max-width: 600px;
            margin: 0;
            line-height: 1.6;
        }

        .pro-booking-actions {
            display: flex;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .pro-faculty-carousel-sec {
            background: #ffffff;
            padding: 85px 0 95px;
            border-top: 1px solid var(--pro-border);
        }

        .program-card-mini {
            background: #f8fafc;
            border: 1px solid var(--pro-border);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(11, 26, 48, 0.04);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 24px 22px;
        }

        .program-card-mini:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 35px rgba(11, 26, 48, 0.1);
            border-color: var(--pro-gold);
            background: #ffffff;
        }

        .program-mini-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .program-mini-badge {
            background: var(--pro-gold-light);
            color: var(--pro-gold-dark);
            font-size: 11.5px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid rgba(254, 166, 48, 0.4);
        }

        .program-mini-icon {
            font-size: 24px;
            color: var(--pro-navy);
        }

        .program-mini-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--pro-navy);
            margin-bottom: 8px;
        }

        .program-mini-desc {
            font-size: 13.5px;
            color: var(--pro-muted);
            line-height: 1.55;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .program-mini-link {
            margin-top: auto;
            background: #ffffff;
            color: var(--pro-navy) !important;
            font-size: 13.5px;
            font-weight: 700;
            padding: 10px 18px;
            border-radius: 10px;
            border: 1px solid var(--pro-border);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.25s ease;
        }

        .program-card-mini:hover .program-mini-link {
            background: var(--pro-navy);
            color: #ffffff !important;
            border-color: var(--pro-navy);
        }
    </style>
</head>
<body>

    <?php include_once __DIR__ . '/header.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="pro-hero-stage" style="background: linear-gradient(135deg, rgba(5, 13, 24, 0.88) 0%, rgba(11, 26, 48, 0.92) 55%, rgba(19, 39, 70, 0.94) 100%), url('<?php echo htmlspecialchars($program['banner_img'] ?? $program['card_img']); ?>') center/cover no-repeat;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="900">
                                <div class="pro-breadcrumb">
                                    <a href="./"><i class="fas fa-home"></i> Home</a>
                                    <i class="fas fa-chevron-right"></i>
                                    <a href="our-programs">Our Programs</a>
                                    <i class="fas fa-chevron-right"></i>
                                    <span><?php echo htmlspecialchars($program['short_title']); ?></span>
                                </div>

                                <div class="pro-hero-tag">
                                    <i class="fas <?php echo htmlspecialchars($program['icon_fa']); ?>"></i> <?php echo htmlspecialchars($program['badge']); ?>
                                </div>

                                <h1 class="pro-hero-name">
                                    <?php echo htmlspecialchars($program['title']); ?>
                                </h1>

                                <div class="pro-hero-role">
                                    <i class="fas fa-calendar-check"></i> <?php echo htmlspecialchars($program['schedule']); ?>
                                    <span class="academy-label">&bull; Young Star Cricket Academy, Greater Noida</span>
                                </div>

                                <p class="pro-hero-summary">
                                    <?php echo htmlspecialchars($program['tagline']); ?>
                                </p>
                                <div class="pro-stats-grid">
                                    <div class="pro-stat-box">
                                        <span class="pro-stat-num"><?php echo htmlspecialchars($program['age_group']); ?></span>
                                        <span class="pro-stat-label"><i class="fas fa-users"></i> Eligibility</span>
                                    </div>
                                    <div class="pro-stat-box">
                                        <span class="pro-stat-num"><?php echo htmlspecialchars($program['schedule']); ?></span>
                                        <span class="pro-stat-label"><i class="fas fa-calendar-alt"></i> Frequency</span>
                                    </div>
                                    <div class="pro-stat-box">
                                        <span class="pro-stat-num"><?php echo htmlspecialchars($program['batch_size']); ?></span>
                                        <span class="pro-stat-label"><i class="fas <?php echo ($program['id'] === 'cricket-hostel') ? 'fa-bed' : 'fa-user-friends'; ?>"></i> <?php echo ($program['id'] === 'cricket-hostel') ? 'Room Capacity' : 'Batch Size'; ?></span>
                                    </div>
                                    <div class="pro-stat-box">
                                        <span class="pro-stat-num"><?php echo count($program['curriculum_modules']); ?> <?php echo ($program['id'] === 'cricket-hostel') ? 'Regimens' : 'Modules'; ?></span>
                                        <span class="pro-stat-label"><i class="fas fa-clipboard-list"></i> Syllabus</span>
                                    </div>
                                </div>
                                <div class="pro-hero-actions">
                                    <a href="contact?subject=<?php echo urlencode($program['contact_subject']); ?>" class="btn-pro-gold">
                                        <i class="fas fa-calendar-check"></i> Enroll / Book Free Trial
                                    </a>
                                    <a href="tel:9999999000" class="btn-pro-outline">
                                        <i class="fas fa-phone-alt"></i> Speak to Academy
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5" data-aos="fade-left" data-aos-duration="900">
                                <div class="pro-card-showcase">
                                    <div class="program-feature-card">
                                        <?php if (!empty($program['card_img'])): ?>
                                        <div style="margin: -22px -22px 18px -22px; border-radius: 18px 18px 0 0; overflow: hidden; height: 160px; position: relative;">
                                            <img src="<?php echo htmlspecialchars($program['card_img']); ?>" alt="<?php echo htmlspecialchars($program['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                                            <div style="position: absolute; inset: 0; background: linear-gradient(to top, rgba(9,21,40,0.95) 0%, rgba(9,21,40,0.2) 60%, transparent 100%);"></div>
                                            <span style="position: absolute; bottom: 10px; left: 16px; background: rgba(254,166,48,0.95); color: #060e1a; font-size: 11px; font-weight: 800; padding: 3px 10px; border-radius: 6px; letter-spacing: 0.5px; text-transform: uppercase;">
                                                <?php echo htmlspecialchars($program['level']); ?>
                                            </span>
                                        </div>
                                        <?php endif; ?>
                                        <div class="program-badge-status">
                                            <span class="dot"></span> Admissions Open &bull; Limited Seats
                                        </div>

                                        <h3 class="program-showcase-title"><?php echo htmlspecialchars($program['title']); ?></h3>
                                        <div class="program-showcase-subtitle"><?php echo htmlspecialchars($program['level']); ?></div>

                                        <ul class="program-quick-info-list">
                                            <li>
                                                <i class="fas fa-user-graduate"></i>
                                                <div><strong>Target Age:</strong> <?php echo htmlspecialchars($program['age_group']); ?></div>
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i>
                                                <div><strong>Timing:</strong> <?php echo htmlspecialchars($program['timing']); ?></div>
                                            </li>
                                            <li>
                                                <i class="fas fa-bullseye"></i>
                                                <div><strong>Primary Goal:</strong> <?php echo htmlspecialchars($program['goal']); ?></div>
                                            </li>
                                            <li>
                                                <i class="fas fa-hourglass-half"></i>
                                                <div><strong>Duration:</strong> <?php echo htmlspecialchars($program['duration']); ?></div>
                                            </li>
                                        </ul>

                                        <a href="contact?subject=<?php echo urlencode($program['contact_subject']); ?>" class="program-card-enroll-btn">
                                            Apply for Admission <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <section class="pro-bento-section">
                    <div class="container">
                        <div class="row g-4 align-items-stretch">
                            <div class="col-lg-7" data-aos="fade-up" data-aos-duration="800">
                                <div class="bento-card">
                                    <div>
                                        <div class="bento-header">
                                            <div class="bento-icon">
                                                <i class="fas fa-book-reader"></i>
                                            </div>
                                            <h3 class="bento-title">Program Overview &amp; Methodology</h3>
                                        </div>
                                        <div class="bento-bio-text">
                                            <p><?php echo $program['overview']; ?></p>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="bento-qualification-pill">
                                            <i class="fas fa-shield-alt text-warning"></i>
                                            <span><strong>Equipment Guideline:</strong> <?php echo htmlspecialchars($program['equipment_required']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5" data-aos="fade-up" data-aos-duration="900">
                                <div class="bento-card dark-theme">
                                    <div>
                                        <div class="bento-header">
                                            <div class="bento-icon">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <h3 class="bento-title">Key Program Advantages</h3>
                                        </div>
                                        <ul class="bento-advantage-list">
                                            <?php foreach ($program['key_highlights'] as $highlight): ?>
                                             <li>
                                                <i class="fas fa-check-circle"></i>
                                                <span><?php echo htmlspecialchars($highlight); ?></span>
                                            </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>

                                    <div style="padding-top: 20px; border-top: 1px dashed rgba(255, 255, 255, 0.15); margin-top: 20px;">
                                        <div style="font-size: 13px; color: var(--pro-gold); font-weight: 700;">
                                            <i class="fas fa-check-double"></i> Verified High-Performance Curriculum &bull; YSCA Greater Noida
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4" data-aos="fade-up" data-aos-duration="800">
                            <div class="bento-card" style="padding: 38px;">
                                <div class="bento-header">
                                    <div class="bento-icon">
                                        <i class="fas fa-layer-group"></i>
                                    </div>
                                    <div>
                                        <h3 class="bento-title">Structured Curriculum &amp; Training Syllabus</h3>
                                        <p style="color: var(--pro-muted); font-size: 14.5px; margin: 4px 0 0 0;">
                                            Progression-based training modules taught sequentially across the training term:
                                        </p>
                                    </div>
                                </div>

                                <div class="row g-4 mt-2">
                                    <?php foreach ($program['curriculum_modules'] as $idx => $mod): ?>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="curriculum-module-card">
                                            <div class="module-card-icon">
                                                <i class="fas <?php echo htmlspecialchars($mod['icon']); ?>"></i>
                                            </div>
                                            <h4 class="module-card-title"><?php echo htmlspecialchars($mod['title']); ?></h4>
                                            <p class="module-card-desc"><?php echo htmlspecialchars($mod['desc']); ?></p>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4" data-aos="fade-up" data-aos-duration="900">
                            <div class="bento-card" style="padding: 38px;">
                                <div class="bento-header">
                                    <div class="bento-icon">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                    <div>
                                        <h3 class="bento-title">Mentors Leading This Program</h3>
                                        <p style="color: var(--pro-muted); font-size: 14.5px; margin: 4px 0 0 0;">
                                            Experienced cricket coaches supervising and monitoring trainees in this program:
                                        </p>
                                    </div>
                                </div>

                                <div class="row g-4 mt-2">
                                    <?php foreach ($program['lead_coaches'] as $cId => $leadCoach): ?>
                                    <div class="col-lg-6">
                                        <div class="coach-mentor-card">
                                            <img src="<?php echo htmlspecialchars($leadCoach['image']); ?>" alt="<?php echo htmlspecialchars($leadCoach['name']); ?>" class="coach-mentor-avatar">
                                            <div class="coach-mentor-body">
                                                <h5><?php echo htmlspecialchars($leadCoach['name']); ?></h5>
                                                <p><?php echo htmlspecialchars($leadCoach['role']); ?></p>
                                                <a href="<?php echo htmlspecialchars($leadCoach['slug']); ?>" class="coach-mentor-btn">
                                                    View Coach Profile <i class="fas fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 mt-1 align-items-stretch">
                            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800">
                                <div class="bento-card">
                                    <div>
                                        <div class="bento-header">
                                            <div class="bento-icon">
                                                <i class="fas fa-calendar-alt"></i>
                                            </div>
                                            <h3 class="bento-title">Weekly Training Schedule</h3>
                                        </div>
                                        <p style="color: var(--pro-muted); font-size: 14.5px; margin-bottom: 20px;">
                                            Structured balance of technical net practice, athletic conditioning, and match simulations:
                                        </p>
                                        <div>
                                            <?php foreach ($program['weekly_routine'] as $routine): ?>
                                            <div class="routine-item">
                                                <span class="routine-day"><?php echo htmlspecialchars($routine['day']); ?></span>
                                                <span class="routine-text"><?php echo htmlspecialchars($routine['activity']); ?></span>
                                            </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="900">
                                <div class="bento-card">
                                    <div>
                                        <div class="bento-header">
                                            <div class="bento-icon">
                                                <i class="fas fa-building"></i>
                                            </div>
                                            <h3 class="bento-title">World-Class Facilities Utilized</h3>
                                        </div>
                                        <p style="color: var(--pro-muted); font-size: 14.5px; margin-bottom: 20px;">
                                            Professional sporting infrastructure dedicated to trainees in this program:
                                        </p>
                                        <div>
                                            <div class="facility-item-box">
                                                <div class="facility-icon-circle"><i class="fas fa-baseball"></i></div>
                                                <div class="facility-name">International-Standard Natural Turf &amp; Astroturf Practice Nets</div>
                                            </div>
                                            <div class="facility-item-box">
                                                <div class="facility-icon-circle"><i class="fas fa-sliders-h"></i></div>
                                                <div class="facility-name">Automated 3-Wheel Bowling Machines for Pace &amp; Spin Precision</div>
                                            </div>
                                            <div class="facility-item-box">
                                                <div class="facility-icon-circle"><i class="fas fa-video"></i></div>
                                                <div class="facility-name">High-Speed 240fps Biomechanical Video Analysis Studio</div>
                                            </div>
                                            <div class="facility-item-box">
                                                <div class="facility-icon-circle"><i class="fas fa-dumbbell"></i></div>
                                                <div class="facility-name">Cricket-Specific High-Performance Gymnasium &amp; Recovery Suite</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4" data-aos="fade-up" data-aos-duration="800">
                            <div class="bento-card" style="padding: 38px;">
                                <div class="bento-header">
                                    <div class="bento-icon">
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                    <div>
                                        <h3 class="bento-title">Frequently Asked Questions</h3>
                                        <p style="color: var(--pro-muted); font-size: 14.5px; margin: 4px 0 0 0;">
                                            Answers to common questions from parents and aspiring cricketers:
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <?php foreach ($program['faqs'] as $faq): ?>
                                    <div class="program-faq-box">
                                        <div class="faq-q">
                                            <i class="fas fa-info-circle"></i>
                                            <span><?php echo htmlspecialchars($faq['q']); ?></span>
                                        </div>
                                        <p class="faq-a"><?php echo htmlspecialchars($faq['a']); ?></p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="pro-booking-banner" data-aos="fade-up">
                            <div class="pro-booking-text">
                                <h3>Experience the Academy Before Enrolling</h3>
                                <p>
                                    Book a free in-person net trial and player skill assessment at our Greater Noida facility. Meet our coaching staff, tour the turf grounds, and receive personalized feedback on your game.
                                </p>
                            </div>
                            <div class="pro-booking-actions">
                                <a href="contact?subject=<?php echo urlencode($program['contact_subject']); ?>" class="btn-pro-gold">
                                    <i class="fas fa-calendar-check"></i> Book Free Net Trial
                                </a>
                                <a href="tel:9999999000" class="btn-pro-outline">
                                    <i class="fas fa-phone-alt"></i> Call (+91) 99999 99000
                                </a>
                            </div>
                        </div>

                    </div>
                </section>
                <section class="pro-faculty-carousel-sec">
                    <div class="container">
                        <div class="section-title text-center mb-50">
                            <span class="sub-title"><img src="assets/images/line1.png" alt="line">YSCA Programs &amp; Courses<img src="assets/images/line2.png" alt="line"></span>
                            <h2>Explore Our Other Training Pathways</h2>
                            <p>Structured developmental cricket courses for players across all age brackets and competitive stages.</p>
                        </div>

                        <div class="row g-4">
                            <?php 
                            $count = 0;
                            foreach ($otherPrograms as $other): 
                                if ($count >= 4) break;
                                $count++;
                            ?>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="program-card-mini" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                                    <?php if (!empty($other['card_img'])): ?>
                                    <div style="height: 140px; overflow: hidden; position: relative;">
                                        <img src="<?php echo htmlspecialchars($other['card_img']); ?>" alt="<?php echo htmlspecialchars($other['short_title']); ?>" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;" onmouseover="this.style.transform='scale(1.08)'" onmouseout="this.style.transform='scale(1)'">
                                        <span style="position: absolute; top: 10px; right: 10px; background: rgba(11,26,48,0.85); color: #fea630; font-size: 11px; font-weight: 700; padding: 3px 8px; border-radius: 6px;">
                                            <?php echo htmlspecialchars($other['age_group']); ?>
                                        </span>
                                    </div>
                                    <?php endif; ?>
                                    <div style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                                        <div class="program-mini-header" style="margin-bottom: 8px;">
                                            <span class="program-mini-badge"><?php echo htmlspecialchars($other['badge']); ?></span>
                                            <i class="fas <?php echo htmlspecialchars($other['icon_fa']); ?> program-mini-icon"></i>
                                        </div>
                                        <h4 class="program-mini-title" style="margin-bottom: 6px;"><?php echo htmlspecialchars($other['short_title']); ?></h4>
                                        <p class="program-mini-desc" style="font-size: 13px; line-height: 1.5; margin-bottom: 16px;"><?php echo htmlspecialchars($other['goal']); ?></p>
                                        <a href="<?php echo htmlspecialchars($other['slug']); ?>" class="program-mini-link">
                                            View Details <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="text-center mt-50">
                            <a href="our-programs" class="theme-btn style-one">
                                View All Programs &amp; Facilities <i class="fas fa-arrow-right"></i>
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
