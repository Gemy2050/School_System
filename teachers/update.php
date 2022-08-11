<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection Error");
}

$sql = "select id, name, phone, address, gender from teachers where id=$_GET[id]";
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
    <title>Update Teacher</title>
</head>
<style>
<?php include("../gemy/css/update.css"); ?>
</style>

<body>
    <h2>Update Teacher</h2>
    <form action="" method="POST">
        <input class="input" type="text" name="name" placeholder="Name" value="<?php echo $name ?>">
        <input class="input" type="text" name="phone" placeholder="Phone" value="<?php echo $phone ?>">
        <input class="input" type="text" name="address" placeholder="Address" value="<?php echo $address ?>">
        <div class="radio-inputs">
            <div class="box">
                <input type="radio" name="gender" placeholder="Gender" value="Male" id="male" <?php echo ($gender == 'Male' ? 'checked' : '') ?>>
                <label for="male">Male</label>
            </div>
            <div class="box">
                <input type="radio" name="gender" placeholder="Gender" value="Female" id="female" <?php if ($gender == "Female") echo "checked" ?>>
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

        $sql = "update teachers set name='$_POST[name]', phone='$_POST[phone]', address='$_POST[address]', gender='$_POST[gender]' WHERE id=$_GET[id]";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        header("location: /school_system/teachers/test.php");
    } elseif (isset($_POST['cancel'])) {
        header("location: /school_system/teachers/test.php");
    }
    ?>
</body>

</html>

<?php
if (!isset($_SERVER["HTTP_REFERER"])) {
    header("location: /school_system/gemy/check.php");
}
?>