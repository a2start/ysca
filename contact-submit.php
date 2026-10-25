<?php

require_once __DIR__ . '/includes/contacts.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact');
    exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

$redirect = 'contact';
$status = 'error';

if ($name === '' || $email === '' || $phone === '' || $subject === '') {
    $status = 'missing';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $status = 'email';
} else {
    $saved = addContactSubmission([
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'subject' => $subject,
        'message' => $message,
    ]);

    $status = $saved ? 'success' : 'error';
}

header('Location: ' . $redirect . '?status=' . $status);
exit;
