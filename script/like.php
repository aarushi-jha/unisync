<?php 
session_start();
include("../includes/connection.php");

$sql = "SELECT * FROM college_like where post_id='".$_POST['id']."' AND user_id='".$_SESSION['id']."'";
if ($res = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($res) > 0) {
       $delq = "DELETE from college_like where post_id='".$_POST['id']."' AND user_id='".$_SESSION['id']."'";
       mysqli_query($link, $delq);
       echo json_encode(array('status'=>'true','message'=>'0'));
    } else {
        $sqlinsert = "INSERT INTO college_like (post_id,user_id) VALUES ('".$_POST['id']."', '".$_SESSION['id']."')";
        if(mysqli_query($link, $sqlinsert)){
            echo json_encode(array('status'=>'true','message'=>'1'));
        } else{
            echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
        }
    }
}


?>