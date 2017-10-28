 <?php
 	session_start();
 	if(isset($_SESSION['logged'])){
 		if($_SESSION['type']=='A')
 		header("location:adminHome.php");
 		else
 		header("location:bloggerHome.php");
 		exit();
 	}
 	if(isset($_SESSION['verified'])){
 		unset($_SESSION['verified']);
 		echo "<script>alert('E-mail Verification Completed. Please Login.')</script>";
 	}
 	if($_GET['count']==1){
	include 'authorize.php';
	$user = $_POST['userID'];
	$pswd = $_POST['pswd'];
	$sql = "SELECT * from users where verified = 1 and userID like '".$user."' and password like  '".$pswd."';";
	$res = $conn->query($sql);
	if($res->num_rows==1){
      $row = $res->fetch_assoc();
      $_SESSION['logged']=$user;
      $_SESSION['type']=$row['type'];
      header('Location:index.php');
     // header("Location: https://localhost:8888/blog_u15co073/index.php");
        // header("Location: http://www.hibbard.eu");
      $conn->close();
      exit();
	}
	$conn->close();
   }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Login</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<style>body{
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
		label, input{
			font-size: 20px;
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
 	    <li><a href="contactUs.php">Contact Us</a></li>
		</ul>
	</div>
 	<?php
 		$count = $_GET['count'];
		if($count==1)
			echo "<p style='margin-left:35%;'>User not registered<p>";
 	?>
 	<form action="login.php?count=1" method="post" class="login" onsubmit="return check()">
 		<label>USERNAME:</label><input type="text" name="userID" id ="userID"><p>
 		<label>PASSWORD:</label><input type="password" name="pswd" id="pswd"><p>
 		<button type = "submit">LOGIN</button><p><br>
 		NEW USER?<a href="register.php?reg=0" style="text-align: center;"> REGISTER HERE</a>
 	</form>
 	<script type="text/javascript">
 		function check() {
 			var user = document.getElementById('userID').value;
 			var pswd = document.getElementById('pswd').value;
 			if(user=='' || pswd == ''){
 				alert("Invalid username/password");
 			 	return false;
 			 }
 			return true;
 		}
 	</script>
 	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 	<p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
 </body>
 </html>
