<?php
session_start();
	$id = $_GET['id'];
	include'authorize.php';
	$sql = "update blogpost set status = '1' where id = ".$id.";";
	$conn->query($sql);
	$user = $conn->query("select blogger from blogpost where id = ".$id.";")->fetch_assoc()['blogger'];
	$sql = "insert into notifications (`userID`,`descript`) values('".$user."','You blog with blog id ".$id." is now available publicaly');";
	$conn->query($sql);
	header("location:reviewBlog.php?stat=1");
?>
