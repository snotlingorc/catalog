<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getCategoryCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `category`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllCategory() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `category`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getCategory(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name FROM `category` WHERE id=$id;";
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

function getCategoryValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `category` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newCategory(String $name, int $status) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `category` ( `Name`, `Status`,`creationDate`, `UpdateDate`) VALUES (:name, :status, '$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->bindParam(":status", $status);
    $query->execute();
    return $pdo->lastInsertId();
    
}

function delCategory(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `category` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updateCategory(int $id, string $name, int $status) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `category` SET Name=:name, Status=:status, UpdateDate='$updateDate' WHERE id = $id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->bindParam(":status", $status);
    $query->execute();
}

//echo getAllCategory();
//echo "<br>running gettags with 1 <br>";
//echo getCategory(1);
//echo "<br> getting row 5 <br>";
//echo getCategory(5);
//echo "<br> Setting new row 5 to foo <br>";
//$foo = "foo";
//$status = 1;
//echo newCategory($foo, $status);
//echo "<br> getting row 5 <br>";
//echo getCategory(5);
//echo "<br> Update 5 from foo to bar <br>";
//updateCategory(5, "bar", $status);
//echo getCategory(5);
//echo "<br> Removing 5 <br>";
//delCategory(5);
//echo getCategory(5);
?>