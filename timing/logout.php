<?php
require "inc/function.inc.php"; // configuration

// start session to have access to SESSION superglobal
//session_start();

if (loggedIn()){
    logMsgWithParam("alert", "User Logged Out", $_SESSION['accessCode']);
    // remove all existing session data
    session_destroy();
    session_unset();
    // redirect to login
    header("Location: login.php");
    die();
} else {
    logMsg("notice", "Logout Redirect");
     // remove all existing session data
     session_destroy();
     session_unset();
    header("Location: uhoh.php");
}
?>