<?php
include('dbfunc/image.php');

if (isset($_GET['id'])) {
    //$results = getFirstImageByStuff($_GET['id']);
    $results = getImage(intval($_GET['id']));

    foreach($results as $result) {       
        header("Content-type: " . $result->imageType);
        echo $result->imageData;
    }
}
?>