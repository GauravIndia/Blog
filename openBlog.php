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
  		<?php
				session_start();
  			if(isset($_SESSION['logged'])){
  			  	echo "<li><a href='profile.php'>My Profile</a></li>";
  			  	echo "<li><a href='writeBlog.php?publish=0'>Write Blogpost</a></li>";
  			  	echo "<li><a href='viewBlog.php'>My Blogposts</a></li>";
  			 }
  		?>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<?php
 			if(isset($_SESSION['logged']))
 				echo "<li><a href='logout.php'>Logout</a></li>";
 			else
 				echo "<li><a href='login.php?count=0'>Login</a></li>"

 		?>
		</ul>
	</div>
	<div class="posts">
	<?php
		include 'authorize.php';
		$sql = "SELECT * from blogpost where id = '".$_GET['id']."';";
		$res = $conn->query($sql);
		if($res->num_rows>0){
    	  while($row=$res->fetch_assoc()){
    	  	$count = $conn->query("select count(*) as liked from likes where id = ".$row['id'].";");
    	  	$count = $count->fetch_assoc();
    	  	echo "<br>";
    	  	echo "<div class = 'post'><br><h1>".$row['title']."</h1><h2>".$row['post']."</h2><span class='likes'><b>liked by: ".$count['liked']." people</b></span><h5><br> written by:".$row['blogger']." Time:".$row['date']."</h5><p>";
					echo "<form action ='comment.php?id=".$_GET['id']."' method = 'post'><ul id = comment>";
					echo "<br>";
					if(isset($_SESSION['logged']) && $row['blogger']!=$_SESSION['logged']){

						$sql = "select count(*) as num from likes where id = ".$_GET[id]." and userID like '".$_SESSION['logged']."';";
						$r = $conn->query($sql)->fetch_assoc()['num'];
						if($r==1){
							echo "<li><a href = 'like.php?src=0&id=".$_GET['id']."'><img src = dislike.png height = 50px width = 50px alt = Unlike /></a>";
						}
						else{
							echo "<li><a href = 'like.php?src=1&id=".$_GET['id']."'><img src = like.png height = 50px width = 50px alt = Like /></a>";
						}
					}
					echo "</li><li><textarea name = comment rows = 3 cols = 50 maxlength = 500 placeholder = 'share your views'></textarea></li><li><button type = submit>Comment</button></li></ul>";
					echo "</div>";
			  }
				include 'viewComments.php';
		}
		else{
			header("location:error.php");
		}
	$conn->close();
	?>
	</div>
</body>
</html>
