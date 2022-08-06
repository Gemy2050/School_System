<?php 

  if(!isset($_SERVER['HTTP_REFERER'])){
    header('location: /school_system/gemy/check.php');
    exit;
  }

?>
<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);

if(!$conn) {
  die("Connection Error");
}
$sql = "select id, name, phone, gender, address from stds";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="../css/all.min.css">
  <title>Students Details</title>
</head>
<style>
  .home {
  text-decoration: none;
  background-color:rgb(25, 141, 243);
  color: white;
  font-size: 20px;
  border-radius: 6px;
  padding: 10px;
  position: fixed;
  right: 3px;
  top: 10px;
}
table {
  margin-top: 50px;
}
</style>
<body>
  <div ><a class="add" href="index.php">New Student</a></div>
  <a class="home" href="../index.php">Return Home</a>
  <table>
        <?php 
        $sql = "select id, name, phone, gender, address from stds";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          echo "<thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Phone</td>
            <td>Gender</td>
            <td>Address</td>
            <td>Actions</td>
            </tr>
          </thead>";
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['phone']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['address']."</td>";
            echo "<td>" ."<div class='btns'>
            <a class='del' href='/school_system/gemy/delete.php?id=$row[id]' type='submit' name='delete'><i class='fa-solid fa-trash-can'></i></a>" .
            "<a class='edt' href='/school_system/gemy/update.php?id=$row[id]' type='submit' name='update'><i class='fa-solid fa-pen-to-square'></i></a>
            </div>"."</td>";
            echo "</tr>";
          } 
        }else echo "<h2 class='empty'>Table is Empty</h2>";
        ?>
  </table>
</body>
</html>