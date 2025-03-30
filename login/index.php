<?php
include('../scripts/login_functions.php');
include('../scripts/functions.inc.php');

function bekommeWertVonTabelle($username, $spalte)
{
  return "Administrator";
}

function cleanPost($val)
{
  if (!isset($_POST[$val])) {
    $_POST[$val] = NULL;
    return;
  }
  $_POST[$val] = trim(htmlentities($_POST[$val], ENT_QUOTES, 'UTF-8'));
}

function validateUser($u, $p)
{
  $meldung = isValidUser($u, $p);
  if ($meldung == "TRUE") {
    $_SESSION['loggedIn'] = "true";
    $_SESSION['s_username'] = $_POST['user'];
    $_SESSION['s_pw'] = $_POST['pass'];
    return "TRUE";
  }

  return $meldung;
}
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  cleanPost('user');
  cleanPost('pass');

  $meldung = validateUser($_POST['user'], $_POST['pass']);
  if ($meldung == "TRUE") {

    $userPrefs = array(

      'name' => bekommeWertVonTabelle($_SESSION['s_username'], "U_Vorname"),
      'background' => 'CCFFFF'
    );
    echo json_encode($userPrefs);
  } else {
    header('HTTP/1.1 403 Forbidden');
    echo $meldung;
  }
} else {
  header('HTTP/1.1 404 Not Found');
  do_header_start("VDesktop - Login Request");
  do_header_end();
  echo 'Please login <a href="../login.php">here</a>.';
}
?>