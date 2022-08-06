<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn) {
  die("Connection Error");
}

if(isset($_POST['submit'])) {

      $sql = "select username, password from admin where username = '$_POST[username]'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        
          if($_POST['password'] == $row['password']) {

            header('location: /school_system/gemy/test.php');

          }else {
              echo "<h3 class='error'> Password is Error, Try Again </h3>";
            }
      }
    } else {
      echo "<h3 class='error'> Username is Error</h3>";
    }
  }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" class="input" autofocus>
    <input type="password" name="password" placeholder="Password" class="input">
    <input type="submit" value="Login" name="submit">
    <a href="../index.php" class="cancel">Cancel</a>
  </form>


</body>

<script>
</script>
</html>


