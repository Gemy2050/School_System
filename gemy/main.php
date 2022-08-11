<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>main page</title>
</head>
<style>
  body {
    font-family: system-ui;
    background-color: #DDD;
  }

  .container {
    width: 400px;
    margin: 40px auto;
    text-align: center;
  }

  .container h2 {
    color: #3AB4F2;
    font-size: 35px;
    padding: 0 40px;
    width: fit-content;
    margin: 50px auto;
  }

  .container a {
    display: block;
    width: 100%;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 30px;
    font-size: 20px;
    font-weight: bold;
    margin: 40px 0;
    background-color: #3AB4F2;
    color: white;
    padding: 15px 0;
    text-decoration: none;
    transition: .3s;
  }
  .container a:hover {
    background-color: #21a4e7;
    transition: .3s;
  }
</style>

<body>
  <div class="container">
    <h2>Choose The Page</h2>
    <a href="test.php">Students Page</a>
    <a href="../teachers/test.php">Teachers Page</a>
    <a href="../index.php">Return Home</a>
  </div>
</body>

</html>