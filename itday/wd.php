<?php
session_start();
require('function.php');
//logout
if(isset($_GET['lo']))
{
    if($_GET['lo'] == 1){
        workerLogOut();
    }
}

if(isset($_POST['submit'])){
    $wid = $_SESSION['worker'];
    $du = $_POST['duration'];
    $py = $_POST['pay'];
    $des = $_POST['des'];
    insertWorkerBidsTable($wid,$du,$py,$des);
}




if($_SESSION['worker'] == 0){
    header('Location: '.domain.'wsi.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php require('bs.html');
    ?>
    <title>Worker DashBoard</title>
</head>
<body class="container" >
    <h1>Worker id: <?php echo $_SESSION['worker'] ?></h1>
    <a href="http://localhost/itday/wd.php?lo=1">Log out</a>

    <?php
    require('bid.html');
    ?>

    <h2>Owner Suggestion</h2>
    <table class="table" >
        <thead>
        <tr>
            <th>Worker id</th>
            <th>duration</th>
            <th>pay</th>
            <th>desc</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $wid = $_SESSION['worker'];
        
        $result = getOwnerList($wid);
        
        if($result != null){
            while($row = mysqli_fetch_assoc($result)){
                $oi = $row["ownerid"];
                $du = $row["duration"];
                $py = $row["pay"];
                $desc = $row["descr"];
                echo "<tr><td>'$oi'</td><td>'$du'</td><td>'$py'</td><td>'$desc'</td></tr>";
            }        
                
        }

        ?>
        </tbody>
    </table>



</body>
</html>