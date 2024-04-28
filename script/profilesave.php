<?php 
session_start();
include("../includes/connection.php");
$sqlinsert = "UPDATE  college_users SET name = '".$_POST['name']."',mobile='".$_POST['mobile']."' , email = '".$_POST['email']."',org ='".$_POST['org']."'  where id = '".$_SESSION['id']."'";

if(mysqli_query($link, $sqlinsert)){
    echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"profile.php"));
} else{
    echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
}


?>