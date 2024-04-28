<?php 
session_start();
include("../includes/connection.php");
$sqlinsert = "INSERT INTO college_connection (user_id1,user_id2) VALUES ('".$_SESSION['id']."', '".$_POST['id']."')";
if(mysqli_query($link, $sqlinsert)){
    echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"dashboard.php"));
} else{
    echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
}
?>