<?php 
    if(isset($_POST['submit'])) {
      
      if(!($_POST['name'] == "Ahmed")) {
        echo "<h3 class='error'> Error, Try Again </h3>";
      }else header('location: /school_system/gemy/test.php');
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>
<body>
  <h2>Login</h2>
  <form action="" method="POST">
    <input type="text" name="name" placeholder="Name" class="input" autofocus>
    <input type="number" name="id" placeholder="ID" class="input">
    <input type="submit" value="Login" name="submit">
    <a href="../index.php" class="cancel">Cancel</a>
  </form>


</body>

<script>
</script>
</html>


