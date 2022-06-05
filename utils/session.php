<?php
    if (!isset($_SESSION["staffID"])) {
        header("location: index.php");
    }
?>