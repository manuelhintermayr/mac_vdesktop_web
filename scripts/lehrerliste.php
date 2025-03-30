<?php
include('login_functions.php');

if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
    echo "Nicht angemeldet.";
} else {
    if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
        echo "Falsche Zugangsdaten.";
    } else {
        echo "<h1>In Arbeit!</h1>";
    }
}
?>