<?php
session_start();
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
		echo "$first_name $last_name allready exists";
		header('Location: ../register_page.php?exists');
	}

}else{
	header('Location: ../register_page.php?noFormData');
}

function checkIfUserExist($first_name, $last_name, $db_connection){
	$sql = "select id from members where first_name = '$first_name' AND last_name = '$last_name'";
	$result = $db_connection->query($sql);
	$row = $result->fetchObject();
	if($row){
		return true;
	}else{
		return false;
	}
}

function checkValidUser($name, $pw, $db_connection){
	$sql = "select * from members where first_name = '$name' and pw = '$pw'";
	$result = $db_connection->query($sql);
	$row = $result->fetchObject();
	if($row){
		$_SESSION['user_id'] = $row->id;
		$_SESSION['first_name'] = $row->first_name;
		$_SESSION['last_name'] = $row->last_name;
		$_SESSION['pw'] = $row->pw;
		$_SESSION['image'] = $row->image;
		header('Location: ../admin.php');
	}else{
		header('Location: ../login_page.php?loginfail');
	}
}
