<?php
session_start();


$_SESSION['loggedIn']="";
echo "Du wurdest erfolgreich ausgeloggt! Zur&uuml;ck zu <a href=\"login_desktop.php\">Home.</a>";


do_footer();
?>