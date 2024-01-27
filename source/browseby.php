<?php
session_start();
error_reporting(1);

include('dbfunc/image.php');
include('includes/config.php');
include('dbfunc/stuff.php');
include('dbfunc/category.php');
include('dbfunc/condition.php');
include('dbfunc/format.php');
include('dbfunc/author.php');
include('dbfunc/publisher.php');
include('dbfunc/status.php');
include('dbfunc/owner.php');

include('dbfunc/tags.php');

if (isset($_GET['id'])) {
    switch ($_GET['type']) {
        case "author":
            $getAllFunction = "getAllStuffByAuthor";
            $getFunction = "getAuthor";
            break;
        case "publisher":
            $getAllFunction = "getAllStuffByPublisher";
            $getFunction = "getPublisher";
            break;
        case "category":
            $getAllFunction = "getAllStuffByCategory";
            $getFunction = "getCategory";
            break;
        case "condition":
            $getAllFunction = "getAllStuffByCondition";
            $getFunction = "getCondition";
            break;
        case "status":
            $getAllFunction = "getAllStuffByStatus";
            $getFunction = "getStatus";
            break;
        case "owner":
            $getAllFunction = "getAllStuffByOwner";
            $getFunction = "getOwner";
            break;
    }
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
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
            <b>Browse by <?php echo $_GET['type']; ?> : <?php echo $getFunction($_GET['id']); ?> </b>
            </div>
    
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <tr>
                    <?php $count=1; $results = $getAllFunction($_GET['id']); foreach ($results as $result) { ?>
                        <td width=200><table><tr><td>
                        <a href=stuffView.php?id=<?php echo htmlentities($result->id);?>><img src="/catalog/imageView.php?id=<?php echo getFirstImageIDByStuff($result->id);?>"></a>
                    </td></tr><tr><td>
                        <a href=stuffView.php?id=<?php echo htmlentities($result->id);?>><?php echo htmlentities($result->Title);?></a>
                    </td></tr></table>
                        </td>

                        <?php if ($count % 5 != 0) {} else { echo "</tr><tr>";}  $count++; } ?>
                    </tr>


                     </table>
                 </div>
            </div>
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