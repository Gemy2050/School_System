<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn) {
  die("Connection Error");
}

$sql = "select id, name, phone, address, gender from stds where id=$_GET[id]";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $name = $row['name'];
    $id = $row['id'];
    $phone = $row['phone'];
    $address = $row['address'];
    $gender = $row['gender'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/update.css">
  <title>Update Student</title>
</head>
<style>
  .warning {
  color: red;
  width: fit-content;
  margin: auto;
  font-size: 30px;
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translateX(-50%);
}
</style>

<body>
  <h2>Update Student</h2>
  <form action="" method="POST">
    <input class="input" type="text" name="name" placeholder="Name" value="<?php echo (isset($_POST['name']) ? $_POST['name'] : $name) ?>">
    <input class="input"  type="text" name="phone" placeholder="Phone" value="<?php echo (isset($_POST['phone']) ? $_POST['phone'] : $phone) ?>">
    <input class="input"  type="text" name="address" placeholder="Address" value="<?php echo (isset($_POST['address']) ? $_POST['address'] : $address) ?>">
    <div class="radio-inputs">
    <div class="box">
    <input type="radio" name="gender" placeholder="Gender" value="Male" id="male" <?php echo ($gender == 'Male' ? 'checked' : '') ?> <?php echo (isset($_POST['gender']) && $_POST['gender']=='Male' ? 'checked' : '') ?>>
    <label for="male">Male</label>
    </div>
    <div class="box">
    <input type="radio" name="gender" placeholder="Gender" value="Female" id="female" <?php echo ($gender == 'Female' ? 'checked' : '') ?> <?php echo (isset($_POST['gender']) && $_POST['gender']=='Female' ? 'checked' : '') ?>>
    <label for="female">Female</label>
    </div>
    </div>
  <div class="submit-box">
  <input type="submit" value="Update" name="update">
    <input type="submit" value="Cancel" name="cancel">
  </div>
  </form>
  <?php
  if (isset($_POST['update'])) {

    if(strlen($_POST['phone']) != 11 || !is_numeric($_POST['phone'])) {
      echo "<h3 class='warning'>Please, Phone Must Be 11 Numbers</h3>";
      return;
    }

    $sql = "update stds set name='$_POST[name]', phone='$_POST[phone]', address='$_POST[address]', gender='$_POST[gender]' WHERE id=$_GET[id]";

    $sql2 = "update courses set name='$_POST[name]' WHERE id=$_GET[id]";

    mysqli_query($conn, $sql2);

    if (mysqli_query($conn, $sql)) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("location: /school_system/gemy/test.php");
  }
  elseif (isset($_POST['cancel'])) {
    header("location: /school_system/gemy/test.php");
  }
  ?>
</body>
</html>

<?php 
if(!isset($_SERVER["HTTP_REFERER"])) {
  header("location: /school_system/gemy/check.php");
}
?>