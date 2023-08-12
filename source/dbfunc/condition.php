<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getConditionCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `condition`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllCondition() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `condition`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getCondition(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name FROM `condition` WHERE id=$id;";
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

function getConditionValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `condition` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newCondition(String $name) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `condition` ( `Name`, `creationDate`, `UpdateDate`) VALUES (:name, '$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
    return $pdo->lastInsertId();
}

function delCondition(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `condition` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updateCondition(int $id, string $name) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `condition` SET Name=:name, UpdateDate='$updateDate' WHERE id =$id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
}

//echo getAllCondition();
//echo "<br>running gettags with 1 <br>";
//echo getCondition(1);
//echo "<br> getting row 1 <br>";
//echo getCondition(1);
//echo "<br> Setting new row 5 to foo <br>";
//$foo = "foo";
//echo newCondition($foo);
//echo "<br> getting row 5 <br>";
//echo getCondition(5);
//echo "<br> Update 5 from foo to bar <br>";
//updateCondition(5, "bar");
//echo getCondition(5);
//echo "<br> Removing 5 <br>";
//delCondition(5);
//echo getCondition(5);
?>