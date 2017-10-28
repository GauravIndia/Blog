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
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="posts">
	<?php
	session_start();
	if(isset($_SESSION['del'])){
		unset($_SESSION['del']);
		echo "<script>alert('Blogpost deleted')</script>";
	}
	$user = $_SESSION['logged'];
	include 'authorize.php';
		$sql = "SELECT * from blogpost where blogger like '".$user."' order by date desc;";
		$res = $conn->query($sql);
		if($res->num_rows>0){
    	  while($row=$res->fetch_assoc()){
    	  	echo "<div class = 'post'><h1>".$row['title']."<span style='float:right'><h5><a href='editBlog.php?id=".$row['id']."&publish=0'>Edit</a> | <a href='delete.php?id=".$row['id']."&&src=1'>Delete</a></h5></span></h1><h2>".$row['post']."</h2><h5> written by:".$row['blogger']." Time:".$row['date']."</h5><p></div>";
    	  }
		}
		else{
			echo "<h1> No blogposts to show</h1>";
		}
	$conn->close();
?>
	</div>
	<br><br>
	<p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>
