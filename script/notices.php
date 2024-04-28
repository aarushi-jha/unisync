<?php 
session_start();
include("../includes/connection.php");
$sqlinsert = "INSERT INTO notice_board VALUES ('".$_SESSION['id']."', '".$_POST['message']."','NOW()')";
if(mysqli_query($link, $sqlinsert)){
    echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"dashboard.php"));
} else{
    echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
}
?>