<?php
 	session_start();
 	if(isset($_SESSION['reg'])){
 		unset($_SESSION['reg']);
 		echo "<script>alert('Registeration successful. Please check your E-mail')</script>";
 	}
 	if(isset($_SESSION['logged'])){
 		if($_SESSION['type']=='A')
 		header("location:adminHome.php");
 		else
 		header("location:bloggerHome.php");
 		exit();
 	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>The Dark World: Home</title>
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
			width: 40%;
			margin: auto;
			background: none;
		}
		.menu li{
			font-size: 30px;
			padding: 3%;
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
	<div class="header"><h3> The Dark World</h3>
			<h6>Let's bring out the dark side....!</h6>
	</div>
 
	<div class = "menu">
		<ul>
  		<li><a href="index.php">Home</a></li>
  		<?php
  			if(isset($_SESSION['logged'])){
  				echo "<li><a href='profile.php'>My Profile</a></li>";
  			}
  		?>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="login.php?count=0">Login</a></li>
		</ul>
	</div>
	 <div class="search">
		<form action="search.php" method="post">
			<input type = "text" placeholder = "Search Here" name ="key" class="searchbox"> &nbsp;
			<input type="radio" name="srch" value="user" checked="1">User &nbsp;
			<input type="radio" name="srch" value="blog">Blog &nbsp;
			<button type="submit">Search</button>
		</form>
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
