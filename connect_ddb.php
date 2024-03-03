<?php
// echo "connecting to database";
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

$con = mysqli_connect($host, $username, $password, $dbname);

// var_dump($con);

if (!$con) {
    die("Could not connect: " . mysqli_connect_errno());
// } else {
//     echo "Connection established";
}
?>
