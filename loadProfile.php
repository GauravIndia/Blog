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
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<?php
 			session_start();
			if(isset($_SESSION['src'])){
				if($_SESSION['src']==0)
					echo "<script>alert('You stopped following ".$_GET['userID']."')</script>";
				else
					echo "<script>alert('You started following ".$_GET['userID']."')</script>";
				unset($_SESSION['src']);
			}
 			if(isset($_SESSION['logged']))
 				echo "<li><a href='logout.php'>logout</a></li>";
 			else
 				echo "<li><a href='login.php?count=0'>Login</a></li>";
 		?>
		</ul>
	</div>
	<?php
		if(isset($_GET['userID'])){
			$user = $_GET['userID'];
			include 'authorize.php';
			$sql = "select * from users where userID like '".$user."';";
			$res = $conn->query($sql);
			if($res->num_rows>0){
				$row = $res->fetch_assoc();
				echo "<div class = 'profile'><h1>".$row['name'];
				if(isset($_SESSION['logged']) && $_SESSION['logged']!=$user){
					$sql = "select count(*) as num from follows where userID like '".$_SESSION['logged']."'and following like '".$user."';";
					$r = $conn->query($sql)->fetch_assoc()['num'];
					if($r==1)
						echo "<span style = 'margin:50px;'><a href = 'network.php?src=0&userID=".$user."'><img src = 'remove.png' height 50px width = 50px alt = 'remove from network'/></a></span></h1>";
					else
					echo "<span style = 'margin:50px;'><a href = 'network.php?src=1&userID=".$user."'><img src = 'add.png' height 50px width = 50px alt = 'add to network'/></a></span></h1>";
				}
				echo "<h3>Username : ".$row['userID']."<p>Profession : ".$row['profession']."<p>City : ".$row['city']."<p>E-Mail : ".$row['mail']."<p> Birthdate : ".$row['birthdate']."</h3>";
				echo "<h4><a href = 'allBlogs.php?userID=".$user."'>View All Blogposts</a></h4></div>";
				echo "<div class='profile'><ul>";
				$sql = "SELECT count(*) as num from follows where userID like'".$user."';";
				$count = $conn->query($sql)->fetch_assoc()['num'];
				echo "<li>Following: ".$count."  </li>";
				echo "<br>";
				$sql = "SELECT count(*) as num from follows where Following like'".$user."';";
				$count = $conn->query($sql)->fetch_assoc()['num'];
				echo "<li>Followers: ".$count."  </li>";
				echo "<br>";
				$sql = "SELECT count(*) as num from blogpost where blogger like'".$user."' and status = 1;";
				$count = $conn->query($sql)->fetch_assoc()['num'];
				echo "<li>Posts: ".$count."  </li></ul>";
			}
			else{
				header("location:error.php");
				exit();
			}
			$conn->close();
		}
		else
		{
			header("location:error.php");
			exit();
		}
	?>
	<br><br>
	<p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>
