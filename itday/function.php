<?php
require('webconfig.php');


function getConnection(){
    $con = mysqli_connect(host,username,password);
    return $con;
}

function createDatabase(){
    $con = getConnection();
    $q = "CREATE DATABASE itday;";
    $r = mysqli_query($con,$q) or die('cannot create itday db');
}



function getDbConnection(){
    $con = mysqli_connect(host,username,password,dbname);
    return $con;
}

//Admin Table
function createAdminTable(){
    $con = getDbConnection();
    $q = "CREATE TABLE adminTable (id int(255) NOT NULL AUTO_INCREMENT, firstname varchar(255), lastname varchar(255),username varchar(255), pass varchar(255), dt datetime(6),PRIMARY KEY(id));";
    $r = mysqli_query($con,$q) or die('unable to create admin table');
    mysqli_close($con);
}

function dropAdminTable(){
    $con = getDbConnection();
    $q= 'DROP TABLE adminTable;';
    $r = mysqli_query($con,$q) or die('Unable to drop admin table');

}

function insertAdminValue(){
    $con = getDbConnection();
    $fn = 'firstname';
    $ln = 'lastname';
    $un = 'admin';
    $pass = 'password';
    $pass = md5($pass);
    $dt = date("Y-m-d h:i:sa");
    //$q = "INSERT INTO adminTable firstname = '$fn',lastname = '$ln', username='$un',pass='$pass',dt=date();";          
    $q = "INSERT INTO adminTable (firstname,lastname,username,pass,dt) VALUES ('$fn','$ln','$un','$pass','$dt');";
    $r = mysqli_query($con,$q) or die(mysqli_error($con));
}

function adminLogin($un,$pw){
    $con = getDbConnection();
    $pw  = md5($pw);
    $q = "SELECT * FROM adminTable WHERE username = '$un';";
    $r = mysqli_query($con,$q);
    if(mysqli_num_rows($r) == 1){
        $row = mysqli_fetch_assoc($r);
        if($row[pass] == $pw){
            $_SESSION['admin'] = 1;
        }
    }
}

function adminLogOut(){
    if($_SESSION['admin']){
        $_SESSION['admin'] = 0;
    }
}

//Worker Table
function createWorkerTable(){
    $con = getDbConnection();
    $q = "CREATE TABLE workerTable (id int(255) NOT NULL AUTO_INCREMENT, firstname varchar(255), lastname varchar(255), username varchar(255),email varchar(255), pass varchar(255), dt datetime(6),PRIMARY KEY(id));";
    $r = mysqli_query($con,$q) or die('unable to create worker table');
    mysqli_close($con);
}

function insertWorkerTable($fn,$ln,$un,$email,$pass){
    $con = getDbConnection();
    $pass = md5($pass);
    $dt = date("Y-m-d h:i:sa");          
    $q = "INSERT INTO workerTable (firstname,lastname,username,email,pass,dt) VALUES ('$fn','$ln','$un','$email','$pass','$dt');";
    $r = mysqli_query($con,$q) or die(mysqli_error($con));
}


function dropWorkerTable(){
    $con = getDbConnection();
    $q= 'DROP TABLE workerTable;';
    $r = mysqli_query($con,$q) or die('Unable to drop worker table');
}

function workerLogin($un,$pw){
    $con = getDbConnection();
    $pw  = md5($pw);
    $q = "SELECT * FROM workerTable WHERE username = '$un';";
    $r = mysqli_query($con,$q);
    if(mysqli_num_rows($r) == 1){
        $row = mysqli_fetch_assoc($r);
        if($row["pass"] == $pw){
            $_SESSION['worker'] = $row["id"];
            //die('user found');
        }
        else{
            $_SESSION['password and username do not match'];
            die('pass and user do not match');
        }
    }
    else{
        $_SESSION['No such users'];
        die('nos such users');
    }

}

function workerLogOut(){
    if($_SESSION['worker']){
        $_SESSION['worker'] = 0;
    }
}


function createWorkerBidsTable(){
    $con = getDbConnection();
    $q = "CREATE TABLE workerBidsTable (id int(255) NOT NULL AUTO_INCREMENT, workerid int(255), duration int(255), pay int(255), descr varchar(255),completed int(255), ownerid int(255), dt datetime(6),PRIMARY KEY(id));";
    $r = mysqli_query($con,$q) or die('unable to create worker bid table');
    mysqli_close($con);
}

function dropWorkerBidsTable(){
    $con = getDbConnection();
    $q = "DROP TABLE workerBidsTable;";
    $r = mysqli_query($con,$q) or die('unable to drop worker bid table');
    mysqli_query($con);
}


function workerBidsLastRow($wid){
    $con = getDbConnection();
    $q = "SELECT * FROM workerBidsTable WHERE workerid = '$wid' ORDER BY id DESC LIMIT 1;";
    $r = mysqli_query($con,$q) or die('unable to get the last row');
    if(mysqli_num_rows($r) == 1){
        $row = mysqli_fetch_assoc($r);
        return $row;
    }
    return null;
}

function workerBidsTableAllRows($wid){
    $con = getDbConnection();
    $q = "SELECT * FROM workerBidsTable WHERE workerid = '$wid' ORDER BY id DESC;";
    $r = mysqli_query($con,$q) or die('unable to get the worker bids rows');
    if(mysqli_num_rows($r) > 0){
        return $r;
    }
    return null;
}


function insertWorkerBidsTable($wid,$du,$p,$de){
    $lastBid = workerBidsLastRow($wid);
    $con = getDbConnection();
    $c = 0;
    $dt = date("Y-m-d h:i:sa");
    if($lastBid == null){
    $q = "INSERT INTO workerBidsTable (workerid, duration, pay, descr, completed, dt) VALUES ('$wid','$du','$p','$de','$c','$dt');";
    }
    else{
        $rowid = $lastBid["id"];
        $q = "UPDATE workerBidsTable SET duration = '$du', pay = '$p', descr = '$de', completed = '$c', dt = '$dt' WHERE id = '$rowid';";
    }
    $r = mysqli_query($con,$q);
}

