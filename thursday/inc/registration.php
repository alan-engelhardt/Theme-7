<?php
session_start();
include_once('functions.php');
include_once('db.php');

if(isset($_POST['register'])){
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$pw = sha1($_POST['pw']);

	if($_FILES['myImage']['name']!=""){
		$tmp = $_FILES['myImage']['tmp_name'];
		$image = $_FILES['myImage']['name'];
		move_uploaded_file($tmp, "../images/$image");
	}else{
		$image = "dummy.png";
	}

	if(!checkIfUserExist($first_name, $last_name, $db_connection)){
		$sql = "insert into members (first_name, last_name, image, email, pw, reg_date) values ('$first_name', '$last_name', '$image', '$email', '$pw', NOW())";
		$db_connection->query($sql);
		checkValidUser($first_name, $pw, $db_connection);
	}else{
		header('Location: ../register_page.php?fname='.$first_name.'&lname='.$last_name);
	}

}else{
	header('Location: ../register_page.php?noFormData');
}
