<?php 
include("../includes/connection.php");
$sqlinsert = "INSERT INTO college_users (name,email,password,org,type) VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['password']."','".$_POST['org']."','".$_POST['type']."')";

$sql = "SELECT * FROM college_users where email='".$_POST['email']."'";
if ($res = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($res) > 0) {
        echo json_encode(array('status'=>'false','message'=>'Email Already Exists'));
    } else {
        if(mysqli_query($link, $sqlinsert)){
            echo json_encode(array('status'=>'true','message'=>'Success','reload'=>"index.php"));
        } else{
            echo json_encode(array('status'=>'false','message'=>'Same Technical Issue Please Try Again'));
        }
    }
}


?>