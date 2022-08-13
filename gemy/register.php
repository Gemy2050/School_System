<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn)
  die(mysqli_connect_error());

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register page</title>
</head>
<style>
  body {
    font-family: system-ui;
    background-color: #DDD;
  }

  h2 {
    margin: auto;
    margin-top: 15px;
    margin-bottom: 25px;
    font-size: 30px;
    color: #3AB4F2;
    width: fit-content;
  }

  form {
    width: 400px;
    margin: auto;
    text-align: center;
  }

  .input {
    width: 350px;
    margin-bottom: 25px;
    padding: 15px;
    border: none;
    outline: none;
    border-bottom: 1px solid #ccc;
    background-color: #f9f9f9;
    caret-color: lightseagreen;
    font-size: 18px;
  }

  input[type='submit'],
  a.cancel {
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin: 50px auto;
    font-size: 18px;
    margin: 10px;
  }

  input[name="submit"] {
    background-color: #3AB4F2;
    border: 2px solid #3AB4F2;
    color: white;
    padding: 11px 60px;
  }

  a.cancel {
    padding: 10px 60px;
    background-color: white;
    color: #3AB4F2;
    border: 2px solid #3AB4F2;
    text-decoration: none;
  }

  .subjects-content {
    padding: 15px;
    padding-right: 30px;
    display: flex;
    justify-content: space-between;
  }

  h3 {
    color: #777;
  }

  .subjects-content .subjects {
    text-align: left;
  }

  .subjects-content .subjects .sub {
    margin: 10px 0;
    font-size: 18px;
    user-select: none;
    color: #3AB4F2;
    font-weight: bold;
  }

  input[type='checkbox'] {
    margin-right: 8px;
  }

  .warning {
    background-color: #3AB4F2;
    width: 450px;
    height: 250px;
    font-size: 25px;
    font-weight: bold;
    border-radius: 8px;
    line-height: 250px;
    color: white;
    text-align: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 11;
  }

  .hide {
    background-color: blue;
    padding: 10px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    color: white;
    text-align: center;
    position: absolute;
    top: 65%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 11;
  }

  .overlay {
    position: absolute;
    width: 100%;
    height: 111%;
    background-color: rgba(0, 0, 0, .8);
    left: 0;
    top: 0;
    display: none;
    z-index: 10;
  }

  .det {
    text-decoration: none;
    background-color: rgb(25, 141, 243);
    color: white;
    font-size: 20px;
    border-radius: 6px;
    padding: 10px;
    position: fixed;
    left: 4px;
    top: 10px;
  }
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
</style>

<body>
  <div class="overlay"></div>
  <div class="container">
    <h2>Registration Page</h2>
    <a class="det" href="register_details.php">Register Details</a>
    <a class="home" href="../index.php">Return Home</a>

    <form method="post" action="">

      <input class="input" type="number" name="id" placeholder="ID" required>
      <input class="input" type="text" name="phone" placeholder="Phone" required>
      <input class="input" type="email" name="email" placeholder="Email" required>

      <div class="subjects-content">
        <h3>Select 5 Courses</h3>
        <div class="subjects">
          <div class="sub"><input type="checkbox" name='subjects[]' value="Calculus" id="calculus"> <label for="calculus">calculus</label></div>
          <div class="sub"><input type="checkbox" name='subjects[]' value="Physics" id="physics"> <label for="physics">physics</label></div>
          <div class="sub"><input type="checkbox" name='subjects[]' value="English" id="english"> <label for="english">english</label></div>
          <div class="sub"><input type="checkbox" name='subjects[]' value="Algebra" id="algebra"> <label for="algebra">algebra</label> </div>
          <div class="sub"><input type="checkbox" name='subjects[]' value="Algoritms" id="algorithms"><label for="algorithms">algorithms</label></div>
          <div class="sub"><input type="checkbox" name='subjects[]' value="Electronics" id="electronics"> <label for="electronics">electronics</label></div>
          <div class="sub"><input type="checkbox" name='subjects[]' value="IS" id="is"> <label for="is">IS</label></div>
          <div class="sub"><input type="checkbox" name='subjects[]' value="CS" id="cs"> <label for="cs">CS</label></div>
        </div>
      </div>

      <input type="submit" value="Add" name="submit">
      <a href="../index.php" class="cancel">Exit</a>
    </form>

  </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

  if (strlen($_POST['phone']) != 11 || !is_numeric($_POST['phone'])) {
    echo "<p class='warning'>Please, Phone Must Be 11 Numbers</p>";
    echo "<a class='hide' href=''>Hide</a>";
    echo "<style>.overlay{display:block;}</style>";
    return;
  }
  if (empty($_POST['subjects'])) {
    echo "<p class='warning'>Please, subjects cannot be empty</p>";
    echo "<a class='hide' href=''>Hide</a>";
    echo "<style>.overlay{display:block;}</style>";
    return;
  }


  if (count($_POST['subjects']) == 5) {


    $sql = "select name from stds where id = '$_POST[id]'";
    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $name = $row['name'];

      $sub = implode(', ', $_POST['subjects']);

      $sql = "insert into courses values($_POST[id],'$name','$_POST[phone]','$_POST[email]', '$sub')";
      try {
        if (!mysqli_query($conn, $sql))
          throw new Exception();
        echo "<p class='warning'>Done Successfully</p>";
        
      } catch (Exception $e) {
        echo "<p class='warning'>You have Enrolled Once</p>";
      }
      echo "<a class='hide' href='register_details.php'>Ok</a>";
      echo "<style>.overlay{display:block;}</style>";
    } else {
      echo "<p class='warning'>Unknown ID </p>";
      echo "<a class='hide' href=''>Hide</a>";
      echo "<style>.overlay{display:block;}</style>";
    }
  } else {
    echo "<style>.overlay{display:block;}</style>";
    echo "<p class='warning'>Subjects Must Be 5</p>";
    echo "<a class='hide' href=''>Hide</a>";
  }
}
?>


