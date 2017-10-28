<?php
	if(isset($_GET['send'])){
	$from = $_POST['mail'];
	if(filter_var($from,FILTER_VALIDATE_EMAIL)){
		$msg = "<html><body>From:".$from."<p>".$_POST['msg']."</body></html>";
		$msg = wordwrap($msg,70);
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail("mailit987@gmail.com",$_POST['subject'],$msg,$headers);
		echo "<script>alert('Your query has been submitted')</script>";}
	else
		echo "<script>alert('Invalid Email address')</script>";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Contact Us
	</title>
	<script src='tinymce/tinymce.min.js'></script>
  	<script>
  	tinymce.init({
    	selector: 'textarea'
  	});
  	</script>
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
		.contact button{
			margin-left: -3%;
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
  		<li><a href="profile.php">My Profile</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
		</ul>
	</div>
	<form class = "contact" action = "contactUs.php?send=1" method="post" onsubmit="return check()">
		<label>E-mail:</label><input type="text" name="mail" id="mail">
		<label>Subject:</label><input type="text" name="subject" id="subject">
		<textarea rows="20" cols="40" name = "msg" id="msg">
		</textarea><p>
		<button type="submit">Send</button>
	</form>
	<script type="text/javascript">
		function check() {
			var sub = document.getElementById('subject').value;
			var msg = document.getElementById('msg').value;
			if(sub==''){
				alert('Subject can\'t be blank');
				return false;
			}
   			return true;
		}
	</script>
	<br><br><br>
	<p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>