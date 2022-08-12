<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>register page</title>
</head>
<style>
  <?php include("css/add.css"); ?>
</style>

<body>
  <h2>Registration Page</h2>
  

  <form method="post" action="">
    <span>What are your favourite colours?</span><br/>
    <input type="checkbox" name='colour[]' value="Red"> Red <br/>
    <input type="checkbox" name='colour[]' value="Green"> Green <br/>
    <input type="checkbox" name='colour[]' value="Blue"> Blue <br/>
    <input type="checkbox" name='colour[]' value="Black"> Black <br/>
	<br/>
    <input type="submit" value="Submit" name="submit">
</form>

<?php
if(isset($_POST['submit'])){

    if(!empty($_POST['colour'])) {

        foreach($_POST['colour'] as $value){
            echo "Chosen colour : ".$value.'<br/>';
        }

    }

}
?>


</body>

</html>