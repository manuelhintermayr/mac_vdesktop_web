<?php
session_start();

function isValidUser($username, $passwort)
{
	// TODO: Here should be a correct login functionality, including hashing and salting of passwords, etc.
	if ($username == "admin" && $passwort == "admin") {
		return "TRUE";
	} else {
		return "Incorrect access data, try 'admin'/'admin'";
	}

}
?>