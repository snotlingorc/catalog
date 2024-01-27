<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getFormatCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `format`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllFormat() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `format`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getFormat(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name FROM `format` WHERE id=$id;";
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

function getFormatValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `format` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newFormat(String $name ) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `format` ( `Name`, `creationDate`, `UpdateDate`) VALUES (:name, '$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
    return $pdo->lastInsertId();
    
}

function delFormat(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `format` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updateFormat(int $id, string $name) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `format` SET Name=:name, UpdateDate='$updateDate' WHERE id = $id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":name", $name);
    $query->execute();
}

//echo getAllFormat();
//echo "<br>running gettags with 1 <br>";
//echo getFormat(1);
//echo "<br> getting row 5 <br>";
//echo getFormat(5);
//echo "<br> Setting new row 5 to foo <br>";
//$foo = "foo";
//$status = 1;
//echo newFormat($foo, $status);
//echo "<br> getting row 5 <br>";
//echo getFormat(5);
//echo "<br> Update 5 from foo to bar <br>";
//updateFormat(5, "bar", $status);
//echo getFormat(5);
//echo "<br> Removing 5 <br>";
//delFormat(5);
//echo getFormat(5);
?>