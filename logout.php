<?php

session_start();
setcookie(session_name(), '',time()+ 1200);



// If it's desired to kill the session, also delete the session cookie.
unset($_COOKIE);
// Note: This will destroy the session, and not just the session data!
session_destroy();
session_unset();


$_SESSION = array();
header('location:index.php');
?>