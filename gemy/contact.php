<?php 


if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $msg = $_POST['message'];

  

  $headers = 'From: '.$email .'\r\n';
  $myEmail = 'gemy46349@gmail.com';
  $subject = "Contact Form Subject";

  mail($myEmail, $subject, $msg, $headers);
  echo "Send Successfully <br>";
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contact</title>
</head>
<style>
  body {
  font-family: system-ui;
  background-color: #DDD;
}
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
h2 {
  color: #3AB4F2;
  font-size: 35px;
  padding: 0 40px;
  width: fit-content;
  margin: 30px auto;
}
form {
  width: 400px ;
  margin: auto;
  text-align: center;
}
.input {
  width: 350px;
  margin-bottom: 15px;
  padding: 15px;
  border: none;
  outline: none;
  border-bottom: 1px solid #ccc;
  background-color: #f9f9f9;
  caret-color: lightseagreen;
  font-size: 18px;
}
input[type='submit'] {
  border: none;
  border-radius: 6px;
  cursor: pointer;
  margin-top: 10px;
  font-size: 18px;
}
input[name="submit"] {
  background-color: #3AB4F2;
  border: 2px solid #3AB4F2;
  color: white;
  padding: 10px 60px;
}
textarea {
  resize: none;
  height: 180px;
}

</style>
<body>
<div class="form">
        <div class="content">
          <h2>Request A Discount</h2>
          <form action="" method="POST">
            <input class="input" type="text" placeholder="Your Name" name="name" required>
            <input class="input" type="email" placeholder="Your Email" name="email" required>
            <input class="input" type="text" placeholder="Your Phone" name="phone">
            <textarea class="input" placeholder="Tell Us About Your Needs" name="message" required minlength="15"></textarea>
            <input type="submit" value="Send" name="submit">
          </form>
        </div>
      </div>
</body>
</html>