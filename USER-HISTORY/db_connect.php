<?php
$server_name='localhost';
$user_name='root';
$password='';
$database_name='onlinelibraryportal';

$conn=new mysqli($server_name,$user_name,$password,$database_name);
if($conn->connect_error){
	die("Error in db connection".$conn->connect_error);
}
?>
