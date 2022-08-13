<?php
if (isset($_GET["id"])) {
  $id = $_GET["id"];

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "students";
  $conn = new mysqli($servername, $username, $password, $dbname);


  $sql = "delete from stds where id=$id";
  if(!mysqli_query($conn, $sql)) {
    echo "Error";
  }
  $sql2 = "delete from courses where id=$id";
  mysqli_query($conn, $sql2);
}
header("location: /school_system/gemy/test.php");
exit;
?>