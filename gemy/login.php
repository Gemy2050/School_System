<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "students";
$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn) {
  die("Connection Error");
}

if(isset($_POST['submit'])) {

      $sql = "select username, password from admin where username = '$_POST[username]'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        
          if($_POST['password'] == $row['password']) {

            header('location: /school_system/gemy/test.php');

          }else {
              echo "<style> .forget{diplay: block;} </style>";
              echo "<h3 class='error'> Password is Error, Try Again </h3>";
            }
      }
    } else {
      echo "<h3 class='error'> Username is Error</h3>";
    }
  }
  ?>

  <?php 
      $sql = "select username from admin";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result) == 0) {
        echo "<style> .head,form{display: none;}</style>";
        echo "<h2>Click Start To Set Admin</h2>";
        echo "<a class='set' href='signup.php'>Start</a>";
      }


        // $to = "gemy46349@gmail.com"; // this is your Email address
        // $from = "mo2720352@gmail.com"; // this is the sender's Email address
        // $first_name = "Mohamed";
        // $last_name = "Gamal Omar";
        // $subject = "Form submission";
        // $subject2 = "Copy of your form submission";
        // $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" ."Hello There !!!";
        // $message2 = "Here is a copy of your message " . $first_name . "\n\n" . "Hello Again!!";
    
        // $headers = "From:" . $from;
        // $headers2 = "From:" . $to;
        // mail($to,$subject,$message,$headers);
        // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
        // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
        // // You can also use header('Location: thank_you.php'); to redirect to another page.
        // // You cannot use header and echo together. It's one or the other.


//Mail sending function
$subject = "Hi";
$to = "gemy46349@gmail.com";
$from = "mo2720352@gmail.com";

//data
$msg = "Your MSG <br>\n";       

//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: <".$from. ">" ;

mail($to,$subject,$msg,$headers);
echo "Mail Sent.";


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


<h2 class="head">Login</h2>
  <form method="POST">
    <input type="text" name="username" placeholder="Username" class="input" autofocus required>
    <input type="password" name="password" placeholder="Password" class="input" required>
    <div class="submit-box" style="position: relative;">
    <input type="submit" value="Login" name="submit">
    <a href="../index.php" class="cancel">Cancel</a>
    <a class="forget" href='#'>forget password </a>
    </div>
  </form>

</body>
</html>


