<?php
    if (!isset($_SESSION["staffID"])) {
        $_SESSION['illegal-access'] = 'Restricted Access. If you are a staff, log-in first!';
        header("location: index.php");
    }
?>