<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getTagCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `tags`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllTag() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `tags`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getTag(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name  FROM `tags` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getTagValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `tags` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newTag(String $name) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `tags` ( `Name`, `CreationDate`, `UpdateDate`) VALUES (:name, '$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
    return $pdo->lastInsertId();
}

function delTag(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `tags` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updateTag(int $id, string $name) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `tags` SET Name=':name, UpdateDate='$updateDate' WHERE id =$id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
}

//echo getAllTag();
//echo "<br>running gettags with 1 <br>";
//echo getTag(1);
//echo "<br> getting row 10 <br>";
//echo getTag(10);
//echo "<br> Setting new row 10 to foo <br>";
//$foo = "foo";
//echo newTag($foo);
//echo "<br> getting row 10 <br>";
//echo getTag(10);
//echo "<br> Update 10 from foo to bar <br>";
//updateTag(10, "bar");
//echo getTag(10);
//echo "<br> Removing 10 <br>";
//delTag(10);
//echo getTag(10);
?>