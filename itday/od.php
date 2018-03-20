<?php
session_start();
require('function.php');
if(isset($_GET['lo']))
{
    if($_GET['lo'] == 1){
        ownerLogOut();
    }
}

if(isset($_POST['submit'])){
    $oid = $_SESSION['owner'];
    $du = $_POST['duration'];
    $py = $_POST['pay'];
    $des = $_POST['des'];
    insertOwnerBidsTable($oid,$du,$py,$des);
}



if($_SESSION['owner'] == 0){
    header('Location: '.domain.'osi.php');
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
    <title>Owner DashBoard</title>
</head>
<body class='container' >
    <h1>Owner id: <?php echo $_SESSION['owner'] ?></h1>
    <a href="http://localhost/itday/od.php?lo=1">Log Out</a>
    <?php
    require('bid.html');
    ?>


    <h2>Worker Suggestion</h2>
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
        $oid = $_SESSION['owner'];
        $result = getWorkerList($oid);
        while($row = mysqli_fetch_assoc($result)){
            $wi = $row["workerid"];
            $du = $row["duration"];
            $py = $row["pay"];
            $desc = $row["descr"];
            echo "<tr><td>'$wi'</td><td>'$du'</td><td>'$py'</td><td>'$desc'</td></tr>";
        }        
            
        ?>
        </tbody>
    </table>

</body>
</html>