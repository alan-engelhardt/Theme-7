<?php
$title = "home";
include_once('inc/head.php');
//$_SESSION['user_id'] = 1;
?>

<h1>Login</h1>
<?php
if(isset($_GET['rejected'])){
	echo "<h3>No match, please try again</h3>";
}
?>
<form action="inc/login.php" method="post">
	<input type="text" name="first_name" placeholder="First name">
	<input type="password" name="pw" placeholder="Password">
	<input type="image" src="images/button.png">
</form>
<p>Some reasons to login could go here...</p>
<?php
include_once('inc/footer.php');
?>
