<?php
$title = "members";
include_once('inc/head.php');
include_once('inc/db.php');
$sql = "select * from members";
$result = $db_connection->query($sql);
?>
<h1>Members</h1>
<p>Our members</p>
<ul>
	<?php
	while($row = $result->fetchObject()){
		echo "<li>".$row->first_name." ".$row->last_name."</li>";
	}
	?>
</ul>
<?php
include_once('inc/footer.php');
?>
