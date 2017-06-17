<?php

session_start();
setcookie(session_name(), '', 100);
session_unset();



// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
session_destroy();

$_SESSION = array();
header('location:index.php');
?>