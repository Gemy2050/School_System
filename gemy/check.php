<?php 

if(!($_SERVER["REQUEST_METHOD"] == 'POST')) {
  echo "<h2 class='warning'>You Cannot Open This Page Directly<br><br>You Will be Directed To Login Page in 5 seconds</h2>";
  header("REFRESH:5; URL=login.php");
}
?>


<style>
  body {
    font-family: system-ui;
    background-color: #DDD;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .warning {
    color: red;
    font-size: 40px;
    font-weight: bold;
    text-align: center;
    width: 100%;
  }
</style>