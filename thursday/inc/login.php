<?php
session_start();
if(isset($_POST['first_name'])){
	$name = $_POST['first_name'];
	$pw = $_POST['pw'];
//	$_POST comes from the form

	$incpw = sha1($pw);
	require_once('db.php');
	$sql = "select * from members where first_name = '$name' and pw = '$incpw'";
	$result = $db_connection->query($sql);
	if($row = $result->fetchObject()){
		$_SESSION['user_id'] = $row->id;
		$_SESSION['first_name'] = $row->first_name;
		$_SESSION['last_name'] = $row->last_name;
		$_SESSION['image'] = $row->image;
		$_SESSION['pw'] = $row->pw;
		header('Location: ../admin.php');
	}else{
		header('Location: ../login_page.php?rejected');
	}

}else{
	header('Location: ../index.php');
}
