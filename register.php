<?php
    if($_GET['reg']==1){
        include 'authorize.php';
        $sql = "SELECT * from users where userID like'".$_POST['userID']."' or mail like '".$_POST['mail']."';";
        $res = $conn->query($sql);
        if($res->num_rows==0){
            $sql = "INSERT into users (`userID`,`password`,`name`,`mail`,`birthdate`,`profession`,`city`) values('".$_POST['userID']."','".$_POST['pswd']."','".$_POST['name']."','".$_POST['mail']."','".$_POST['bday']."','".$_POST['job']."','".$_POST['city']."');";
            $conn->query($sql);
            session_start();
            $_SESSION['reg']=true;

    
            $msg = "Please click the following link for E-mail verification.\n http://127.0.0.1/verify.php?userID=".$_POST['userID']."\nGreetings,\nSports Arena";
            $msg = wordwrap($msg,70);
            mail($_POST['mail'],"Sports Arena : Account Verification",$msg);
            header("location:index.php");
            exit();
        }
    $conn->close();
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
            width: 100%;
            font-size: 20px;
        }
        label, input{
            font-size: 25px;
        }
        .reg{
            width: 100%;
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
        <li><a href="login.php?count=0">Login</a></li>
        </ul>
    </div>
	<?php
		if($_GET['reg']==1)
			echo "<h1>Invalid details.Please check the form.</h1>";
			?>
	<form action = "register.php?reg=1" method="post" class = "reg">
		<label>Name:</label><input type="text" name="name" placeholder="Jhon Doe" class="searchbox"><p>
        <label>Username:</label><input type = "text" name = "userID" placeholder="john.doe123"><p>
		<label>Password:</label><input type="password" name="pswd" placeholder="xxxx"><p>
		<label>E-Mail:</label><input type="text" name="mail" placeholder="jhonedoe@mail.com"><p>
		<label>Birthdate:</label><input type="date" name="bday"><p>
		<label>Profession:</label><input type="text" name="job" placeholder="Student"><p>
		<label>Current City:</label><input type="text" name="city" placeholder="London"><p>
		<button type="submit">REGISTER</button>
	</form>
    <br><br><br><br><br><br>
        <p style="text-align: center; font-size: 20px; color: white; padding: 1%;">&copy All Rights Reserved.</p>
</body>
</html>
