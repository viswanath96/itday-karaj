<?php
//?fn=''&ln=''&uid=''&em=''&pw=''&ty=''
require('function.php');
session_start();
if(isset($_GET['fn']))
$fn = $_GET['fn'];

if(isset($_GET['ln']))
$ln = $_GET['ln'];

if(isset($_GET['uid']))
$uid = $_GET['uid'];

if(isset($_GET['em']))
$em = $_GET['em'];

if(isset($_GET['pw']))
$pw = $_GET['pw'];

if(isset($_GET['ty']))
$ty = $_GET['ty'];

if($ty=='owner'){
    insertOwnerTable($fn,$ln,$uid,$em,$pw);
}

if($ty == 'worker'){
    insertWorkerTable($fn,$ln,$un,$em,$pw);
}
?>