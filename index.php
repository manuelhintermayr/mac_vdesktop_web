<?php
include('scripts/functions.inc.php');
include('scripts/login_functions.php');

do_header_start("VDesktop - Webbased Desktop");
do_header_end();


if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
    // Dann wurde noch nicht eingeloggt ==> Weiterleitung auf Login
    echo "Not logged in... Forwarding to loggin...";
    header("location: login.php");

} else {
    if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
        // Das Loggin stimmt nicht mehr ==> Weiterleitung auf Login
        echo "Login is no longer correct... Redirection to logout...";
        $_SESSION['loggedIn'] = "";
        header("location: logout/index.php");
    } else {
        // Korrektes Login ==> Weiterleitung auf Desktop
        echo "Forwarding to <a href='desktop.php'>Desktop</a>...";
        header("location: desktop.php");
    }
}
do_html_end();
?>