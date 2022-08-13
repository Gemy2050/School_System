<?php
  if(!isset($_SERVER["HTTP_REFERER"])) {
    header("location: /school_system/gemy/check.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/add.css">
  <title>Add Student</title>
</head>
<body>
<h2>Add New Student</h2>
<form action="index.php" method="POST" >
    <input class="input" type="text" name="name" placeholder="Name" required>
    <input class="input" type="text" name="phone" placeholder="Phone" required>
    <input class="input" type="text" name="address" placeholder="Address" required>
    <div class="radio-inputs">
    <div class="box">
    <input type="radio" name="gender" placeholder="Gender" value="Male" id="male" checked>
    <label for="male">Male</label>
    </div>
    <div class="box">
    <input type="radio" name="gender" placeholder="Gender" value="Female" id="female">
    <label for="female">Female</label>
    </div>
    </div>
  <div class="submition">
  <input type="submit" value="Add" name="submit">
    <a href="test.php" value="Cancel" class="cancel">Cancel</a>
  </div>
  </form>
</body>
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
  die(mysqli_connect_error());


  if(isset($_POST["submit"])) {
    if(strlen($_POST['phone']) != 11 || !is_numeric($_POST['phone'])) {
      echo "<h3 class='warning'>Please, Phone Must Be 11 Numbers</h3>";
      return;
    }
      $name = $_POST["name"];
      $address = $_POST["address"];
      $gender = $_POST["gender"];
      $phone = $_POST["phone"];
      $sql = "insert into stds(name, phone, gender, address) values('$name','$phone','$gender', '$address')";
      if(!mysqli_query($conn, $sql)) 
        echo "Failed";
      
      header("location: /school_system/gemy/test.php");
    }elseif(isset($_POST["cancel"])) {
      header("location:  /school_system/gemy/test.php");
    }
?>