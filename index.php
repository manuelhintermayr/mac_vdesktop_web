<?php
include('functions.inc.php');
include('ldap_site.php');
do_header_start("Home");
echo '<script src="jquery.min_v1.11.0.js"></script>';
echo '<script src="jquery-ui.min_v1.11.2.js"></script>';
do_header_end();
session_start();
if($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn']))
{
    //Dann wurde noch nicht eingeloggt ==> Weiterleitung
    echo "Nicht angemeldet... Weiterleitung auf Loggin...";
    header("location: login_desktop.php");
    
}
else{
    if(!isValidUser($_SESSION['s_username'], $_SESSION['s_pw']))
    {
        //Das Loggin stimmt nicht mehr
        echo "Login stimmt nicht mehr... Weiterleitung auf Loggin...";
        $_SESSION['loggedIn']="";
        header("location: login_desktop.php");
    }
}

echo"Willkommen! <a href='logout.php'>Logout</a>";
echo '<script>$("body").load("index_old.php");</script>';
?>

