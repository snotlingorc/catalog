<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../dbfunc/ownerassociation.php');
if(strlen($_SESSION['alogin'])==0) {   
    header('location:../adminlogin.php');
} else { 
    if(isset($_GET['del'])) {
        $id=$_GET['del'];
        $sid=$_GET['sid'];
        delOwnerAssociation($id);
        $_SESSION['delmsg']="Owner deleted scuccessfully ";
        header('location:stuffEdit.php?id='.$sid);
    }
}
?>
