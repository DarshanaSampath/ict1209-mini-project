<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session securely as required by Phase 3 guidelines
session_destroy();

// Redirect to home page
redirect('../index.php');
?>
