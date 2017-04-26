<?php
$title = "members";
include_once('inc/head.php');
if(isset($_SESSION['user_id'])){
include_once('inc/db.php');
$sql = "select * from members";
$result = $db_connection->query($sql);
?>
<h1>Members</h1>
<h2>Hello<?php echo $_SESSION['first_name']; ?></h2>
<p>This is your fellow members:</p>
<ul>
	<?php
	while($row = $result->fetchObject()){
		echo "<li>".$row->first_name." ".$row->last_name.", mail: ".$row->email."</li>";
	}
	?>
</ul>
<?php
}else{
	echo "<h2>No access</h2>";
}
include_once('inc/footer.php');
?>
