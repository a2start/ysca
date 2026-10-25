<?php

require_once __DIR__ . '/includes/auth.php';

cmsLogout();
header('Location: index.php');
exit;
