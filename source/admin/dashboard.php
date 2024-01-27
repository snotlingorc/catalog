<?php
session_start();
error_reporting(1);
include('includes/config.php');
include('../dbfunc/stuff.php');
include('../dbfunc/category.php');
include('../dbfunc/author.php');
include('../dbfunc/publisher.php');
include('../dbfunc/condition.php');
include('../dbfunc/format.php');
include('../dbfunc/status.php');
include('../dbfunc/tags.php');
include('../dbfunc/owner.php');


if(strlen($_SESSION['alogin'])==0)
  { 
header('location:../adminlogin.php');
}
else{?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Catalog | Admin Dashboard</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('header.php');?>
<!-- MENU SECTION END-->

A little bit about our current catalog:
<ul>
<li> Number of objects : <?php echo getStuffCount(); ?> </li>
<li> Number of Categories : <?php echo getCategoryCount(); ?> </li>
<li> Number of Publishers : <?php echo getPublisherCount(); ?> </li>
<li> Number of Authors : <?php echo getAuthorCount(); ?> </li>
<li> Number of Conditions : <?php echo getConditionCount(); ?> </li>
<li> Number of Formats : <?php echo getFormatCount(); ?> </li>
<li> Number of Status : <?php echo getStatusCount(); ?> </li>
<li> Number of tags : <?php echo getTagCount(); ?> </li>
<li> Number of Owners : <?php echo getOwnerCount(); ?> </li>
</ul>

    <p>
Tag Cloud? 


     <!-- CONTENT-WRAPPER SECTION END-->
     <?php include('../includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="../assets/js/custom.js"></script>
</body>
</html>
<?php } ?>