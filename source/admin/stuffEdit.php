<?php
session_start();
error_reporting(0);
include('../includes/config.php');
include('../dbfunc/stuff.php');
include('../dbfunc/category.php');
include('../dbfunc/author.php');
include('../dbfunc/publisher.php');
include('../dbfunc/owner.php');
include('../dbfunc/status.php');
include('../dbfunc/condition.php');
include('../dbfunc/format.php');
include('../dbfunc/ownerassociation.php');
include('../dbfunc/image.php');

if(strlen($_SESSION['alogin'])==0) {   
    header('location:../adminlogin.php');
} else { 
    if(isset($_POST['update'])) {
        $id=intval($_GET['id']);
        $title=$_POST['stuff'];
        $catID=intval($_POST['CatId']);
        $AuthorID=intval($_POST['AuthorId']);
        $PublisherID=intval($_POST['{PublisherId']);
        $Description=$_POST['Description'];
        $ISBN=$_POST['ISBN'];
        $Date=$_POST['Date'];
        if($Date=="") {
            $Date = "0000-00-00";
        }

        updateStuff($id, $title, $catID, $AuthorID, $PublisherID, $ISBN, $Date, $Description);    
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
<label>Publisher</label>
<select name="PublisherId" id="PublisherId">
<?php 
 $PublisherResults=getAllPublisher();
 foreach($PublisherResults as $PublisherResult) {
    if ($PublisherResult->id == $result->PublisherId) {
        echo "<option Value=\"" . htmlentities($PublisherResult->id) . "\" Selected>" . htmlentities($PublisherResult->Name) . "</option>\n";
    } else {
        echo "<option Value=\"" . htmlentities($PublisherResult->id) . "\">" . htmlentities($PublisherResult->Name) . "</option>\n";
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
<label>ISBN</label>
<input class="form-control" type="text" name="ISBN" value="<?php echo htmlentities($result->ISBN);?>" maxlength="50" />
</div>

<div class="form-group">
<label>Publish Date</label>
<input class="form-control" type="text" name="Date" value="<?php echo htmlentities($result->Date);?>" maxlength="50" />
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

    <!-- Owner Section -->
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
<a href="oaAdd.php?id=<?php echo htmlentities($id);?>"><button class="btn btn-primary"><i class="fa fa-image "></i>Add Owner</button></a>
</div>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr><th>ID</th><th>Owner</th><th>Status</th><th>Condition</th><th>Format</th><th>Cost</th></tr>
            </thead>
            <tbody>
<?php $results = getOwnerAssociationByStuff($id);  foreach ($results as $result) {  ?>
    <tr>
        <td><a href="oaManage.php?del=<?php echo htmlentities($result->id)?>&sid=<?php echo htmlentities($id);?>" onclick="return confirm('Are you sure you want to delete?');"" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button></td>
        <td><?php echo htmlentities(getOwner($result->ownerid)); ?></td>
        <td><?php echo htmlentities(getStatus($result->statusid)); ?></td>
        <td><?php echo htmlentities(getCondition($result->conditionid)); ?></td>
        <td><?php echo htmlentities(getFormat($result->formatid));?> </td>
        <td><?php echo htmlentities($result->price);?> </td>

    </tr>  
<?php } ?>
            </tbody>
        </table>
    </div>
</div>

</div>
</div>
</div>


<!-- End Owner Section -->

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