<?php 
session_start();
include("../includes/connection.php");
$sqlinsert = "Update college_connection SET status=1 where id = '".$_POST['id']."'";
if(mysqli_query($link, $sqlinsert)){
    echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"dashboard.php"));
} else{
    echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
}
?>