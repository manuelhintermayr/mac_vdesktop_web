<?php

function do_header_start($title)
{
	echo "
	<html xmlns='http://www.w3.org/1999/xhtml' xmlns:svg='http://www.w3.org/2000/svg'>
	<html>
	<head>
		<meta name = 'description' content = 'VDesktop'>
		<meta http-equiv='Content-Type' content='text/html; CHARSET=utf-8'>
		<meta name='author' content='Manuel Hintermayr'>
		<meta name='keywords' content='VDesktop, mac, os, web-based desktop, desktop, Manuel Hintermayr, Hintermayr, php, jquery, javascript, web developer, portfolio, manuelhintermayr.com, manuelweb.at'>
		<meta name='description' content='VDesktop is a web-based desktop interface that runs entirely in the browser. It was designed to offer a familiar, OS-like experience with useful small tools for quick and intuitive use by both students and teachers.'>
		<title>$title</title>";
}
function do_header_jquery()
{
	echo "
	<script src='assets/js/jquery.min_v1.11.0.js'></script>
	<script src='assets/js/jquery-ui.min_v1.11.2.js'></script>";
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

?>