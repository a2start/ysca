<?php

require_once dirname(__DIR__) . '/config.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function cmsIsLoggedIn(): bool
{
    return !empty($_SESSION[CMS_SESSION_KEY]);
}

function cmsRequireLogin(): void
{
    if (!cmsIsLoggedIn()) {
        header('Location: index.php');
        exit;
    }
}

function cmsLogin(string $username, string $password): bool
{
    if ($username !== CMS_ADMIN_USERNAME) {
        return false;
    }

    if (!password_verify($password, CMS_ADMIN_PASSWORD_HASH)) {
        return false;
    }

    $_SESSION[CMS_SESSION_KEY] = true;
    session_regenerate_id(true);
    return true;
}

function cmsLogout(): void
{
    $_SESSION = [];
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }
    session_destroy();
}

function cmsCsrfToken(): string
{
    if (empty($_SESSION['cms_csrf'])) {
        $_SESSION['cms_csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['cms_csrf'];
}

function cmsVerifyCsrf(?string $token): bool
{
    return is_string($token)
        && !empty($_SESSION['cms_csrf'])
        && hash_equals($_SESSION['cms_csrf'], $token);
}

function cmsChangePassword(string $currentPassword, string $newPassword)
{
    if (!password_verify($currentPassword, CMS_ADMIN_PASSWORD_HASH)) {
        return 'Current password is incorrect.';
    }

    if (strlen($newPassword) < 8) {
        return 'New password must be at least 8 characters long.';
    }

    $newHash = password_hash($newPassword, PASSWORD_BCRYPT, ['cost' => 12]);
    $configFile = dirname(__DIR__) . '/config.php';

    $currentContent = file_get_contents($configFile);
    if ($currentContent === false) {
        return 'Could not read configuration file.';
    }

    
    $newContent = preg_replace(
        "/define\('CMS_ADMIN_PASSWORD_HASH',\s*'[^']*'\);/",
        "define('CMS_ADMIN_PASSWORD_HASH', '" . addslashes($newHash) . "');",
        $currentContent
    );

    if ($newContent === null || $newContent === $currentContent) {
        return 'Could not update configuration file. Hash line not found.';
    }

    if (file_put_contents($configFile, $newContent, LOCK_EX) === false) {
        return 'Could not write to configuration file. Check file permissions.';
    }

    return true;
}
