<?php
include('scripts/functions.inc.php');
include('scripts/login_functions.php');

do_header_start("VDesktop - Webbased Desktop");
do_header_end();


if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
    // User is not logged in ==> Redirect to login
    echo "Not logged in... Forwarding to login...";
    header("location: login.php");

} else {
    if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
        // Login credentials are no longer valid ==> Redirect to logout
        echo "Login is no longer correct... Redirection to logout...";
        $_SESSION['loggedIn'] = "";
        header("location: logout/index.php");
    } else {
        // Valid login ==> Redirect to desktop
        echo "Forwarding to <a href='desktop.php'>Desktop</a>...";
        header("location: desktop.php");
    }
}
do_html_end();
?>