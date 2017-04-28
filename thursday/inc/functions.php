<?php
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
		$first_name = $row->first_name;
		$_SESSION['first_name'] = $first_name;
		$_SESSION['user_id'] = $row->id;
		$_SESSION['last_name'] = $row->last_name;
		$_SESSION['image'] = $row->image;
		$_SESSION['pw'] = $row->pw;
		if(isset($_COOKIE[$first_name])){
			setcookie($first_name, $_COOKIE[$first_name]+1, time()+60*60*24*30, "/");
		}else{
			setcookie($first_name, 1, time()+60*60*24*30, "/");
		}
		header('Location: ../admin.php');
	}else{
		echo $sql;
		header('Location: ../login_page.php?rejected');
	}
}
