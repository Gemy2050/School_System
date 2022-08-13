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
  <title>Register Details</title>
</head>
<style>

</style>
<body>
  <a class="home" href="../index.php">Return Home </a>
  <a class="add" href="register.php">Return Main </a>
  <table>
        <?php 

        $sql = "select id, name, phone, email, subjects from courses order by name";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          echo "<thead>
          <tr>
          <td>ID</td>
          <td>Student Name</td>
            <td>Phone</td>
            <td>Email</td>
            <td>Subjects</td>
            </tr>
          </thead>";
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td> 0".$row['phone']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['subjects']."</td>";
            echo "</tr>";
          } 
        }else echo "<h2 class='empty'>Table is Empty</h2>";
        ?>
  </table>
</body>
</html>