<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getAuthorCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `authors`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllAuthor() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `authors`";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getAuthor(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT Name FROM `authors` WHERE id=$id;";
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

function getAuthorValues(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `authors` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newAuthor(String $name, String $URL) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `authors` ( `Name`, `URL`,`creationDate`, `UpdateDate`) VALUES (:name, :url,'$creationDate', '$creationDate');";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":url", $URL);
    $query->bindParam(":name", $name);
    $query->execute();
    return $pdo->lastInsertId();
}

function delAuthor(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `authors` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function updateAuthor(int $id, string $name, string $URL) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `authors` SET Name=:name, URL=:url, UpdateDate='$updateDate' WHERE id =$id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":url", $URL);
    $query->bindParam(":name", $name);
    $query->execute();
}

//echo getAllAuthor();
//echo "<br>running getauthors with 1 <br>";
//echo getAuthor(1);
//echo "<br> getting row 4 <br>";
//echo getAuthor(4);
//echo "<br> Setting new row 4 to foo <br>";
//$foo = "foo";
//$URL = "https://foo.bar";
//echo newAuthor($foo, $URL);
//echo "<br> getting row 4 <br>";
//echo getAuthor(4);
//echo "<br> Update 4 from foo to bar <br>";
//updateAuthor(4, "bar", $URL);
//echo getAuthor(4);
//echo "<br> Removing 4 <br>";
//delAuthor(4);
//echo getAuthor(4);
?>