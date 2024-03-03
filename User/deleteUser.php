<?php
$id = $_GET['id'];
include_once "../connect_ddb.php";
$sql = "DELETE FROM users WHERE id = $id";
if (mysqli_query($con, $sql)) {
    header("location:showUser.php?message=DeleteSuccess");
} else {
    header("location:showUser.php?message=DeleteFailure");
}
