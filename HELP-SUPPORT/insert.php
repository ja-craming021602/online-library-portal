<?php

$conn =  new mysqli ("localhost","root","","onlinelibraryportal");

if(isset($_POST['info'] )){
     $fb_type = $_POST['feedback_type'];
     $feedback= $_POST['feedback'];
     $firstname = $_POST['firstname'];
     $lastname = $_POST['lastname'];
     $email = $_POST['email'];

     $query = "INSERT INTO feedback_db (feedback_type, feedback , firstname, lastname, email ) VALUES ( '$fb_type','$feedback','$firstname','$lastname','$email')";
     $query_run =  mysqli_query($conn ,$query);
    
     if($query_run)
     {
         $SESSION ['status'] = "Inserted Successfully";
         header("location: faqindex.php");
     }
     else{
         $_SESSION['status'] = "Inserted Successfully";
         header("location:faqindex.php"); 
     }



}







?>