<?php
require('function.php');
session_start();
if(isset($_GET['un']))
$un = $_GET['un'];

if(isset($_GET['pw']))
$pw = $_GET['pw'];

$pw = md5($pw);

ownerLogin($un,$pw);
workerLogin($un,$pw);

if($_SESSION['owner']>0)
echo 'o'.str($_SESSION['owner']);

if($_SESSION['worker']>0)
echo 'w'.str($_SESSION['worker']);

?>