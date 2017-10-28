<!DOCTYPE html>
<html>
<head>
	<title>The Dark World : HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header"><h3> The Dark World</h3>
			<h6>Let's bring out the dark side....!</h6>
	</div>
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
  		<li><a href="profile.php">My Profile</a></li>
  		<li><a href="writeBlog.php?publish=0">Write Blogpost</a></li>
  		<li><a href="viewBlog.php">My Blogposts</a></li>
  		<li><a href="reviewBlog.php">Review Blogposts</a></li>
  		<li><a href="permission.php">Permission Requests</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<?php
		if($_GET['stat']==1){
			echo "<script>alert('Blogpost allowed for viewing')</script>";
		}
		else if($_GET['stat']==2){
			echo "<script>alert('Blogpost deleted')</script>";
		}
		session_start();
		if(isset($_SESSION['logged'])){
			include 'authorize.php';
			$sql = "select * from blogpost where status=0;";
			$res = $conn->query($sql);
			if($res->num_rows>0){
				while($row = $res->fetch_assoc()){
				echo "<div class = 'post'><h1>".$row['title']."<span style='float:right;'><h5><a href='allow.php?id=".$row['id']."'>Allow</a> | <a href='delete.php?id=".$row['id']."&& src=0'>Delete</a></h5></span></h1><h2>".$row['descript']."<p>".$row['post']."</h2><h5> written by:<a href='loadProfile.php?userID=".$row['blogger']."'>".$row['blogger']."</a><span style='margin-left:25px;'>Time:".$row['date']."</h5></div>";
				}
			}
			else{
				echo "<h1 style='margin-left:25px;'>No Blogposts to review";
			}
			$conn->close();
		}
		else
		{
			echo "please login";
			//header("location:error.php");
			//exit();
		}
	?>
</body>
</html>
