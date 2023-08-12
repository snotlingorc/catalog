<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getOwnerCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `owner`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllOwner() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `owner`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getOwner(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name FROM `owner` WHERE id=$id;";
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

function getOwnerValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `owner` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newOwner(String $name) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `owner` ( `Name`, `RegDate`, `UpdateDate`) VALUES (:name, '$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
    return $pdo->lastInsertId();
}

function delOwner(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `owner` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updateOwner(int $id, string $name) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `owner` SET Name=:name, UpdateDate='$updateDate' WHERE id =$id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
}

//echo getAllOwner();
//echo "<br>running gettags with 1 <br>";
//echo getOwner(1);
//echo "<br> getting row 2 <br>";
//echo getOwner(2);
//echo "<br> Setting new row 2 to foo <br>";
//$foo = "foo";
//echo newOwner($foo);
//echo "<br> getting row 2 <br>";
//echo getOwner(2);
//echo "<br> Update 2 from foo to bar <br>";
//updateOwner(2, "bar");
//echo getOwner(2);
//echo "<br> Removing 2 <br>";
//delOwner(2);
//echo getOwner(2);
?>