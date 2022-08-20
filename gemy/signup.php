<?php 
if(!isset($_SERVER["HTTP_REFERER"])) { 
  header("location: /school_system/gemy/check.php");
}
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "students";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if(isset($_POST['submit'])) {
    if($_POST['password'] == $_POST['confirm']) {
      $sql = "insert into admin(username, password, pin) values('$_POST[username]', '$_POST[password]', '$_POST[pin]')";
      if(!mysqli_query($conn, $sql))
        die("Sql Syntax Error");
      echo "<style> .message{display: block !important;} form{display: none;} </style>";
      header("REFRESH:2;URL=login.php");
    }else {
      echo "<h2 class='warning'>Password does not match</h2>";
    }
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/signup.css">
  <title>Sign Up</title>
</head>
<body>
  <h2>Sign up</h2>
  <form action="" method="POST">
    <input type="text" name="username" placeholder="Username" class="input" required minlength="4">
    <input type="password" name="password" placeholder="Password" class="input" minlength="8" maxlength="16" required>
    <input type="password" name="confirm" placeholder="Confirm password" class="input" minlength="8" maxlength="16" required>
    <input type="number" name="pin" placeholder="PIN" class="input" min="0" required>
    <input type="submit" name="submit" value="Sign up">
  </form>
  <div class="message" style="display: none;">Email is Done</div>
</body>
</html>