<?php
$formStatus = $_GET['status'] ?? '';
$action = $_GET['action'] ?? '';
$subject = $_GET['subject'] ?? ($action === 'trial' ? 'Booking Free 1-Day Net Trial Session' : '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Contact Young Star Cricket Academy in Greater Noida. Inquire about junior & senior coaching programs, hostel facilities, fees, and book your free net trial.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us | Admissions &amp; Enquiries - Young Star Cricket Academy</title>
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
            --ys-navy-dark:  #060e1a;
            --ys-navy:       #0b1a30;
            --ys-navy-card:  #0f2240;
            --ys-gold:       #fea630;
            --ys-gold-hover: #e89903;
            --ys-gold-soft:  #fff7ec;
            --ys-gold-glow:  rgba(254, 166, 48, 0.25);
            --ys-teal:       #0891b2;
            --ys-green:      #16a34a;
            --ys-border:     #e2e8f0;
            --ys-card-bg:    #ffffff;
            --ys-surface:    #f8fafc;
            --ys-text:       #0f172a;
            --ys-muted:      #64748b;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--ys-text);
            background-color: #f1f5f9;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Philosopher', serif;
            color: var(--ys-navy);
            letter-spacing: -0.2px;
        }

        .contact-hero-stage {
            background: linear-gradient(135deg, #050d18 0%, #0b1a30 55%, #132746 100%);
            position: relative;
            padding: 104px 0 42px;
            color: #ffffff;
            overflow: hidden;
            border-bottom: 3px solid var(--ys-gold);
        }

        @media (max-width: 1199.98px) {
            .contact-hero-stage {
                padding: 96px 0 38px;
            }
        }

        @media (max-width: 767.98px) {
            .contact-hero-stage {
                padding: 86px 0 32px;
            }
        }

        .contact-hero-stage::before {
            content: "";
            position: absolute;
            top: -120px;
            right: -80px;
            width: 480px;
            height: 480px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(254, 166, 48, 0.16) 0%, rgba(254, 166, 48, 0) 70%);
            pointer-events: none;
        }

        .contact-hero-stage::after {
            content: "";
            position: absolute;
            bottom: -150px;
            left: -100px;
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(8, 145, 178, 0.14) 0%, rgba(8, 145, 178, 0) 70%);
            pointer-events: none;
        }

        .breadcrumb-trail {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 14px;
            font-weight: 500;
        }

        .breadcrumb-trail a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .breadcrumb-trail a:hover {
            color: var(--ys-gold);
        }

        .breadcrumb-trail i {
            font-size: 11px;
            color: var(--ys-gold);
        }

        .contact-hero-badge {
            display: inline-flex;
            align-items: center;
            background: rgba(254, 166, 48, 0.15);
            border: 1px solid rgba(254, 166, 48, 0.4);
            color: #ffb854;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 6px 18px;
            border-radius: 30px;
            margin-bottom: 16px;
        }

        .contact-hero-title {
            color: #ffffff !important;
            font-size: clamp(32px, 4.2vw, 48px);
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 14px;
        }

        .contact-hero-sub {
            color: rgba(255, 255, 255, 0.85);
            font-size: 17px;
            line-height: 1.6;
            max-width: 720px;
            margin: 0 auto;
        }

        .contact-quick-strip {
            margin-top: -35px;
            position: relative;
            z-index: 10;
            margin-bottom: 60px;
        }

        .contact-quick-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 24px 20px;
            border: 1px solid var(--ys-border);
            box-shadow: 0 10px 30px rgba(11, 26, 48, 0.07);
            height: 100%;
            display: flex;
            align-items: flex-start;
            gap: 16px;
            text-decoration: none;
            color: var(--ys-text);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            overflow: hidden;
        }

        .contact-quick-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--card-accent-grad, linear-gradient(90deg, #0b1a30, #fea630));
            opacity: 0;
            transition: opacity 0.25s ease;
        }

        .contact-quick-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 36px rgba(11, 26, 48, 0.12);
            border-color: #cbd5e1;
            color: var(--ys-text);
        }

        .contact-quick-card:hover::before {
            opacity: 1;
        }

        .contact-quick-icon {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }

        .contact-quick-card:hover .contact-quick-icon {
            transform: scale(1.1) rotate(4deg);
        }

        .contact-quick-card.card-phone .contact-quick-icon {
            background: #fff7ec;
            color: var(--ys-gold-hover);
            border: 1px solid #fed7aa;
        }
        .contact-quick-card.card-phone { --card-accent-grad: linear-gradient(90deg, #d97706, #f59e0b); }

        .contact-quick-card.card-wa .contact-quick-icon {
            background: #f0fdf4;
            color: #16a34a;
            border: 1px solid #bbf7d0;
        }
        .contact-quick-card.card-wa { --card-accent-grad: linear-gradient(90deg, #16a34a, #22c55e); }

        .contact-quick-card.card-mail .contact-quick-icon {
            background: #eff6ff;
            color: #2563eb;
            border: 1px solid #bfdbfe;
        }
        .contact-quick-card.card-mail { --card-accent-grad: linear-gradient(90deg, #1e40af, #3b82f6); }

        .contact-quick-card.card-loc .contact-quick-icon {
            background: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }
        .contact-quick-card.card-loc { --card-accent-grad: linear-gradient(90deg, #b91c1c, #ef4444); }

        .contact-quick-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-weight: 700;
            color: var(--ys-muted);
            margin-bottom: 4px;
            display: block;
        }

        .contact-quick-val {
            font-size: 15px;
            font-weight: 700;
            color: var(--ys-navy);
            line-height: 1.35;
            margin-bottom: 2px;
            word-break: break-word;
        }

        .contact-quick-sub {
            font-size: 12.5px;
            color: var(--ys-muted);
            line-height: 1.3;
        }

        .contact-main-sec {
            padding-bottom: 90px;
        }

        .concierge-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid var(--ys-border);
            box-shadow: 0 10px 30px rgba(11, 26, 48, 0.05);
            padding: 30px 26px;
            margin-bottom: 28px;
            position: relative;
            overflow: hidden;
        }

        .concierge-card-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f1f5f9;
        }

        .concierge-card-header .icon-pod {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            background: var(--ys-gold-soft);
            color: var(--ys-gold-hover);
            border: 1px solid #fed7aa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            flex-shrink: 0;
        }

        .concierge-card-header h3 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
            color: var(--ys-navy);
        }

        .schedule-grid {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 22px;
        }

        .schedule-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 13.5px;
        }

        .schedule-label {
            font-weight: 600;
            color: var(--ys-navy);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .schedule-time {
            font-weight: 700;
            color: var(--ys-gold-hover);
            background: #fff;
            padding: 3px 10px;
            border-radius: 20px;
            border: 1px solid #fed7aa;
            font-size: 12.5px;
        }

        .badge-live-batch {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #15803d;
            border-radius: 12px;
            padding: 10px 14px;
            font-size: 13px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 22px;
        }

        .pulse-indicator {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 8px #22c55e;
            flex-shrink: 0;
            animation: pulse-ring 1.8s infinite;
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
            70% { transform: scale(1.1); box-shadow: 0 0 0 6px rgba(34, 197, 94, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
        }

        .btn-whatsapp-direct {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #16a34a;
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 700;
            font-size: 14.5px;
            padding: 12px 18px;
            border-radius: 12px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.25);
        }

        .btn-whatsapp-direct:hover {
            background: #15803d;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(22, 163, 74, 0.35);
        }

        .social-channel-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .social-channel-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 14px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            text-decoration: none;
            color: var(--ys-text);
            transition: all 0.25s ease;
        }

        .social-channel-item:hover {
            background: #ffffff;
            border-color: #cbd5e1;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(11, 26, 48, 0.05);
            color: var(--ys-text);
        }

        .social-channel-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .social-channel-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            color: #ffffff;
            flex-shrink: 0;
        }

        .social-channel-info h6 {
            font-size: 14.5px;
            font-weight: 700;
            margin: 0;
            color: var(--ys-navy);
            line-height: 1.2;
        }

        .social-channel-info span {
            font-size: 12px;
            color: var(--ys-muted);
        }

        .social-channel-btn {
            font-size: 12px;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 20px;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .academy-perks-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .academy-perks-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            font-size: 14px;
            color: #334155;
            line-height: 1.45;
        }

        .academy-perks-list li i {
            color: var(--ys-gold);
            font-size: 16px;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .contact-form-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid var(--ys-border);
            box-shadow: 0 14px 40px rgba(11, 26, 48, 0.08);
            padding: 38px 34px;
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 767.98px) {
            .contact-form-card {
                padding: 26px 20px;
            }
        }

        .contact-form-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #0b1a30 0%, #fea630 100%);
        }

        .contact-form-header {
            margin-bottom: 24px;
        }

        .form-badge-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 5px 14px;
            border-radius: 20px;
            background: var(--ys-gold-soft);
            color: var(--ys-gold-hover);
            border: 1px solid #fed7aa;
            margin-bottom: 10px;
        }

        .contact-form-header h2 {
            font-size: clamp(24px, 2.5vw, 32px);
            font-weight: 700;
            color: var(--ys-navy);
            margin-bottom: 8px;
        }

        .contact-form-header p {
            font-size: 15px;
            color: var(--ys-muted);
            margin-bottom: 0;
        }

        .program-select-chips-wrap {
            margin-bottom: 22px;
        }

        .program-select-chips-label {
            font-size: 13px;
            font-weight: 700;
            color: var(--ys-navy);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .program-chips-container {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .prog-chip {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            color: #334155;
            font-size: 12.5px;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.2s ease;
            user-select: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .prog-chip:hover {
            border-color: var(--ys-gold);
            background: #fff7ec;
            color: var(--ys-gold-hover);
        }

        .prog-chip.active {
            background: #0b1a30;
            border-color: #0b1a30;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(11, 26, 48, 0.2);
        }

        .form-field-wrap {
            position: relative;
            margin-bottom: 20px;
        }

        .form-field-label {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--ys-navy);
            margin-bottom: 6px;
            display: block;
        }

        .form-field-label span.req {
            color: #dc2626;
            margin-left: 2px;
        }

        .input-pod {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-pod i {
            position: absolute;
            left: 16px;
            color: #94a3b8;
            font-size: 15px;
            pointer-events: none;
            transition: color 0.2s ease;
            z-index: 2;
        }

        .input-pod .form-control-pro {
            width: 100%;
            height: 50px;
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px 16px 10px 46px;
            font-size: 14.5px;
            color: var(--ys-text);
            font-family: inherit;
            transition: all 0.25s ease;
        }

        .input-pod textarea.form-control-pro {
            height: auto;
            min-height: 120px;
            padding-top: 14px;
            resize: vertical;
        }

        .input-pod .form-control-pro:focus {
            background: #ffffff;
            border-color: var(--ys-gold);
            box-shadow: 0 0 0 4px rgba(254, 166, 48, 0.18);
            outline: none;
        }

        .input-pod .form-control-pro:focus + i,
        .input-pod:focus-within i {
            color: var(--ys-gold);
        }

        .btn-submit-inquiry {
            width: 100%;
            background: linear-gradient(135deg, #0b1a30 0%, #152766 100%);
            border: 2px solid #0b1a30;
            color: #ffffff !important;
            font-size: 16px;
            font-weight: 700;
            padding: 14px 28px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 8px 22px rgba(11, 26, 48, 0.2);
        }

        .btn-submit-inquiry:hover {
            background: var(--ys-gold);
            border-color: var(--ys-gold);
            color: #0b1a30 !important;
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(254, 166, 48, 0.35);
        }

        .btn-submit-inquiry i {
            transition: transform 0.25s ease;
        }

        .btn-submit-inquiry:hover i {
            transform: translateX(4px);
        }

        .form-trust-note {
            text-align: center;
            font-size: 12.5px;
            color: var(--ys-muted);
            margin-top: 14px;
            margin-bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .contact-status-alert {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 16px 20px;
            border-radius: 14px;
            margin-bottom: 24px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contact-status-alert.alert-success-custom {
            background: #f0fdf4;
            border: 1.5px solid #86efac;
            color: #14532d;
        }

        .contact-status-alert.alert-danger-custom {
            background: #fef2f2;
            border: 1.5px solid #fca5a5;
            color: #7f1d1d;
        }

        .contact-status-alert .alert-icon {
            font-size: 22px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .contact-status-alert h5 {
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 4px 0;
            color: inherit;
        }

        .contact-status-alert p {
            font-size: 13.5px;
            margin: 0;
            color: inherit;
            line-height: 1.4;
        }

        .campus-map-section {
            padding: 20px 0 90px;
        }

        .map-wrapper-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid var(--ys-border);
            box-shadow: 0 14px 40px rgba(11, 26, 48, 0.08);
            overflow: hidden;
            position: relative;
        }

        .map-iframe-holder {
            width: 100%;
            height: 480px;
            position: relative;
        }

        .map-iframe-holder iframe {
            width: 100%;
            height: 100%;
            border: 0;
            display: block;
        }

        .map-directions-pod {
            background: #ffffff;
            border-radius: 20px;
            padding: 28px 24px;
            border: 1px solid var(--ys-border);
            box-shadow: 0 12px 35px rgba(11, 26, 48, 0.12);
        }

        .map-directions-pod h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 14px;
            color: var(--ys-navy);
        }

        .directions-point {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 14px;
            font-size: 14px;
            color: #334155;
            line-height: 1.45;
        }

        .directions-point i {
            color: var(--ys-gold-hover);
            font-size: 16px;
            margin-top: 3px;
            flex-shrink: 0;
        }

        .directions-point strong {
            color: var(--ys-navy);
        }

        .btn-google-maps {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            background: #0b1a30;
            color: #ffffff !important;
            font-weight: 700;
            font-size: 14px;
            padding: 12px 18px;
            border-radius: 12px;
            text-decoration: none;
            transition: all 0.25s ease;
            margin-top: 10px;
        }

        .btn-google-maps:hover {
            background: var(--ys-gold);
            color: #0b1a30 !important;
            transform: translateY(-2px);
        }

        .contact-faq-sec {
            padding: 80px 0 90px;
            background: #ffffff;
            border-top: 1px solid #e2e8f0;
        }

        .custom-faq-accordion .accordion-item {
            border: 1px solid #e2e8f0;
            border-radius: 14px !important;
            margin-bottom: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(11, 26, 48, 0.03);
            transition: border-color 0.2s ease;
        }

        .custom-faq-accordion .accordion-item:hover {
            border-color: #cbd5e1;
        }

        .custom-faq-accordion .accordion-button {
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            font-weight: 700;
            color: var(--ys-navy);
            background: #ffffff;
            padding: 18px 22px;
            box-shadow: none !important;
        }

        .custom-faq-accordion .accordion-button:not(.collapsed) {
            background: #fff7ec;
            color: var(--ys-gold-hover);
            border-bottom: 1px solid #fed7aa;
        }

        .custom-faq-accordion .accordion-body {
            padding: 20px 22px;
            font-size: 15px;
            line-height: 1.65;
            color: #475569;
            background: #ffffff;
        }

        .contact-cta-ribbon {
            background: linear-gradient(135deg, #07162c 0%, #0b1a30 60%, #152766 100%);
            padding: 55px 0;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .contact-cta-ribbon::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background: radial-gradient(circle, rgba(254, 166, 48, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .contact-cta-ribbon h3 {
            color: #ffffff !important;
            font-size: clamp(24px, 3vw, 34px);
            font-weight: 700;
            margin-bottom: 8px;
        }

        .contact-cta-ribbon p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 16px;
            margin-bottom: 0;
        }

        .cta-btn-group {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 14px;
            flex-wrap: wrap;
        }

        @media (max-width: 991.98px) {
            .cta-btn-group {
                justify-content: flex-start;
                margin-top: 20px;
            }
        }

        .btn-ribbon-gold {
            background: var(--ys-gold);
            color: #0b1a30 !important;
            font-weight: 700;
            font-size: 15px;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(254, 166, 48, 0.3);
        }

        .btn-ribbon-gold:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.3);
        }

        .btn-ribbon-outline {
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.6);
            color: #ffffff !important;
            font-weight: 700;
            font-size: 15px;
            padding: 10px 22px;
            border-radius: 12px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
        }

        .btn-ribbon-outline:hover {
            border-color: #22c55e;
            background: #22c55e;
            color: #ffffff !important;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <?php include_once 'header.php'; ?>

    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                <section class="contact-hero-stage">
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-xl-9 col-lg-10">
                                <div class="breadcrumb-trail" data-aos="fade-down" data-aos-duration="600">
                                    <a href="./"><i class="fas fa-home me-1"></i> Home</a>
                                    <i class="fas fa-chevron-right"></i>
                                    <span>Contact Us</span>
                                </div>
                                <div class="contact-hero-badge" data-aos="fade-down" data-aos-duration="700">
                                    <i class="fas fa-medal me-2"></i> Admissions &amp; Enquiries Open
                                </div>
                                <h1 class="contact-hero-title" data-aos="fade-up" data-aos-duration="800">
                                    Get in Touch with Young Star Cricket Academy
                                </h1>
                                <p class="contact-hero-sub" data-aos="fade-up" data-aos-duration="900">
                                    Whether you want to enroll your child in grassroots or competitive cricket, schedule a free 1-day net trial, tour our campus hostel, or consult our head coach — we’re here to help you begin your journey.
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="contact-quick-strip">
                    <div class="container">
                        <div class="row g-3">
                            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-duration="600">
                                <a href="tel:+919999999000" class="contact-quick-card card-phone">
                                    <div class="contact-quick-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div>
                                        <span class="contact-quick-label">Talk to Admissions</span>
                                        <div class="contact-quick-val">+91 99999 99000</div>
                                        <div class="contact-quick-sub">+91 99999 99001 (6 AM – 8 PM)</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-duration="750">
                                <a href="https://wa.me/919999999000?text=Hello%20Young%20Star%20Cricket%20Academy,%20I%20am%20interested%20in%20cricket%20admissions%20and%20net%20trials." target="_blank" class="contact-quick-card card-wa">
                                    <div class="contact-quick-icon">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    <div>
                                        <span class="contact-quick-label">WhatsApp Helpline</span>
                                        <div class="contact-quick-val">Instant Chat Support</div>
                                        <div class="contact-quick-sub">Fees, schedules &amp; trials</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-duration="900">
                                <a href="mailto:youngstarcricketacademy123@gmail.com" class="contact-quick-card card-mail">
                                    <div class="contact-quick-icon">
                                        <i class="fas fa-envelope-open-text"></i>
                                    </div>
                                    <div>
                                        <span class="contact-quick-label">Official Email</span>
                                        <div class="contact-quick-val" style="font-size:13.5px;">youngstarcricket...</div>
                                        <div class="contact-quick-sub">Replies within 24 hours</div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-duration="1050">
                                <a href="#academy-campus-map" class="contact-quick-card card-loc">
                                    <div class="contact-quick-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <span class="contact-quick-label">Greater Noida Ground</span>
                                        <div class="contact-quick-val">Delta II, Greater Noida</div>
                                        <div class="contact-quick-sub">Beside Aster Public School</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="contact-main-sec">
                    <div class="container">
                        <div class="row g-4">
                            <div class="col-lg-5">
                                <div class="concierge-card" data-aos="fade-up" data-aos-duration="800">
                                    <div class="concierge-card-header">
                                        <div class="icon-pod"><i class="far fa-clock"></i></div>
                                        <div>
                                            <h3>Training &amp; Office Hours</h3>
                                            <span style="font-size:12.5px; color:var(--ys-muted);">On-pitch coaching &amp; administrative shifts</span>
                                        </div>
                                    </div>

                                    <div class="schedule-grid">
                                        <div class="schedule-row">
                                            <div class="schedule-label">
                                                <i class="fas fa-sun" style="color:#f59e0b;"></i> Morning Net Sessions
                                            </div>
                                            <div class="schedule-time">06:00 AM – 09:30 AM</div>
                                        </div>
                                        <div class="schedule-row">
                                            <div class="schedule-label">
                                                <i class="fas fa-moon" style="color:#6366f1;"></i> Evening Match Practice
                                            </div>
                                            <div class="schedule-time">03:30 PM – 07:30 PM</div>
                                        </div>
                                        <div class="schedule-row">
                                            <div class="schedule-label">
                                                <i class="fas fa-briefcase" style="color:#0ea5e9;"></i> Admissions &amp; Visitor Desk
                                            </div>
                                            <div class="schedule-time">09:00 AM – 06:00 PM</div>
                                        </div>
                                    </div>

                                    <div class="badge-live-batch">
                                        <span class="pulse-indicator"></span>
                                        <span>Admissions Active: Limited slots remaining for season batch</span>
                                    </div>

                                    <a href="https://wa.me/919999999000?text=Hello%20Young%20Star%20Cricket%20Academy,%20I%20want%20to%20inquire%20about%20admissions." target="_blank" class="btn-whatsapp-direct">
                                        <i class="fab fa-whatsapp" style="font-size:18px;"></i>
                                        Chat Directly on WhatsApp
                                    </a>
                                </div>

                                <div class="concierge-card" data-aos="fade-up" data-aos-duration="950">
                                    <div class="concierge-card-header">
                                        <div class="icon-pod"><i class="fas fa-share-alt"></i></div>
                                        <div>
                                            <h3>Connect on Social Media</h3>
                                            <span style="font-size:12.5px; color:var(--ys-muted);">Match highlights, drills &amp; academy updates</span>
                                        </div>
                                    </div>

                                    <div class="social-channel-list">
                                        <a href="https://www.facebook.com/" target="_blank" class="social-channel-item">
                                            <div class="social-channel-left">
                                                <div class="social-channel-icon" style="background:#1877f2;">
                                                    <i class="fab fa-facebook-f"></i>
                                                </div>
                                                <div class="social-channel-info">
                                                    <h6>Facebook</h6>
                                                    <span>Young Star Cricket Academy</span>
                                                </div>
                                            </div>
                                            <span class="social-channel-btn" style="background:#1877f2;">Like Page</span>
                                        </a>

                                        <a href="https://www.instagram.com/" target="_blank" class="social-channel-item">
                                            <div class="social-channel-left">
                                                <div class="social-channel-icon" style="background:linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);">
                                                    <i class="fab fa-instagram"></i>
                                                </div>
                                                <div class="social-channel-info">
                                                    <h6>Instagram</h6>
                                                    <span>@youngstarcricketacademy</span>
                                                </div>
                                            </div>
                                            <span class="social-channel-btn" style="background:#d62976;">Follow</span>
                                        </a>

                                        <a href="https://wa.me/919999999000" target="_blank" class="social-channel-item">
                                            <div class="social-channel-left">
                                                <div class="social-channel-icon" style="background:#25d366;">
                                                    <i class="fab fa-whatsapp"></i>
                                                </div>
                                                <div class="social-channel-info">
                                                    <h6>WhatsApp Channel</h6>
                                                    <span>Official Admissions &amp; News</span>
                                                </div>
                                            </div>
                                            <span class="social-channel-btn" style="background:#25d366;">Join Chat</span>
                                        </a>

                                        <a href="https://www.youtube.com/" target="_blank" class="social-channel-item">
                                            <div class="social-channel-left">
                                                <div class="social-channel-icon" style="background:#ff0000;">
                                                    <i class="fab fa-youtube"></i>
                                                </div>
                                                <div class="social-channel-info">
                                                    <h6>YouTube</h6>
                                                    <span>Masterclasses &amp; Tournaments</span>
                                                </div>
                                            </div>
                                            <span class="social-channel-btn" style="background:#cc181e;">Subscribe</span>
                                        </a>
                                    </div>
                                </div>

                              
                            </div>

                            <div class="col-lg-7">
                                <div class="contact-form-card" data-aos="fade-up" data-aos-duration="900">
                                    <div class="contact-form-header">
                                        <span class="form-badge-pill">
                                            <i class="fas fa-paper-plane"></i> Quick Response Within 24 Hours
                                        </span>
                                        <h2>Register for Admission or Free Trial</h2>
                                        <p>
                                            Complete the form below to receive batch timings, fee structures, or to reserve a complimentary 1-day net assessment session.
                                        </p>
                                    </div>

                                    <?php if ($formStatus === 'success'): ?>
                                        <div class="contact-status-alert alert-success-custom">
                                            <div class="alert-icon"><i class="fas fa-check-circle"></i></div>
                                            <div>
                                                <h5>Inquiry Sent Successfully!</h5>
                                                <p>Thank you for reaching out to Young Star Cricket Academy. Our admissions coordinator will call you back within 24 hours.</p>
                                            </div>
                                        </div>
                                    <?php elseif ($formStatus === 'missing'): ?>
                                        <div class="contact-status-alert alert-danger-custom">
                                            <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                                            <div>
                                                <h5>Missing Information</h5>
                                                <p>Please fill in all required fields (Name, Email, Phone Number, and Subject) before submitting.</p>
                                            </div>
                                        </div>
                                    <?php elseif ($formStatus === 'email'): ?>
                                        <div class="contact-status-alert alert-danger-custom">
                                            <div class="alert-icon"><i class="fas fa-envelope-open"></i></div>
                                            <div>
                                                <h5>Invalid Email Address</h5>
                                                <p>Please provide a valid email format so our admissions team can send you the brochure.</p>
                                            </div>
                                        </div>
                                    <?php elseif ($formStatus === 'error'): ?>
                                        <div class="contact-status-alert alert-danger-custom">
                                            <div class="alert-icon"><i class="fas fa-times-circle"></i></div>
                                            <div>
                                                <h5>Submission Error</h5>
                                                <p>Something went wrong while processing your request. Please try again or call us directly at +91 99999 99000.</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <div class="program-select-chips-wrap">
                                        <span class="program-select-chips-label">
                                            <i class="fas fa-tags" style="color:var(--ys-gold);"></i> Click a Program to Auto-Fill Subject:
                                        </span>
                                        <div class="program-chips-container">
                                            <span class="prog-chip" data-subject="For Foundation Cricket Program (Age 6-10)">
                                                <i class="fas fa-baseball-ball"></i> Foundation (6–10 Yrs)
                                            </span>
                                            <span class="prog-chip" data-subject="For Junior Development Program (Age 11-14)">
                                                <i class="fas fa-medal"></i> Junior (11–14 Yrs)
                                            </span>
                                            <span class="prog-chip" data-subject="For Senior Performance Program (Age 15-19)">
                                                <i class="fas fa-fire"></i> Senior (15–19 Yrs)
                                            </span>
                                            <span class="prog-chip" data-subject="For Professional 1-on-1 Coaching">
                                                <i class="fas fa-user-graduate"></i> 1-on-1 Coaching
                                            </span>
                                            <span class="prog-chip" data-subject="For Academy Hostel Accommodation">
                                                <i class="fas fa-hotel"></i> Hostel Facility
                                            </span>
                                            <span class="prog-chip" data-subject="For Gym & Fitness Center">
                                                <i class="fas fa-dumbbell"></i> Gym &amp; Fitness
                                            </span>
                                            <span class="prog-chip" data-subject="Booking Free 1-Day Net Trial Session">
                                                <i class="fas fa-calendar-check"></i> Free Net Trial
                                            </span>
                                        </div>
                                    </div>

                                    <form id="contact-form" class="contact-form" action="contact-submit.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-field-wrap">
                                                    <label class="form-field-label" for="form_name">
                                                        Player / Parent Full Name <span class="req">*</span>
                                                    </label>
                                                    <div class="input-pod">
                                                        <input type="text" id="form_name" class="form-control-pro" placeholder="e.g. Rahul Sharma" name="name" required>
                                                        <i class="far fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-field-wrap">
                                                    <label class="form-field-label" for="form_email">
                                                        Email Address <span class="req">*</span>
                                                    </label>
                                                    <div class="input-pod">
                                                        <input type="email" id="form_email" class="form-control-pro" placeholder="e.g. rahul@example.com" name="email" required>
                                                        <i class="far fa-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-field-wrap">
                                                    <label class="form-field-label" for="form_phone">
                                                        Phone / WhatsApp Number <span class="req">*</span>
                                                    </label>
                                                    <div class="input-pod">
                                                        <input type="tel" id="form_phone" class="form-control-pro" placeholder="e.g. +91 98765 43210" name="phone" required>
                                                        <i class="far fa-phone"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-field-wrap">
                                                    <label class="form-field-label" for="form_subject">
                                                        Inquiry Subject / Program <span class="req">*</span>
                                                    </label>
                                                    <div class="input-pod">
                                                        <input type="text" id="form_subject" class="form-control-pro" placeholder="e.g. For Junior Development Program" name="subject" value="<?php echo htmlspecialchars($subject !== '' ? $subject : 'Cricket Training Admission Inquiry'); ?>" required>
                                                        <i class="far fa-tag"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-field-wrap">
                                                    <label class="form-field-label" for="form_message">
                                                        Message &amp; Player Details (Age, Experience, Questions)
                                                    </label>
                                                    <div class="input-pod">
                                                        <textarea id="form_message" class="form-control-pro" placeholder="Please share the student's age, whether they are a beginner or intermediate player, and preferred batch timing (morning/evening)..." name="message" rows="4"></textarea>
                                                        <i class="far fa-comment-dots" style="top:18px;"></i>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" class="btn-submit-inquiry">
                                                    <span>Submit Inquiry &amp; Book Trial</span>
                                                    <i class="fas fa-arrow-right"></i>
                                                </button>
                                                <p class="form-trust-note">
                                                    <i class="fas fa-lock" style="color:#16a34a;"></i> 100% Confidential. Your details are safe with Young Star Cricket Academy.
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="academy-campus-map" class="campus-map-section" data-aos="fade-up" data-aos-duration="900">
                    <div class="container">
                        <div class="section-title text-center mb-40">
                            <span class="sub-title" data-aos="fade-down" data-aos-duration="1000">
                                <img src="assets/images/line1.png" alt="line">Campus Location
                                <img src="assets/images/line2.png" alt="line">
                            </span>
                            <h2 class="text-anm">Visit Our Training Grounds</h2>
                            <p style="max-width: 680px; margin: 12px auto 0; color: #525a6b; font-size: 16px;">
                                Conveniently located in Delta II, Greater Noida with seamless road and metro connectivity from Noida, Delhi, and Greater Noida West.
                            </p>
                        </div>

                        <div class="map-wrapper-card">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="map-iframe-holder">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7013.196849210712!2d77.522944!3d28.491638!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceb70d13919e3%3A0xa5af6d27d43d33ec!2sAster%20School!5e0!3m2!1sen!2sin!4v1769767465069!5m2!1sen!2sin" 
                                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Young Star Cricket Academy Location"></iframe>
                                    </div>
                                </div>

                                <div class="col-lg-4 d-flex">
                                    <div class="map-directions-pod w-100 d-flex flex-column justify-content-between">
                                        <div>
                                            <h4>How to Reach Ground</h4>
                                            
                                            <div class="directions-point">
                                                <i class="fas fa-subway"></i>
                                                <div>
                                                    <strong>Nearest Metro:</strong><br>
                                                    Alpha 1 or Delta 1 Station (Aqua Line) — approx. 5 minutes auto or cab ride.
                                                </div>
                                            </div>

                                            <div class="directions-point">
                                                <i class="fas fa-landmark"></i>
                                                <div>
                                                    <strong>Key Landmark:</strong><br>
                                                    J-1, Block J, Delta II, directly adjacent to Aster Public School.
                                                </div>
                                            </div>

                                            <div class="directions-point">
                                                <i class="fas fa-parking"></i>
                                                <div>
                                                    <strong>Parking:</strong><br>
                                                    Dedicated safe visitor and parent parking available on-site.
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <a href="https://maps.google.com/?q=Aster+Public+School+Delta+2+Greater+Noida" target="_blank" class="btn-google-maps">
                                                <i class="fas fa-directions"></i> Get Turn-By-Turn Directions
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="contact-faq-sec">
                    <div class="container">
                        <div class="section-title text-center mb-45">
                            <span class="sub-title" data-aos="fade-down" data-aos-duration="1000">
                                <img src="assets/images/line1.png" alt="line">Parent &amp; Player FAQ
                                <img src="assets/images/line2.png" alt="line">
                            </span>
                            <h2 class="text-anm">Frequently Asked Questions</h2>
                            <p style="max-width: 680px; margin: 12px auto 0; color: #525a6b; font-size: 16px;">
                                Clear answers to common questions about admissions, trials, training gear, and hostel facilities.
                            </p>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="accordion custom-faq-accordion" id="contactFaqAccordion">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faqHeadingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                                                Can my child attend a Free Net Trial session before enrolling?
                                            </button>
                                        </h2>
                                        <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne" data-bs-parent="#contactFaqAccordion">
                                            <div class="accordion-body">
                                                Yes, absolutely! We encourage all prospective students to book a complimentary 1-day net assessment session. Our coaches evaluate the player’s hand-eye coordination, batting stance, bowling action, and fitness to recommend the most suitable batch.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faqHeadingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                                                What are the age groups and batch schedules?
                                            </button>
                                        </h2>
                                        <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo" data-bs-parent="#contactFaqAccordion">
                                            <div class="accordion-body">
                                                We have structured training programs for all stages: <strong>Foundation Cricket (Ages 6–10)</strong>, <strong>Junior Development (Ages 11–14)</strong>, <strong>Senior Performance (Ages 15–19)</strong>, and customized <strong>1-on-1 Professional Coaching</strong>. Training is conducted in morning (6:00 AM – 9:30 AM) and evening (3:30 PM – 7:30 PM) shifts.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faqHeadingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                                                What cricket gear or equipment should a beginner bring?
                                            </button>
                                        </h2>
                                        <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree" data-bs-parent="#contactFaqAccordion">
                                            <div class="accordion-body">
                                                Beginners only need comfortable cricket whites or sports track pants, athletic training shoes, and a water bottle. The academy provides training bats, leather &amp; turf balls, safety guards, and nets. Once a player progresses, our head coach will guide you on personal kit specifications.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faqHeadingFour">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                                                Is hostel accommodation available for outstation players?
                                            </button>
                                        </h2>
                                        <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour" data-bs-parent="#contactFaqAccordion">
                                            <div class="accordion-body">
                                                Yes. We provide safe, fully furnished, air-conditioned residential hostel facilities with 4 athletic nutrition meals per day, high-speed Wi-Fi, dedicated quiet study halls, and 24/7 warden supervision and CCTV security.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="faqHeadingFive">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                                                How do coaches track player development and match exposure?
                                            </button>
                                        </h2>
                                        <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive" data-bs-parent="#contactFaqAccordion">
                                            <div class="accordion-body">
                                                Every student undergoes periodic video biomechanical analysis, fitness assessment tests, and regular weekend inter-academy match simulations. Outstanding performers are actively nominated for district, state, and club level selection trials.
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chips = document.querySelectorAll('.prog-chip');
            var subjectInput = document.getElementById('form_subject');

            chips.forEach(function(chip) {
                chip.addEventListener('click', function() {
                    chips.forEach(function(c) { c.classList.remove('active'); });
                    this.classList.add('active');
                    var targetSubject = this.getAttribute('data-subject');
                    if (subjectInput && targetSubject) {
                        subjectInput.value = targetSubject;
                        subjectInput.focus();
                    }
                });
            });

            if (subjectInput && subjectInput.value) {
                var currentVal = subjectInput.value.toLowerCase();
                chips.forEach(function(chip) {
                    var chipVal = chip.getAttribute('data-subject').toLowerCase();
                    if (chipVal.indexOf(currentVal) !== -1 || currentVal.indexOf(chipVal) !== -1) {
                        chip.classList.add('active');
                    }
                });
            }
        });
    </script>
</body>
</html>