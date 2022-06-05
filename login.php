<?php
session_start();
include("utils/connection.php");

if (isset($_POST['login'])) {
    $staffID    = $_POST['staffID'];
    $password = $_POST['password'];

    $loginsql = "SELECT * FROM staff WHERE StaffID='$staffID' AND Password='$password'";
    $result = mysqli_query($conn, $loginsql);
    $login = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $match = mysqli_num_rows($result);

    if ($match > 0) {
        $_SESSION["staffID"] = $staffID;
        header("location: index.php");
    } else {
        header("location: index.php");
    }
}

mysqli_close($conn);
?>