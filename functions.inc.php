<?php
function isValidUserOLD($username, $password)  
{
    if($username == 'admin')
	{
        if($password == 'admin')
        {
            return TRUE;           
        }
    }
    return FALSE;
}

function do_header_start($title)
{
	echo "
	<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:svg=\"http://www.w3.org/2000/svg\">
	<html>
	<head>
		<meta name = 'description' content = 'VDesktop'>
		<meta http-equiv='Content-Type' content='text/html; CHARSET=utf-8'>
		<meta name='author' content='Manuel Hintermayr 4ahif'>
		<title>$title</title>";

}
function do_header_end()
{
    echo "	</head>
	<body>";
}

function do_html_end()
{
    echo "</body>
    </html>";
}


function encrypt($pwd)
{
	$salt = "0x10c";
	$salted_password = $salt.$pwd;
	$password_hash = hash('sha256', $salted_password);
	return $pwd;
}







function mysql_db_connect($dbname) 
{
	$user = 'root';
	$pass = 'X';
	$host = 'localhost';
	try
	{
		$db = new PDO("mysql:host=$host;dbname=$dbname", $user,$pass);
		return $db;
	}
	catch	(Exception $fehler)	{
        var_dump($fehler);
		return NULL;		
	}
}

function mysqlCommand($table, $db, $sql) 
{
	try	
	{
		$res = $db->query($sql);	
		return $res;
	}
	catch	(Exception $fehler)	{
		return NULL;		
	}
}

?>
