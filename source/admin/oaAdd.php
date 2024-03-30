<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../dbfunc/stuff.php');
include('../dbfunc/category.php');
include('../dbfunc/author.php');
include('../dbfunc/publisher.php');
include('../dbfunc/condition.php');
include('../dbfunc/status.php');
include('../dbfunc/format.php');
include('../dbfunc/owner.php');
include('../dbfunc/ownerassociation.php');

if(strlen($_SESSION['alogin'])==0) {   
    header('location:../adminlogin.php');
} else { 
    if(isset($_POST['create'])) {
        $stuffID=intval($_GET['id']);
        $ownerID=intval($_POST['OwnerId']);
        $formatID=intval($_POST['FormatId']);
        $statusID=intval($_POST['StatusId']);
        $conditionID=intval($_POST['ConditionId']);
        $price=floatval($_POST['Price']);

        //echo var_dump($_GET);
        //echo var_dump($_POST);

        $lastInsertId = newOwnerAssociation($stuffID, $ownerID, $formatID, $statusID, $conditionID, $price);
        if($lastInsertId) {
            $_SESSION['msg']="Association Listed successfully";
            header('location:stuffEdit.php?id='.$stuffID);
        } else {
            $_SESSION['error']="Something went wrong. Please try again";
            header('location:stuffEdit.php?id='.$stuffID);
        } 

    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Catalog | Add Catalog Item</title>
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
    <div class="content-wraper">
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add an Owner to the Catalog Item</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Owner Association Info
</div>
<div class="panel-body">
<form role="form" method="post">

<div class="form-group">
<label>Owner</label>
<select name="OwnerId" id="OwnerId">
<?php 
 $results=getAllOwner();
 foreach($results as $result) {
    echo "<option Value=\"" . htmlentities($result->id) . "\">" . htmlentities($result->Name) . "</option>\n";
 }
?>
</select>
</div>

<div class="form-group">
<label>Status</label>
<select name="StatusId" id="StatusId">
<?php 
 $results=getAllStatus();
 foreach($results as $result) {
    echo "<option Value=\"" . htmlentities($result->id) . "\">" . htmlentities($result->Name) . "</option>\n";
 }
?>
</select>
</div>

<div class="form-group">
<label>Condition</label>
<select name="ConditionId" id="ConditionId">
<?php 
 $results=getAllCondition();
 foreach($results as $result) {
    echo "<option Value=\"" . htmlentities($result->id) . "\">" . htmlentities($result->Name) . "</option>\n";
 }
?>
</select>
</div>

<div class="form-group">
<label>Format</label>
<select name="FormatId" id="FormatId">
<?php 
 $results=getAllFormat();
 foreach($results as $result) {
    echo "<option Value=\"" . htmlentities($result->id) . "\">" . htmlentities($result->Name) . "</option>\n";
 }
?>
</select>
</div>


<div class="form-group">
<label>Price</label>
<input class="form-control" type="text" name="Price" autocomplete="off" maxlength="250" required />
</div>


</label>
</div>
</div>
<button type="submit" name="create" class="btn btn-info">Create </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
   
    </div>
    </div>
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