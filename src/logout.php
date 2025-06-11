<?php
session_start();    // Start or resume the session

// Destroy all session data
$_SESSION = array();  // Clear all session variables

// If there's a session cookie, delete it by setting its expiration in the past
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally destroy the session
session_destroy();

// Redirect to login page (adjust the path as needed)
header("Location:../user/login.php");
exit();
?>
