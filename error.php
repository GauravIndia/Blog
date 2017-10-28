<!DOCTYPE html>
<html>
<head>
  <title>The Dark World : HOME</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="white">
  <div class="header"><h3> The Dark World</h3>
      <h6>Let's bring out the dark side.....!</h6>
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
      <li><a href="contactUs.php">Contact Us</a></li>
    </ul>
  </div>
  <div class="posts">
    <center>
    <a href = "index.php">Click here to go back to Homepage</a><p>
    <img src = "error.png" alt = "Error"/><p>
    </center>
  </div>
</body>
</html>
