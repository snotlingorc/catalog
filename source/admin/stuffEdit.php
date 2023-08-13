<?php
session_start();
error_reporting(1);
include('../includes/config.php');
include('../dbfunc/stuff.php');
include('../dbfunc/category.php');
include('../dbfunc/author.php');
include('../dbfunc/condition.php');
include('../dbfunc/status.php');
include('../dbfunc/owner.php');
include('../dbfunc/image.php');

if(strlen($_SESSION['alogin'])==0) {   
    header('location:../adminlogin.php');
} else { 
    if(isset($_POST['update'])) {
        $id=intval($_GET['id']);
        $title=$_POST['stuff'];
        $catID=intval($_POST['CatId']);
        $AuthorID=intval($_POST['AuthorId']);
        $ConditionID=intval($_POST['ConditionId']);
        $StatusID=intval($_POST['StatusId']);
        $OwnerID=intval($_POST['OwnerId']);
        $Description=$_POST['Description'];

        updateStuff($id, $title, $catID, $AuthorID, $ConditionID, $StatusID, $OwnerID, $Description);    
        $_SESSION['updatemsg']="Stuff updated successfully";
        header('location:stuffManage.php'); 
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Catalog | Edit Catalog Item</title>
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
                <h4 class="header-line">Edit Item</h4>
                
                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Catalog Info
</div>
 
<div class="panel-body">
<form role="form" method="post">
<?php 
$id = intval($_GET['id']);
$results = getStuff($id);

//if($query->rowCount() > 0)
//{
foreach($results as $result)
{       
  ?> 
<div class="form-group">
<label>Title/Name</label>
<input class="form-control" type="text" name="stuff" value="<?php echo htmlentities($result->Title);?>" maxlength="250" required />
</div>
<div class="form-group">
<label>Category</label>
<select name="CatId" id="CatId">
<?php 
 $CategoryResults=getAllCategory();
 foreach($CategoryResults as $CategoryResult) {
    if ($CategoryResult->id == $result->CatId) {
        echo "<option Value=\"" . htmlentities($CategoryResult->id) . "\" Selected>" . htmlentities($CategoryResult->Name) . "</option>\n";
    } else {
        echo "<option Value=\"" . htmlentities($CategoryResult->id) . "\">" . htmlentities($CategoryResult->Name) . "</option>\n";
    }
}
?>
</select>
</div>
<div class="form-group">
<label>Author</label>
<select name="AuthorId" id="AuthorId">
<?php 
 $AuthorResults=getAllAuthor();
 foreach($AuthorResults as $AuthorResult) {
    if ($AuthorResult->id == $result->AuthorId) {
        echo "<option Value=\"" . htmlentities($AuthorResult->id) . "\" Selected>" . htmlentities($AuthorResult->Name) . "</option>\n";
    } else {
        echo "<option Value=\"" . htmlentities($AuthorResult->id) . "\">" . htmlentities($AuthorResult->Name) . "</option>\n";
    }
 }
?>
</select>
</div>
<div class="form-group">
<label>Condition</label>
<select name="ConditionId" id="ConditionId">
<?php 
 $ConditionResults=getAllCondition();
 foreach($ConditionResults as $ConditionResult) {
    if ($ConditionResult->id == $result->ConditionId) {
        echo "<option Value=\"" . htmlentities($ConditionResult->id) . "\" Selected>" . htmlentities($ConditionResult->Name) . "</option>\n";
    } else {
        echo "<option Value=\"" . htmlentities($ConditionResult->id) . "\">" . htmlentities($ConditionResult->Name) . "</option>\n";
    }
 }
?>
</select>
</div>
<div class="form-group">
<label>status</label>
<select name="StatusId" id="StatusId">
<?php 
 $StatusResults=getAllStatus();
 foreach($StatusResults as $StatusResult) {
    if ($StatusResult->id == $result->StatusId) {
        echo "<option Value=\"" . htmlentities($StatusResult->id) . "\" Selected>" . htmlentities($StatusResult->Name) . "</option>\n";
    } else {
        echo "<option Value=\"" . htmlentities($StatusResult->id) . "\">" . htmlentities($StatusResult->Name) . "</option>\n";
    }
 }
?>
</select>
</div>
<div class="form-group">
<label>Owner</label>
<select name="OwnerId" id="OwnerId">
<?php 
 $OwnerResults=getAllOwner();
 foreach($OwnerResults as $OwnerResult) {
    if ($OwnerResult->id == $result->OwenerId) {
        echo "<option Value=\"" . htmlentities($OwnerResult->id) . "\" Selected>" . htmlentities($OwnerResult->Name) . "</option>\n";
    } else {
        echo "<option Value=\"" . htmlentities($OwnerResult->id) . "\">" . htmlentities($OwnerResult->Name) . "</option>\n";
    }
 }
?>
</select>
</div>

<div class="form-group">
<label>Description</label>
<input class="form-control" type="text" name="Description" value="<?php echo htmlentities($result->Description);?>" maxlength="5000" required />
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

<!-- Image Section -->
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
<a href="image.php?id=<?php echo htmlentities($id);?>"><button class="btn btn-primary"><i class="fa fa-image "></i>Add Image</button></a> Click on Image to remove.
</div>
<div class="panel-body">
<?php $results = getAllImagesByStuff($id); foreach ($results as $result) {  ?>
    <a href=imageManage.php?del=<?php echo intval($result->id);?>&id=<?php echo $id;?>><img src=/catalog/imageView.php?id=<?php echo intval($result->id); ?>></a>
<?php } ?>
</div>
</div>
</div>
</div>


<!-- End Image Section -->





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