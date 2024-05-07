<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "mini_project";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName,3307);
if(!$conn){
    die("Something went wrong.");
}
?>