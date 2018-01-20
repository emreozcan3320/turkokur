<?php
ob_start(); //Turns on output buffering
session_start();

$timezone = date_default_timezone_set("Europe/London");

$con = mysqli_connect("localhost", "root", "", "social3"); //Connection variable
$con ->set_charset("utf8");

if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

?>
