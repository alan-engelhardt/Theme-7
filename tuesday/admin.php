<?php
$title = "home";
include_once('inc/head.php');

echo "<h1>".$_SESSION['first_name']."'s personal page</h1>";
echo "<img src='images/" .$_SESSION['image']. "' alt='profile image'>";
echo "<p>".$_SESSION['pw']."</p>";

include_once('inc/footer.php');
?>
