<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('dbfunc/stuff.php');
include('dbfunc/category.php');
include('dbfunc/author.php');
include('dbfunc/condition.php');
include('dbfunc/status.php');
include('dbfunc/owner.php');
include('dbfunc/image.php');

include('dbfunc/tags.php');

if (isset($_GET['id'])) {

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Catalog | User DashBoard</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
    <!-- MENU SECTION END-->
<div>
<?php include('includes/selectMenu.php');?>
<?php $results = getStuff($_GET['id']); foreach ($results as $result) { ?>

    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
        <b><?php echo htmlentities($result->Title);?> </b>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr><td width=200>
                    <img src=/catalog/imageView.php?id=<?php echo $_GET['id']; ?>>
    </td>
    <td>
                    <b>Author:</b>    <a href=browseby.php?type=author&id=<?php echo $result->AuthorId;?>><?php echo htmlentities(getAuthor($result->AuthorId));?></a> <br>
                    <b>Category:</b>  <a href=browseby.php?type=category&id=<?php echo $result->CatId;?>><?php echo htmlentities(getCategory($result->CatId));?></a> <br>
                    <b>Condition:</b> <a href=browseby.php?type=condition&id=<?php echo $result->ConditionId;?>><?php echo htmlentities(getCondition($result->ConditionId));?></a> <br>
                    <b>Status:</b>    <a href=browseby.php?type=status&id=<?php echo $result->StatusId;?>><?php echo htmlentities(getStatus($result->StatusId));?></a> <br>
                    <p>
                    <b>Owner(s):</b>  <a href=browseby.php?type=owner&id=<?php echo $result->OwnerId;?>><?php echo htmlentities(getOwner($result->OwnerId));?></a> <br>
    </td></tr>
    <tr><td colspan=2>
                    <?php echo htmlentities($result->Description);?>
    </td>
</tr></table>
            </div>
        </div>
        <?php  } ?>
    </div>
</div>

     <!-- CONTENT-WRAPPER SECTION END-->
<?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>