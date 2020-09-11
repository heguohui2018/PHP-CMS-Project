<?php
ob_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "heguohui2018";
$db_name = "cms";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$query = "SET NAMES utf8";
mysqli_query($connection, $query);

if (!$connection) {
	die("connection Failed");
}


if (!isset($_SESSION)) {
	session_start();
}
