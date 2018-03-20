<?php
session_start();
require('function.php');

if(isset($_POST['osu'])){
    $fn =  $_POST['firstname'];
    $ln =  $_POST['lastname'];
    $un =  $_POST['username'];
    $em =  $_POST['email'];
    $pw =  $_POST['pass'];
    $rpw =  $_POST['repassword'];
    insertOwnerTable($fn,$ln,$un,$em,$pw);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
    require('bs.html');
    ?>
    <title>Owner Sign Up</title>
</head>
<body class="container" >
<div class="container">
  <div class="page-header">
    <h1>House Owner Sign Up</h1>      
  </div>
</div>
<?php
require('suf.html');
?>
 
</body>
</html>