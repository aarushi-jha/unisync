<?php 
session_start();
include("../includes/connection.php");
$sqlinsert = "UPDATE  college_users SET password = '".$_POST['password']."' where id = '".$_SESSION['id']."'";

if(mysqli_query($link, $sqlinsert)){
    echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"profile.php"));
} else{
    echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
}


?>