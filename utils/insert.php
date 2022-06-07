<?php

include('connection.php');

if(isset($_POST['info'] )){
    $fb_type = $_POST['feedback_type'];
    $feedback= $_POST['feedback'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $query = "INSERT INTO feedback_db (feedback_type, feedback , firstname, lastname, email ) VALUES ( '$fb_type','$feedback','$firstname','$lastname','$email')";
    mysqli_query($conn ,$query);

}

mysqli_close($conn);
header('Location: ../help-support.php');

?>