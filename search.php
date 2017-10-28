<head>
	<title>The Dark World : HOME</title>
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
            width: 90%;
            margin: auto;
            background: none;
        }
        .menu li{
            font-size: 20px;
            padding: 1%;
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
            width: 10%;
            font-size: 20px;
        }
        .post{
      width: 60%;
      margin: auto;
      margin-top: 2%;
      background-color: #ffffff;
      color: black;
    }
    .post a{
      color: black;
    }
  </style>
</head>
<body>
	<div class="header"><h3> The Dark World</h3>
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
 	    <li><a href="contactUs.php">Contact Us</a></li>
		</ul>
	</div>
	<div class="posts">
	<?php
	session_start();
	if(isset($_SESSION['del'])){
		unset($_SESSION['del']);
		echo "<script>alert('Blogpost deleted')</script>";
	}
	 $key = $_POST['key'];
   echo "<br><div style='background-color:#847E72;color:white;padding-left:20px;padding-top:5px; font-size: 20px; text-align: center;'>Search results for : ".$key."</div>";
	include 'authorize.php';
    if($_POST['srch']=='user'){
		$sql = "SELECT * from users where userID like '%".$key."%';";
    $res = $conn->query($sql);
    if($res->num_rows>0){
        while($row=$res->fetch_assoc()){
          echo "<div class = 'post'><h1>".$row['name']."</h1><h2>".$row['userID']."</h2><h5><a href ='loadProfile.php?userID=".$row['userID']."'>View Profile</a></h5></div>";
        }
    }
    else{
      echo "<h1> NO USER PROFILES WITH GIVEN KEYWORD</h1>";
    }
    }
    else {
      $sql = "SELECT * FROM blogpost where status = 1 and (title like '%".$key."%' OR descript like '%".$key."%' or post like '%".$key."%');";
      $res = $conn->query($sql);
  		if($res->num_rows>0){
      	  while($row=$res->fetch_assoc()){
      	  	echo "<div class = 'post'><h1>".$row['title']."</h1><h2>".$row['descript']."</h2><h4><a href=openBlog.php?id=".$row['id'].">Read More</a></h4><h5> written by:".$row['blogger']." Time:".$row['date']."</h5></div>";
      	  }
  		}
  		else{
  			echo "<h1> NO BLOGPOSTS TO SHOW</h1>";
  		}
    }
	$conn->close();
?>
	</div>
  <br><br>
  <p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>
