<?php
require_once __DIR__ . '/includes/auth.php';
if (cmsIsLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    if (cmsLogin($username, $password)) {
        header('Location: dashboard.php');
        exit;
    }
    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Login | Young Cricket</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/admin.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --green-deep:   #0d2117;
            --green-mid:    #1a3d28;
            --green-accent: #2d6a4f;
            --green-bright: #40c074;
            --gold:         #e8c547;
            --cream:        #f9f6ef;
            --text-dark:    #1a2018;
            --text-muted:   #6b7a6a;
            --border:       #dde8d8;
            --error-bg:     #fef2f2;
            --error-text:   #b91c1c;
            --error-border: #fecaca;
        }

        html, body {
            height: 100%;
            font-family: 'DM Sans', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: var(--cream);
            overflow: hidden;
        }

        .left-panel {
            flex: 0 0 480px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px 56px;
            background: #fff;
            position: relative;
            z-index: 2;
            box-shadow: 12px 0 48px rgba(0,0,0,.08);
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--green-accent), var(--green-bright), var(--gold));
        }

        .brand {
            margin-bottom: 48px;
        }
        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--green-deep);
            color: #fff;
            padding: 8px 16px;
            border-radius: 100px;
            font-size: .72rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .brand-badge span {
            width: 6px; height: 6px;
            background: var(--green-bright);
            border-radius: 50%;
            display: inline-block;
        }
        .brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            font-weight: 900;
            color: var(--text-dark);
            line-height: 1.1;
            margin-bottom: 10px;
        }
        .brand h1 em {
            font-style: normal;
            color: var(--green-accent);
        }
        .brand p {
            color: var(--text-muted);
            font-size: .92rem;
            font-weight: 400;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-size: .78rem;
            font-weight: 600;
            letter-spacing: .06em;
            text-transform: uppercase;
            color: var(--text-dark);
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid var(--border);
            border-radius: 12px;
            font-size: .97rem;
            font-family: 'DM Sans', sans-serif;
            color: var(--text-dark);
            background: var(--cream);
            transition: border-color .2s, box-shadow .2s, background .2s;
            outline: none;
        }
        input:focus {
            border-color: var(--green-accent);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(45,106,79,.1);
        }

        .error {
            background: var(--error-bg);
            color: var(--error-text);
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: .88rem;
            border: 1px solid var(--error-border);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .error::before { content: '⚠'; font-size: 1rem; }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: var(--green-deep);
            color: #fff;
            border: none;
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: .04em;
            margin-top: 8px;
            position: relative;
            overflow: hidden;
            transition: background .25s, transform .15s, box-shadow .25s;
        }
        .btn-login::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent 60%, rgba(255,255,255,.08));
        }
        .btn-login:hover {
            background: var(--green-mid);
            box-shadow: 0 8px 24px rgba(13,33,23,.25);
            transform: translateY(-1px);
        }
        .btn-login:active { transform: translateY(0); }

        .footer-note {
            margin-top: 32px;
            padding-top: 24px;
            border-top: 1px solid var(--border);
            font-size: .78rem;
            color: var(--text-muted);
            text-align: center;
        }

        .right-panel {
            flex: 1;
            position: relative;
            overflow: hidden;
            background: var(--green-deep);
        }

        .field-bg {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 80% 60% at 50% 60%,
                    rgba(45,106,79,.55) 0%,
                    transparent 70%),
                linear-gradient(160deg, #0d2117 0%, #163326 50%, #0a1a10 100%);
        }

        .pitch-lines {
            position: absolute;
            inset: 0;
            opacity: .06;
            background-image:
                repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 48px,
                    rgba(255,255,255,.5) 48px,
                    rgba(255,255,255,.5) 50px
                );
        }

        .boundary {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -40%);
            width: min(70vw, 560px);
            height: min(70vw, 560px);
            border-radius: 50%;
            border: 1.5px solid rgba(64,192,116,.18);
            box-shadow:
                0 0 0 24px rgba(64,192,116,.04),
                0 0 0 48px rgba(64,192,116,.025),
                inset 0 0 80px rgba(64,192,116,.06);
        }
        .boundary::before {
            content: '';
            position: absolute;
            inset: 32px;
            border-radius: 50%;
            border: 1px dashed rgba(64,192,116,.14);
        }

        .pitch-rect {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -40%);
            width: 48px;
            height: 200px;
            background: linear-gradient(180deg, rgba(180,140,80,.25), rgba(180,140,80,.12));
            border: 1px solid rgba(232,197,71,.2);
            border-radius: 4px;
        }

        .stumps {
            position: absolute;
            left: 50%; transform: translateX(-50%);
            display: flex; gap: 5px;
        }
        .stumps.top { top: calc(50% - 40% - 100px + 16px); }
        .stumps.bottom { bottom: calc(50% - 40% + 100px - 16px); }
        .stump {
            width: 3px;
            height: 28px;
            background: rgba(255,255,255,.5);
            border-radius: 2px;
        }
        .bail {
            position: absolute;
            top: -3px; left: -2px;
            width: 19px;
            height: 3px;
            background: rgba(255,255,255,.4);
            border-radius: 2px;
        }

        .right-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 56px 52px;
        }

        .tagline {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.6rem, 3vw, 2.6rem);
            font-weight: 900;
            color: #fff;
            line-height: 1.2;
            margin-bottom: 16px;
            max-width: 380px;
        }
        .tagline em {
            font-style: normal;
            color: var(--green-bright);
        }
        .tagline-sub {
            color: rgba(255,255,255,.5);
            font-size: .92rem;
            font-weight: 300;
            max-width: 320px;
            line-height: 1.7;
            margin-bottom: 36px;
        }

        .stats-row {
            display: flex;
            gap: 32px;
        }
        .stat {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .stat-num {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--gold);
            line-height: 1;
        }
        .stat-label {
            font-size: .75rem;
            color: rgba(255,255,255,.4);
            text-transform: uppercase;
            letter-spacing: .08em;
            font-weight: 500;
        }

        .cricket-ball {
            position: absolute;
            top: 18%;
            right: 14%;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: radial-gradient(circle at 38% 38%, #c0392b, #7b0000);
            box-shadow:
                0 20px 60px rgba(0,0,0,.5),
                inset -8px -8px 20px rgba(0,0,0,.35);
            animation: float 5s ease-in-out infinite;
        }
        .cricket-ball::before,
        .cricket-ball::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            border: 1.5px solid rgba(255,255,255,.22);
        }
        .cricket-ball::before {
            inset: 10px;
            clip-path: ellipse(50% 30% at 50% 50%);
            transform: rotate(-30deg);
        }
        .cricket-ball::after {
            width: 50%;
            height: 100%;
            left: 50%;
            border-left: none;
            border-radius: 0 100% 100% 0;
        }

        .ball-seam {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            overflow: hidden;
        }
        .ball-seam::before {
            content: '';
            position: absolute;
            top: 50%; left: 0; right: 0;
            height: 1.5px;
            background: rgba(255,255,255,.18);
            transform: translateY(-50%) scaleX(.85);
        }
        .ball-seam::after {
            content: '';
            position: absolute;
            left: 50%; top: 0; bottom: 0;
            width: 1.5px;
            background: rgba(255,255,255,.1);
            transform: translateX(-50%) scaleY(.85);
        }

        @keyframes float {
            0%,100% { transform: translateY(0) rotate(0deg); }
            50%      { transform: translateY(-14px) rotate(8deg); }
        }

        .glow-dots {
            position: absolute;
            top: 10%; left: 8%;
            opacity: .4;
        }
        .glow-dots span {
            display: block;
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--green-bright);
            margin: 14px;
            animation: pulse 2.4s ease-in-out infinite;
        }
        .glow-dots span:nth-child(2) { animation-delay: .4s; opacity: .6; }
        .glow-dots span:nth-child(3) { animation-delay: .8s; opacity: .35; }
        @keyframes pulse {
            0%,100% { transform: scale(1); opacity: .4; }
            50%      { transform: scale(1.8); opacity: .9; }
        }

        .left-panel { animation: slideIn .5s cubic-bezier(.22,1,.36,1) both; }
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-28px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        .brand      { animation: fadeUp .5s .1s cubic-bezier(.22,1,.36,1) both; }
        .form-group:nth-child(1) { animation: fadeUp .5s .18s cubic-bezier(.22,1,.36,1) both; }
        .form-group:nth-child(2) { animation: fadeUp .5s .24s cubic-bezier(.22,1,.36,1) both; }
        .btn-login  { animation: fadeUp .5s .3s cubic-bezier(.22,1,.36,1) both; }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 900px) {
            body { flex-direction: column; overflow: auto; }
            .left-panel { flex: none; width: 100%; padding: 48px 32px; box-shadow: none; }
            .right-panel { min-height: 260px; flex: none; }
        }
        @media (max-width: 480px) {
            .left-panel { padding: 36px 24px; }
            .brand h1 { font-size: 1.9rem; }
        }
    </style>
