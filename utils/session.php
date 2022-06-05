<?php
    $content = '';
    if (!isset($_SESSION["staffID"])) {
        header("location: index.php");
        echo '<script>alert("session expired")</script>';
        $content = 'include("logged-out");';
    }
?>