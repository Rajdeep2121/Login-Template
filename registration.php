<?php
session_start();
// header('location:login.php');
// $con = mysqli_connect('postgres://bujdqnykpoacpa:69e98c3b8e683e0890cb73d939ecaafdfda1a10c21a5dc2de832b91287f7e833@ec2-34-197-141-7.compute-1.amazonaws.com:5432/db8iem6qdutl20
// ','bujdqnykpoacpa','69e98c3b8e683e0890cb73d939ecaafdfda1a10c21a5dc2de832b91287f7e833
// ','db8iem6qdutl20','69e98c3b8e683e0890cb73d939ecaafdfda1a10c21a5dc2de832b91287f7e833');

// // create db if it doesnt exist
// $createdb = "create database userregistration";
// if($con->query($createdb) === TRUE){
//     echo "";
// }
// else{
//     echo "";
// }

// mysqli_select_db($con,'userregistration');


$dsn = "pgsql:"
    . "host=ec2-34-197-141-7.compute-1.amazonaws.com;"
    . "dbname=db8iem6qdutl20;"
    . "user=bujdqnykpoacpa;"
    . "port=5432;"
    . "sslmode=require;"
    . "password=69e98c3b8e683e0890cb73d939ecaafdfda1a10c21a5dc2de832b91287f7e833";

$con = new PDO($dsn);









// create table if it doesnt exist
$create = "create table table2(name varchar(255),password varchar(255),age int,post varchar(255),salary int,email varchar(255), PRIMARY KEY(email))";
if(mysqli_query($con, $create)){
    echo "";
}
else{
    echo "";
}


$email = $_POST['email'];
$pass = $_POST['password'];
$name = $_POST['name'];
$s = "select * from table2 where email='$email'";
$result = mysqli_query($con,$s);
$num = mysqli_num_rows($result);
if($num==1){
    echo "<h3 style='font-family:Segoe UI;'>Email already exists</h3>";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}
else{
    $reg = "insert into table2(name,password,age,post,salary,email) values ('$name','$pass',20,'unassigned',20000,'$email')";
    mysqli_query($con,$reg);
    echo "<h3 style='font-family:Segoe UI;'>Registration successful</h3><h4 style='font-family:Segoe UI;'>Login again!</h4>";
    echo "<script>setTimeout(\"location.href = 'login.html';\",1500);</script>";
}

?>
