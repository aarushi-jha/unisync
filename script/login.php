<?php 
session_start();
include("../includes/connection.php");
$sql = "SELECT * FROM college_users where email='".$_POST['email']."' AND password='".$_POST['password']."'";
if ($res = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['type'] = $row['type'];
        echo json_encode(array('status'=>'true','message'=>'Success','reload'=>'dashboard.php'));
    } else {
        echo json_encode(array('status'=>'false','message'=>'Username And Password Not Match'));
    }
}


?>