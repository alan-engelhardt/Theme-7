<?php
$title = "home";
include_once('inc/head.php');

echo "<h1>".$_SESSION['first_name']."'s personal page</h1>";
echo "<img src='images/" .$_SESSION['image']. "' alt='profile image'>";
echo "<p>You have visited this page ".$_COOKIE[$name]." times</p>";

include_once('inc/footer.php');
?>
