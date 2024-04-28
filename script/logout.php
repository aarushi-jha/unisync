<?php 
session_start();
unset($_SESSION['id']);
unset($_SESSION['type']);
unset($_SESSION['name']);
header('Location:../index.php');    
?>