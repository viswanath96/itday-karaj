<?php
 require('function.php');
 $con = getDbConnection();
//  $q = "CREATE TABLE t (val varchar(255));";
//  $r = mysqli_query($con,$q) or die('unable to create table t');

  $val = $_GET['val'];
  $q = "INSERT INTO t (val) VALUE ('$val');";
  $r = mysqli_query($con,$q) or die('unable to insert');

?>