</head>
<body>

    <div class="left-panel">
        <div class="brand">
            <div class="brand-badge"><span></span> Admin Portal</div>
            <h1>Young<br><em>Cricket</em> CMS</h1>
            <p>Manage your gallery, contact messages,<br>and site content from one place.</p>
        </div>

        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autocomplete="username" placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="••••••••••">
            </div>
            <button type="submit" class="btn-login">Sign In →</button>
        </form>

        <div class="footer-note">
            © <?= date('Y') ?> Young Cricket · Secure Admin Access
        </div>
    </div>

    <div class="right-panel">
        <div class="field-bg"></div>
        <div class="pitch-lines"></div>
        <div class="boundary"></div>
        <div class="pitch-rect">
            <div class="stumps top">
                <div class="stump"><div class="bail"></div></div>
                <div class="stump"></div>
                <div class="stump"></div>
            </div>
            <div class="stumps bottom">
                <div class="stump"><div class="bail"></div></div>
                <div class="stump"></div>
                <div class="stump"></div>
            </div>
        </div>

        <div class="cricket-ball">
            <div class="ball-seam"></div>
        </div>

        <div class="glow-dots">
            <span></span><span></span><span></span>
        </div>

        <div class="right-content">
            <h2 class="tagline">Where Young<br>Talent Meets <em>The Game.</em></h2>
            <p class="tagline-sub">Powering the digital home of cricket's next generation — stories, galleries, and more.</p>
            <div class="stats-row">
            </div>
        </div>
    </div>

</body>
</html>