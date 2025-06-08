<?php
include('login_functions.php');

if ($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn'])) {
  echo "Nicht angemeldet.";
} else {
  if (!isValidUser($_SESSION['s_username'], $_SESSION['s_pw'])) {
    echo "Falsche Zugangsdaten.";
  } else {
    echo "<table border='0'><tr><td><b>Name:</b></td><td>";
    echo "Max Mustermann";
    echo "</td></tr><tr><td><b>Klasse:</b></td><td>";
    echo "5AHIF";
    echo "</td></tr><tr><td><b>Typ:</b></td><td>";
    echo "Schueler";
    echo "</td></tr></table>";
  }
}
?>