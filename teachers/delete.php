<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "students";
    $conn = new mysqli($servername, $username, $password, $dbname);


    $sql = "delete from teachers where id=$id";
    if (!mysqli_query($conn, $sql)) {
        echo "Error";
    }
}
header("location: /school_system/teachers/test.php");
exit;
