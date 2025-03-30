<?php
    
    
    session_start();
     
    include('ldap_site.php');
    if($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn']))
    {
        echo "Nicht angemeldet.";
    }
    else{
        if(!isValidUser($_SESSION['s_username'], $_SESSION['s_pw']))
        {
            echo "Falsche Zugangsdaten.";
        }
        else{
            echo"<table border='0'><tr><td><b>Name:</b></td><td>";
            //$_SESSION['userdaten']="fasdfasdfasdfa";
            echo $_SESSION['displayname'];
            echo"</td></tr><tr><td><b>Klasse:</b></td><td>";
             echo $_SESSION['klasse'];
            echo"</td></tr><tr><td><b>Typ:</b></td><td>";
             echo $_SESSION['status'];
             echo"</td></tr></table>";
           //  echo $_SESSION['department'];
         // var_dump($_SESSION['alles']);
           //  var_dump($_SESSION['feld1']);
            // echo($_SESSION['userdaten']."<br />");

          // print_r($_SESSION['userdaten']);
        }
    }
?>

