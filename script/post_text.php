<?php 
session_start();
include("../includes/connection.php");
$sqlinsert = "INSERT INTO college_post (user_id,text_post) VALUES ('".$_SESSION['id']."', '".$_POST['message']."')";
if(mysqli_query($link, $sqlinsert)){
    echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"dashboard.php"));
} else{
    echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
}
?>