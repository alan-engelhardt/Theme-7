<?php
session_start();
include_once('functions.php');
if(isset($_POST['first_name'])){
	$name = $_POST['first_name'];
	$pw = $_POST['pw'];
	$incpw = sha1($pw);
	require_once('db.php');
	checkValidUser($name, $incpw, $db_connection);
}else{
	header('Location: ../index.php');
}
