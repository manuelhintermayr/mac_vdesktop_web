<?php
session_start();

$_SESSION['loggedIn'] = "";
header("location: ../login.php");
?>