<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../dbfunc/image.php');
if(strlen($_SESSION['alogin'])==0) {   
    header('location:../adminlogin.php');
} else { 
    if(isset($_GET['del'])) {
        $id=$_GET['del'];
        delImage($id);
        $_SESSION['delmsg']="Status deleted scuccessfully ";
        header('location:stuffEdit.php?id='.$_GET['id']);
    }

  
}
?>