<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
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

if (!$conn) {
    die("Connection Error");
}
$sql = "select id, name, phone, gender, address from teachers";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <title>Teachers Details</title>
</head>
<style>
<?php include("../gemy/css/style.css"); ?>
</style>

<body>
    <div><a class="add" href="index.php">New Teacher</a></div>
    <a class="home" href="../gemy/main.php">Return Main</a>
    <table>
        <?php
        $sql = "select id, name, phone, gender, address from teachers";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<thead>
            <tr>
            <td>ID</td>
            <td>Teacher Name</td>
            <td>Phone</td>
            <td>Gender</td>
            <td>Address</td>
            <td>Actions</td>
            </tr>
        </thead>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . "<div class='btns'>
            <a class='del' href='/school_system/teachers/delete.php?id=$row[id]' type='submit' name='delete'><i class='fa-solid fa-trash-can'></i></a>" .
                    "<a class='edt' href='/school_system/teachers/update.php?id=$row[id]' type='submit' name='update'><i class='fa-solid fa-pen-to-square'></i></a>
            </div>" . "</td>";
                echo "</tr>";
            }
        } else echo "<h2 class='empty'>Table is Empty</h2>";
        ?>
    </table>
</body>

</html>