<?php
session_start();
require('function.php');
if(isset($_POST['submit'])){

    $un = $_POST['username'];
    $pw = $_POST['pass'];
    ownerLogin($un,$pw);
}


if(isset($_SESSION['owner'])){
    if($_SESSION['owner'] != 0){    
       header('Location: http://localhost/itday/od.php');
    }
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
    <title>Owner Sign In</title>
</head>
<body class="container" >
    <h1>Sign In</h1>

    <?php
    
//        echo $_SERVER['error'];
        if(isset($_SERVER['error'])){
            $err = $_SERVER['error'];
           echo "<div class=\"alert alert-danger\"><strong>Danger!</strong> '$err'.</div>";
        }

        require('si.html');
    ?>

    
</body>
</html>