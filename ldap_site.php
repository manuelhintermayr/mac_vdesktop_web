<?php
   
 
//ini_set('display_errors',1);
   session_start();
    function isValidUser($username, $passwort)  {
	    if($username=="admin"&&$passwort=="admin")
		{
			return "TRUE";
		}
		else{
			return "Falsche Zugansdaten";
		}

    }
?>
