<?php 
session_start();
include("../includes/connection.php");
$filename = $_FILES["image"]["name"];
$tempname = $_FILES["image"]["tmp_name"];    
$folder = "../image/".$filename;
move_uploaded_file($tempname, $folder);
$sqlinsert = "INSERT INTO college_post (user_id,img_post) VALUES ('".$_SESSION['id']."', '".$filename."')";
if(mysqli_query($link, $sqlinsert)){
    echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"dashboard.php"));
} else{
    echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
}
?>