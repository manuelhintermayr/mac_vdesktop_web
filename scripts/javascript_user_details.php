<?php
    // include('login_functions.php'); - hat schon stattgefunden    
    $var_name="Unknown";
    $var_typ="Unknown";
    $var_kuerzel="Unknown";
    if($_SESSION['loggedIn'] == false || empty($_SESSION['loggedIn']))
    {
        $var_name="Anon";
        $var_typ="anonym";
        $var_kuerzel="anon";
        echo'alert("Nicht angemeldet!");';
        //redirect...
    }
    else{
        if(!isValidUser($_SESSION['s_username'], $_SESSION['s_pw']))
        {
            $var_name="Anon";
            $var_typ="anonym";
            $var_kuerzel="anon";
            echo'alert("Falsche Zugangsdaten.");';
            //redirect...
        }
        else{
            $var_name="";//$_SESSION['displayname'];
            $var_typ="";//$_SESSION['status'];
            $var_kuerzel="";//$_SESSION['klasse'];
        }
    }
    

echo 'localStorage.setItem("person_typ", "';
echo $var_typ;
echo '"); '; 
echo 'localStorage.setItem("person_name", "';
echo $var_name;
echo '"); ';
echo 'localStorage.setItem("person_kuerzel", "';
echo $var_kuerzel;
echo '"); ';
?>