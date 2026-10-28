<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");


function newImage(int $id, String $imgType, String $imgData) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "INSERT INTO image (`imageType`, `imageData`, `stuffid`) VALUES(:imgType, :imgData, :stuffid)";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":imgType", $imgType);
    $query->bindParam(":imgData", $imgData);
    $query->bindParam(":stuffid", $id);
    $query->execute();
    return $pdo->lastInsertId();
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
    $stmt = "SELECT * FROM `image` WHERE stuffid=$id LIMIT 1;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getFirstImageIDByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `image` WHERE stuffid=$id LIMIT 1;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach($results as $result) {
            $value = (string)($result->id);
        }
    } 
    return $value;
}

function getAllImagesByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `image` WHERE stuffid=$id;";
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

function delImageByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `image` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

// TODO update image
//

//echo "<br>Running getImage with 3 <br>";
//echo getImage(3);
//echo "<br>Running getFirstImageIDByStuff with 3 <br>";
//echo getFirstImageIDByStuff(3);
