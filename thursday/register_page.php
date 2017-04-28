<?php
$title = "Registration";
include_once('inc/head.php');
?>

<h1>Please Sign Up</h1>
<?php
if(isset($_GET['fname'])){
	echo "<h3>".$_GET['fname']." ".$_GET['lname']." is already registrered.</h3>";
}
?>
<form action="inc/registration.php" method="post" enctype="multipart/form-data">
   <label>First Name</label>
   <input type="text" name="first_name" required>
   <label>Last Name</label>
   <input type="text" name="last_name">
   <label>Profile image</label>
   <input type="file" name="myImage">
   <label>Email</label>
   <input type="email" name="email">
   <label>Password</label>
   <input type="password" name="pw" required>
    <input type="submit" name="register" value="sign up">
</form>
<p>Some arguments for signing up...</p>

<?php
include_once('inc/footer.php');
?>
