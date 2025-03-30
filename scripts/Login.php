<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>

<?php
    if (empty($_POST))
    {
        echo "<h1>LOGIN:</h1>";
        echo "<form name='' action='' method='POST'>";
        echo "Benutzername: <input type='text' name='user' id='user'><br />";
        echo "PW: <input type='password' name='passwd' id='passwd'><br />";
        echo "<button type='sumbit'> Login </button>";
        echo "</form>";    
    }
    else 	{

		// Wenn Werte eingetragen wurden
		if ( $_POST['user'] != "" && $_POST['passwd'] != "" ) 		{ 
            $richtigUsername="admin";
            $richtigPasswort="admin";
            if($_POST['user']==$richtigUsername&&$_POST['passwd']==$richtigPasswort)
            {
                echo "<h1>Willkommen, ";
                echo $_POST['user'];
                echo "!</h1>";
            }
            else{
                echo "<h1>Falscher Nutzername und/oder falsches Passwort!</h1> <br> <a href=\"javascript:history.back();\">Zur&uuml;ck";
            }
        } 
        else{
            echo "<h2>Bitte alle Felder ausfüllen!</h2> <br> <a href=\"javascript:history.back();\">Zur&uuml;ck";
        }
    }
    
?>

        
    </body>
</html>
