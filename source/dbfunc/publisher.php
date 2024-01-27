<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getPublisherCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `publishers`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllPublisher() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `publishers`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getPublisher(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name FROM `publishers` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) {
        foreach($results as $result) {
            $value = htmlentities($result->Name);
        }
    } 
    return $value;
}

function getPublisherValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `publishers` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newPublisher(String $name, String $URL) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `publishers` ( `Name`, `URL`,`creationDate`, `UpdateDate`) VALUES (:name, :url,'$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":url", $URL);
    $query->bindParam(":name", $name);
    $query->execute();
    return $pdo->lastInsertId();
}

function delPublisher(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `publishers` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updatePublisher(int $id, string $name, string $URL) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `publishers` SET Name=:name, URL=:url, UpdateDate='$updateDate' WHERE id =$id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":url", $URL);
    $query->bindParam(":name", $name);
    $query->execute();
}

//echo getAllPublishers();
//echo "<br>running getpublishers with 1 <br>";
//echo getPublisher(1);
//echo "<br> getting row 4 <br>";
//echo getPublisher(4);
//echo "<br> Setting new row 4 to foo <br>";
//$foo = "foo";
//$URL = "https://foo.bar";
//echo newPublisher($foo, $URL);
//echo "<br> getting row 4 <br>";
//echo getPublisher(4);
//echo "<br> Update 4 from foo to bar <br>";
//updatePublisher(4, "bar", $URL);
//echo getPublisher(4);
//echo "<br> Removing 4 <br>";
//delPublisher(4);
//echo getPublisher(4);
?>