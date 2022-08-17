<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection Error");
}

if (isset($_POST['submit'])) {

  $sql = "select username, password from admin where username = '$_POST[username]'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

      if ($_POST['password'] == $row['password']) {

        header('location: /school_system/gemy/main.php');
      } else {
        echo "<h3 class='error'> Password is Wrong, Try Again </h3>";
      }
    }
  } else {
    echo "<h3 class='error'> Username is Wrong</h3>";
  }
}
?>

<?php
$sql = "select username from admin";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
  echo "<style> .head,form{display: none;}</style>";
  echo "<h2>Click Start To Set Admin</h2>";
  echo "<a class='set' href='signup.php'>Start</a>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="css/login.css"> -->
  <title>Login</title>
</head>
<style>
  <?php include("css/login.css"); ?>
</style>

<body>


  <h2 class="head">Login</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" class="input" autofocus value="<?php echo (isset($_POST['username']) ? $_POST['username'] : '') ?>">
    <input type="password" name="password" placeholder="Password" class="input">
    <input type="submit" value="Login" name="submit">
    <a href="../index.php" class="cancel">Cancel</a>
    <input type="submit" name="forget" value="forget password" style="padding:0;background:transparent;color:#3AB4F2;font-size:20px">
  </form>


  <?php
  if (isset($_POST['forget'])) {
    echo "<style>.head,form{display: none;} .form2{display:block !important;}</style>";
    echo "<h2>Login With PIN</h2>";
  }
  if (isset($_POST['submit2'])) {
    $sql = "select username, pin from admin where username = '$_POST[username]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      if ($_POST['pin'] == $row['pin']) {

        header('location: /school_system/gemy/test.php');
      } else {
        echo "<h3 class='error'> PIN is Wrong, Try Again </h3>";
      }
    } else {
      echo "<h3 class='error'> Username is Wrong, Try Again</h3>";
    }
  }
  ?>
  <form method="POST" style="display: none;" class="form2">
    <input type="text" name="username" placeholder="Username" class="input" autofocus required>
    <input type="number" name="pin" placeholder="PIN" class="input" required>
    <input type="submit" value="Login" name="submit2">
    <a href="../index.php" class="cancel">Cancel</a>
  </form>

</body>

</html>