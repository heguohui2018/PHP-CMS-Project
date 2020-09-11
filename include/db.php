<?php
ob_start();

$mysql_conf = array(
	'host'    => 'localhost',
	'db_user' => 'root',
	'db_pwd'  => 'heguohui2018',
	'db'      => 'cms',
);

$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
	die("could not connect to the database:\n" . $mysqli->connect_error); //诊断连接错误
}


$select_db = $mysqli->select_db($mysql_conf['db']); //诊断库名错误
if (!$select_db) {
	die("could not connect to the db:\n" .  $mysqli->error);
}
