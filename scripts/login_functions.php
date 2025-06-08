<?php
session_start();

function isValidUser($username, $password)
{	// TODO: Here should be a correct login functionality, including hashing and salting of passwords, etc.
	if ($username == "admin" && $password == "admin") {
		return "TRUE";
	} else {
		return "Incorrect access data; try 'admin'/'admin'";
	}

}
?>
