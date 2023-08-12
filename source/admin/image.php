<?php
session_start();
error_reporting(1);
include('../includes/config.php');
include('../dbfunc/image.php');


//resize image but maintain aspect ratio
function fn_resize($image_resource_id, $origWidth, $origHeight)
{
    // Desired max height or width
    $maxWidth = 200;
    $maxHeight = 200;

    $widthRatio = $maxWidth / $origWidth;
    $heightRatio = $maxHeight / $origHeight;
    // Ratio used for calculating new image dimensions.
    $ratio = min($widthRatio, $heightRatio);
    // Calculate new image dimensions.
    $newWidth  = (int)$origWidth  * $ratio;
    $newHeight = (int)$origHeight * $ratio;

    $target_layer = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($target_layer, $image_resource_id, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
    return $target_layer;
}


if(strlen($_SESSION['alogin'])==0) {   
    header('location:index.php');
} else { 
    if(isset($_POST['create'])) {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
                $imgData = file_get_contents($_FILES['userImage']['tmp_name']);

                $file = $_FILES['userImage']['tmp_name'];
                $source_properties = getimagesize($file);
                $image_type = $source_properties[2];
                if ($image_type == IMAGETYPE_JPEG) {
                    $image_resource_id = imagecreatefromjpeg($file);
                    $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                    ob_start();
                    imagejpeg($target_layer);
                    $imgData = ob_get_contents();
                    ob_end_clean();
                } elseif ($image_type == IMAGETYPE_GIF) {
                    $image_resource_id = imagecreatefromgif($file);
                    $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                    ob_start();
                    imagegif($target_layer);
                    $imgData = ob_get_contents();
                    ob_end_clean();
                } elseif ($image_type == IMAGETYPE_PNG) {
                    $image_resource_id = imagecreatefrompng($file);
                    $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                    ob_start();
                    imagepng($target_layer);
                    $imgData = ob_get_contents();
                    ob_end_clean();
                }
            }
        }
        $id=intval($_GET['id']);
        $imgType = $_FILES['userImage']['type'];

        newImage($id, $imgType, $imgData);
        $_SESSION['updatemsg']="Image added successfully";
        header('location:stuffEdit.php?id='.$id);
    }  else if (isset($_POST['url'])) {
            $imgType = exif_imagetype($_POST['url']);
            $source_properties = getimagesize($_POST['url']);

            if ($imgType == "2") { //IMAGETYPE_JPEG
                $image_resource_id = imagecreatefromjpeg($_POST['url']);
                $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                ob_start();
                imagejpeg($target_layer);
                $imgData = ob_get_contents();
                ob_end_clean();
            } elseif ($imgType == "1") { // IMAGETYPE_GIF
                $image_resource_id = imagecreatefromgif($_POST['url']);
                $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                ob_start();
                imagegif($target_layer);
                $imgData = ob_get_contents();
                ob_end_clean();
            } elseif ($imgType == "3") { //IMAGETYPE_PNG
                $image_resource_id = imagecreatefrompng($_POST['url']);
                $target_layer = fn_resize($image_resource_id, $source_properties[0], $source_properties[1]);
                ob_start();
                imagepng($target_layer);
                $imgData = ob_get_contents();
                ob_end_clean();
            }
        $id=intval($_GET['id']);

        newImage($id, $source_properties[mime], $imgData);
        $_SESSION['updatemsg']="Image added successfully";
        header('location:stuffEdit.php?id='.$id);

    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Catalog | Add Image</title>
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
                <h4 class="header-line">Image System</h4>
                
                            </div>   
<table> <tr> <td>

    <form name="frmImage" enctype="multipart/form-data" action=""
        method="post">
        <div class="phppot-container tile-container">
            <label>Upload Image File:</label>
            <div class="row">
                <input name="userImage" type="file" class="full-width" />
            </div>
            <div class="row">
                <input type="submit" name="create" value="Submit" />
            </div>
        </div>
    </form>
</td>
</tr>
</table>
</div>

<div>
<form name="frmImage" action="" method="post">
        <div class="phppot-container tile-container">
            <label>Image URL:</label>
            <div class="row">
                <input class="form-control" type="text" name="url" autocomplete="off" required />
            </div>
            <div class="row">
                <input type="submit" name=byurl" value="Submit" />
            </div>
        </div>
    </form>
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