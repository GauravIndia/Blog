<?php
	session_start();
	if(isset($_SESSION['publish'])){
 		echo "<script>alert('Blogpost submmitted for moderation.');</script>";
		unset($_SESSION['publish']);
 	}
	if(!isset($_SESSION['logged']))
	{
		header("location:index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Dark World : HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		body{
			background-color: #847E72;
		}
		.header{
			padding: 2%;
			color: white;
			background-color: #847E72;
			text-align: center;
		}
		.search{
			background-color: #847E72;
			padding: 2%;
			font-size: 30px;
			text-align: center;
		}
		.menu{
			text-align: center;
			width: 90%;
			margin: auto;
			background: none;
		}
		.menu li{
			font-size: 20px;
			padding: 2%;
		}
		.menu ul{
			background-color: #847E72;
		}
		button{
			font-size: 30px;
			background-color: black;
			color: white;
			border-radius: 10px;
		}
		.searchbox{
			width: 20%;
			font-size: 30px;
		}
	</style>
</head>
<body>
	<div class="header"><h3> The Dark World<span style="float:right; margin: 15px;"><a href="notifications.php"><img src="notif.png" alt="Notification" height="40px" width="40px"></a></span></h3>
			<h6>Let's bring out the dark side.....!</h6>
	</div>
	<div class="search">
		<form action="search.php" method="post">
			<input type = "text" placeholder = "Search Here" name ="key" class="searchbox"> &nbsp;
			<input type="radio" name="srch" value="user" checked="1">User &nbsp;
			<input type="radio" name="srch" value="blog">Blog &nbsp;
			<button type="submit">Search</button>
		</form>
	</div>
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
  		<li><a href="profile.php">My Profile</a></li>
  		<li><a href="writeBlog.php?publish=0">Write Blogpost</a></li>
  		<li><a href="viewBlog.php">My Blogposts</a></li>
		<li><a href="networkBlog.php">Netwok Blogposts</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="posts">
	<?php
		include 'loadPosts.php';
	?>
	</div>
	<br><br>
	<p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>
