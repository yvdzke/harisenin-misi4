<?php
include 'service/database.php';
session_start(); // start the session

// destroy all session data
session_unset();
session_destroy();

// redirect to login page
header("Location: login.php");
exit;
?>
