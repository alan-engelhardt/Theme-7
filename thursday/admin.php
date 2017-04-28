<?php
$title = "Admin";
include_once('inc/head.php');
$name = $_SESSION['first_name'];

echo "<h1>$name's personal page</h1>";
echo "<img src='images/" .$_SESSION['image']. "' alt='profile image'>";
echo "<p>You have logged in ".$_COOKIE[$name]." times</p>";
echo "<p>".$_SESSION['pw']."</p>";

include_once('inc/footer.php');
?>
