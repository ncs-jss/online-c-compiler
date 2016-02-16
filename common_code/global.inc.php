<?php 

global $dbname;
$dbname="registration";
$ROOT_FILE_PATH = $_SERVER['DOCUMENT_ROOT'] ;// Variable to be used for absolute linking
$ROOT_PATH = "http://";

if ($_SERVER['SERVER_NAME'] == "www.Zealicon 2011-jssaten.com")
{
	$ROOT_PATH .= "www.Zealicon 2011-jssaten.com";
}
elseif ($_SERVER['SERVER_NAME'] == "localhost")
{
	$ROOT_PATH .= "localhost";
}
elseif ($_SERVER['SERVER_NAME'] == "ankur")
{
	$ROOT_PATH .= "ankur";
}
elseif ($_SERVER['SERVER_NAME'] == "192.168.0.30")
{
	$ROOT_PATH .= "192.168.0.30";
}

else
{
	$ROOT_PATH .= $_SERVER['SERVER_NAME']; // . "/localhost:8080";
}

?>