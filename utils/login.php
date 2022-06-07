<?php
session_start();
include("utils/connection.php");

if (isset($_SESSION['illegal-access'])) {
    $message = $_SESSION['illegal-access'];
    unset($_SESSION['illegal-access']);
    echo "<script>alert('$message')</script>";
}

if (isset($_POST['login'])) {
    $staffID    = $_POST['staffID'];
    $password = $_POST['password'];

    $loginsql = "SELECT * FROM staff WHERE StaffID='$staffID' AND Password='$password'";
    $result = mysqli_query($conn, $loginsql);
    $login = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $match = mysqli_num_rows($result);

    if ($match > 0) {
        $_SESSION["staffID"] = $staffID;
    } else {
        echo "<script>alert('Invalid credentials.')</script>";
    }
}

// behavior if logged in
if (isset($_SESSION['staffID'])) {

    if(isset($_POST['dashboard'])) {
        header('Location: dashboard.php');
    } elseif(isset($_POST['logout'])) {
        header('Location: utils/logout.php');
    }
    
    $staff_id = $_SESSION['staffID'];
    $query = 'SELECT FirstName, LastName FROM staff WHERE StaffID='.mysqli_real_escape_string($conn, $staff_id);
    $result = mysqli_query($conn, $query);
    $staff_name = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
}

mysqli_close($conn);
?>