<?php
	if($_GET['publish']==1)
	{	include 'authorize.php';
		if ($conn->connect_error) {
			header("location:error.php");
			exit();
		}
		session_start();
		$sql = "UPDATE blogpost set title = '".$_POST['title']."',descript = '".$_POST['descript']."',post = '".$_POST['content']."',status=0 where id = ".$_GET['id'].";";
		$conn->query($sql);
		
		$_SESSION['publish']=1;

		header("location:index.php");
		$conn->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>The Dark World : HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src='tinymce/tinymce.min.js'></script>
  <script>
  tinymce.init({
    selector: '#content'
  });
  </script>
  <style>
  	.publishbutton{
  		font-size: 30px;
			background-color: black;
			color: white;
			border-radius: 10px;
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
  		<li><a href="writeBlog.php?publish=0">Write Blogpost</a></li>
  		<li><a href="viewBlog.php">My Blogposts</a></li>
 	    <li><a href="contactUs.php">Contact Us</a></li>
 		<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
	<div class="main">
		<form method="post" action = "editBlog.php?id=<?php echo $_GET['id']?>&publish=1" class = "write" onsubmit ="return check()">
			<input type="text" id = "title" name="title" placeholder="Title"> &nbsp; &nbsp;
			<textarea name="descript" id = "descript" placeholder="A short description of your blog"></textarea>
			<textarea rows="25" cols="50" id = "content" name="content" placeholder="Your main blog content goes here"></textarea><p><br>
			<input type="submit" name="Publish" value="Publish" class="publishbutton">
		</form>
	</div>
	<script type = "text/javascript">
	 		var ttl = "<?php
	 		include("authorize.php");
	 		$sql = "select * from blogpost where id  = ".$_GET['id'].";";
	 		$res = $conn->query($sql);
	 		$row = $res->fetch_assoc();
	 		echo (string)$row['title'];
	 		?>";
	 		var desc = "<?php echo (string)$row['descript']; ?>";
	 		var cont = "<?php echo (string)$row['post']; $conn->close();?>";
	 		document.getElementById('descript').value = desc;
			document.getElementById('content').value = cont;
			document.getElementById('title').value = ttl;
		function check() {
			var title = document.getElementById('title').value;
			var content = document.getElementById('content').value;
			var desc = document.getElementById('descript').value;
			alert(desc);
			if(title=='')
			{
				alert("Title can't be blank");
				return false;
			}
			else if(desc==''){
				alert("Please provide a short description");
				return false;
			}
			else if(content==''){
				alert("Blogpost can't be empty.Please write something");
				return false;
			}
			return true;
		}
	</script>
	<br><br>
	<p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>
