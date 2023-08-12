<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getStatusCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `status`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllStatus() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `status`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getStatus(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name FROM `status` WHERE id=$id;";
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

function getStatusValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `status` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newStatus(String $name) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `status` ( `Name`, `creationDate`, `UpdateDate`) VALUES (:name, '$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
    return $pdo->lastInsertId();
}

function delStatus(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `status` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updateStatus(int $id, string $name) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `status` SET Name=:name, UpdateDate='$updateDate' WHERE id =$id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(':sid',$sid,PDO::PARAM_STR);
    $query->bindParam(":name", $name);
    $query->execute();
}

//echo getAllStatus();
//echo "<br>running getstatus with 1 <br>";
//echo getStatus(1);
//echo "<br> getting row 3 <br>";
//echo getStatus(3);
//echo "<br> Setting new row 3 to foo <br>";
//$foo = "foo";
//echo newStatus($foo);
//echo "<br> getting row 3 <br>";
//echo getStatus(3);
//echo "<br> Update 3 from foo to bar <br>";
//updateStatus(3, "bar");
//echo getStatus(3);
//echo "<br> Removing 3 <br>";
//delStatus(3);
//echo getStatus(3);
?>