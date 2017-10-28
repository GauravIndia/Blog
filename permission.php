<?php
	session_start();
	if(isset($_SESSION['publish'])){
 		echo "<script>alert('Blogpost submitted for moderation.');</script>";
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
		.heading{
			font-size: 30px;
		}
		table{
			width: 80%;
		}
		td{
			padding: 1%;
		}
	</style>
</head>
<body>
	<div class="header"><h3> The Dark World<span style="float:right; margin: 15px;"><a href="notifications.php"><img src="notif.png" alt="Notification" height="40px" width="40px"></a></span></h3>
			<h6>Let's bring out the dark side....!</h6>
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
  		<li><a href="reviewBlog.php?stat=0">Review Blogposts</a></li>
  		<li><a href="permission.php">Permissions</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="posts">
	<?php
		include 'authorize.php';
		$sql = "SELECT * FROM users;";
		$res = $conn->query($sql);
		echo "<table class = 'users'><tr class ='heading'><td>User ID</td><td>Write permissions</td><td>Role<br>(Click to toggle)</td><td>Profile</td></tr>";
		while($row=$res->fetch_assoc()){
			$stat="";
			$type = "";
			if($row['canWrite']==0)
				$stat = "Allow";
			else
				$stat = "Disallow";

			if($row['type']=='A')
				$type = "Admin";
			else
				$type = "Blogger";

			echo "<tr><td>".$row['userID']."</td><td><a href = 'permit.php?userID=".$row['userID']."'>".$stat."</a></td><td><a href = 'permit2.php?userID=".$row['userID']."&type=".$row['type']."'>".$type."</a></td><td><a href = 'loadProfile.php?userID=".$row['userID']."'>View Profile</a></td></tr>";
		}
		echo "</table>";
	?>
	</div>
	<br><br>
	<p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>