//Owner Table

function createOwnerTable(){
    $con = getDbConnection();
    $q = "CREATE TABLE ownerTable (id int(255) NOT NULL AUTO_INCREMENT, firstname varchar(255), lastname varchar(255), username varchar(255),email varchar(255), pass varchar(255), lat DOUBLE, lon DOUBLE, rad DOUBLE,dt datetime(6) ,PRIMARY KEY(id));";                
    $r = mysqli_query($con,$q) or die(mysqli_error($con));
    mysqli_close($con);
}

function insertOwnerTable($fn,$ln,$un,$email,$pass){
    $con = getDbConnection();
    $pass = md5($pass);
    $dt = date("Y-m-d h:i:sa");
    //$q = "INSERT INTO adminTable firstname = '$fn',lastname = '$ln', username='$un',pass='$pass',dt=date();";          
    $q = "INSERT INTO ownerTable (firstname,lastname,username,email,pass,dt) VALUES ('$fn','$ln','$un','$email','$pass','$dt');";
    $r = mysqli_query($con,$q) or die(mysqli_error($con));
}


function dropOwnerTable(){
    $con = getDbConnection();
    $q= 'DROP TABLE ownerTable;';
    $r = mysqli_query($con,$q) or die('Unable to drop owner table');
}

function createOwnerBidsTable(){
    $con = getDbConnection();
    $q = "CREATE TABLE ownerBidsTable (id int(255) NOT NULL AUTO_INCREMENT, ownerid int(255), duration int(255), pay int(255), descr varchar(255),completed int(255), workerid int(255), dt datetime(6),PRIMARY KEY(id));";
    $r = mysqli_query($con,$q) or die('unable to create owner bid table');
    mysqli_close($con);
}

function dropOwnerBidsTable(){
    $con = getDbConnection();
    $q = "DROP TABLE ownerBidsTable;";
    $r = mysqli_query($con,$q) or die('unable to drop owner bid table');
    mysqli_query($con);
}

function ownerBidsLastRow($oid){
    $con = getDbConnection();
    $q = "SELECT * FROM ownerBidsTable WHERE ownerid = '$oid' ORDER BY id DESC LIMIT 1;";
    $r = mysqli_query($con,$q) or die('unable to get the last row');
    if(mysqli_num_rows($r) == 1){
        $row = mysqli_fetch_assoc($r);
        return $row;
    }
    return null;
}

function ownerBidsTableAllRows($oid){
    $con = getDbConnection();
    $q = "SELECT * FROM ownerBidsTable WHERE ownerid = '$oid' ORDER BY id DESC;";
    $r = mysqli_query($con,$q) or die('unable to get the last row');
    if(mysqli_num_rows($r) > 0){
        return $r;
    }
    return null;
}

function insertOwnerBidsTable($oid,$du,$p,$de){
    $lastBid = ownerBidsLastRow($oid);
    $con = getDbConnection();
    $c = 0;
    $dt = date("Y-m-d h:i:sa");
    if($lastBid == null){
    $q = "INSERT INTO ownerBidsTable (ownerid, duration, pay, descr, completed, dt) VALUES ('$oid','$du','$p','$de','$c','$dt');";
    }
    else{
        $rowid = $lastBid["id"];
        $q = "UPDATE ownerBidsTable SET duration = '$du', pay = '$p', descr = '$de', completed = '$c', dt = '$dt' WHERE id = '$rowid';";
    }
    $r = mysqli_query($con,$q);
}

function ownerLogin($un,$pw){
    $con = getDbConnection();
    $pw  = md5($pw);
    $q = "SELECT * FROM ownerTable WHERE username = '$un';";
    $r = mysqli_query($con,$q);
    if(mysqli_num_rows($r) == 1){
        $row = mysqli_fetch_assoc($r);
        if($row["pass"] == $pw){
            
            $_SESSION['owner'] = $row["id"];
           // die($_SESSION['owner']);
        }
        else{
            die('user name and password do not match');
            $_SERVER['error'] = 'user name and password do not match';
        }
        
    }
    else
    {
        die('no such user');
    }
    
}

function ownerLogOut(){
    if($_SESSION['owner']){
        $_SESSION['owner'] = $row[id];
    }
}

// get worker list
function getWorkerList($oid){
    $con = getDbConnection();
    $row = ownerBidsLastRow($oid);
    $localpay = $row["pay"];
    $ldure = $row["duration"];
    $lcomp = $row["completed"];
    if($lcomp == 0){
        $q = "SELECT * FROM workerBidsTable WHERE duration = '$ldure' AND pay <='$localpay' ORDER BY id DESC LIMIT 10;";
        $r = mysqli_query($con,$q) or die('unable to get list of workers');
        if(mysqli_num_rows($r) > 0){
            return $r;
        }
    }    
    return null;
}

//get owners list
function getOwnerList($wid){
    $con = getDbConnection();
    $row = workerBidsLastRow($wid);
    $localpay = $row["pay"];
    $ldure = $row["duration"];
    $lcomp = $row["completed"];
    $lc = 0;
    if($lcomp == 0){
        $q = "SELECT * FROM ownerBidsTable WHERE duration = '$ldure' AND pay >='$localpay' AND completed ='$lc' ORDER BY id DESC LIMIT 10;";
        $r = mysqli_query($con,$q) or die('unable to get list of owners');
        if(mysqli_num_rows($r) > 0){
            return $r;
        }
    }    
    return null;
}


?>