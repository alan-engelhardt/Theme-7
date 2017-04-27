<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" href="css/styles.css" type="text/css">
	</head>

	<body>
		<header>
			<h1>Logo and site header goes here...</h1>
		</header>
		<nav>
			<a href="index.php">Home</a>
			<a href="about.php">About</a>
			<?php
			if(isset($_SESSION['user_id'])){
				echo "<a href='members.php'>Members</a>";
				echo "<a href='admin.php'>Admin</a>";
				echo "<a href='inc/logout.php'>Logout</a>";
			}else{
				echo "<a href='login_page.php'>Login</a>";
				echo "<a href='register_page.php'>Registration</a>";
			}
			?>
		</nav>
		<main>
