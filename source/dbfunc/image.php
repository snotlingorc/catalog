<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function newImage(int $id, String $imgType, String $imgData) {
    // TODO figure out why this cannot be in the same format as the other DB calls
   // include(__DIR__ . '/../includes/config.php');

    $conn = mysqli_connect("localhost", "catalog", "541SEwAKZ3k7sxc3", "catalog");

    $sql = "INSERT INTO image(imageType ,imageData, stuffId) VALUES(?, ?, $id)";
    $pdo = $conn->prepare($sql);
    $pdo->bind_param('ss', $imgType, $imgData);
    //$current_id = $statement->execute() or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_connect_error());
    $pdo->execute();
}

function getImage(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `image` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getFirstImageByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `image` WHERE stuffId=$id LIMIT 1;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getFirstImageIDByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `image` WHERE stuffId=$id LIMIT 1;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        foreach($results as $result) {
            $value = htmlentities($result->id);
        }
    } 
    return $value;
}

function getAllImagesByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `image` WHERE stuffId=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function delImage(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `image` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

// TODO update image
