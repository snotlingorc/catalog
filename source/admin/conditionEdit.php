<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../dbfunc/condition.php');
if(strlen($_SESSION['alogin'])==0) {   
    header('location:../adminlogin.php');
} else { 
    if(isset($_POST['update'])) {
        $name=$_POST['condition'];
        $catid=intval($_GET['catid']);
        updateCondition($catid, $name);
        $_SESSION['updatemsg']="Condition updated successfully";
        header('location:conditionManage.php');
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Catalog | Edit Conditions</title>
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
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Conditions</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Condition Info
</div>
 
<div class="panel-body">
<form role="form" method="post">
<?php 
$catid = intval($_GET['catid']);
$results = getConditionValues($catid);

//if($query->rowCount() > 0)
//{
foreach($results as $result)
{       
  ?> 
<div class="form-group">
<label>Name</label>
<input class="form-control" type="text" name="condition" value="<?php echo htmlentities($result->Name);?>" maxlength="150" required />
</div>
<?php }//} ?>
<button type="submit" name="update" class="btn btn-info">Update </button>

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