<?php
// Start session cleanly
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
if (!isset($_SESSION['userId'])) {
    header("Location: ../index.php");
    exit();
}

// Optional: Auto-logout after 30 minutes of inactivity
$expiry = 1800; // 30 minutes
if (isset($_SESSION['LAST']) && (time() - $_SESSION['LAST'] > $expiry)) {
    session_unset();
    session_destroy();
    header("Location: ../index.php");
    exit();
}

$_SESSION['LAST'] = time();
?>
