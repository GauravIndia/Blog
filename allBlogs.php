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
	 			if(isset($_SESSION['logged']))
	 				echo "<li><a href='logout.php'>logout</a></li>";
	 			else
	 				echo "<li><a href='login.php?count=0'>Login</a></li>";
	 		?>
		</ul>
	</div>
	<div class="posts">
	<?php
	echo "<div class = 'search'><h1>All Blogposts By ".$_GET['userID']."</h1></div>";
	session_start();
	if(isset($_SESSION['del'])){
		unset($_SESSION['del']);
		echo "<script>alert('Blogpost deleted')</script>";
	}
		include 'authorize.php';
		$sql = "SELECT * from blogpost where blogger like '".$user."';";
		$res = $conn->query($sql);
		if($res->num_rows>0){
    	  while($row=$res->fetch_assoc()){
    	  	echo "<div class = 'post'><h1>".$row['title']."</h1><h2>".$row['descript']."</h2><h4><a href=openBlog.php?id=".$row['id'].">Read More</a></h4><h5> written by:<a href='loadProfile.php?userID=".$row['blogger']."'>".$row['blogger']."</a><span style='margin-left:25px;'>Time:".$row['date']."</h5></div>";
    	  }
		}
		else{
			echo "<h1> NO BLOGPOSTS TO SHOW</h1>";
		}
	$conn->close();
?>
	</div>
</body>
</html>
