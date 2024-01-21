<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function getStuffCount() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT id FROM `stuff`";
    $query = $pdo -> prepare($stmt);
    $query-> execute();
    return $query->rowCount();
}

function getAllStuff() {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `stuff` order by Title Asc";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `stuff` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newStuff(String $title, int $catID, int $AuthorID, int $ConditionID, int $StatusID, int $OwnerID, string $ISBN, string $Date, string $Description) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `stuff` (`Title`, `CatId`, `AuthorId`, `ConditionId`, `StatusId`, `OwnerId`, `ISBN`, `Date`, `Description`, `CreationDate`, `UpdateDate`) VALUES
    (:title, '$catID', '$AuthorID', '$ConditionID', '$StatusID', '$OwnerID', :isbn, :date :desc, '$creationDate', '$creationDate')";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":title", $title);
    $query->bindParam(":isbn", $ISBN);
    $query->bindParam(":date", $Date);
    $query->bindParam(":desc", $Description);
    $query->execute();
    return $pdo->lastInsertId();
}

function delStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `stuff` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(':sid',$sid,PDO::PARAM_STR);
    $query->execute();

    // Do not forget to delete the tagAssociation for StuffID
    // Do not forget to delete the image associated with this StuffID
    //TODO
}

function updateStuff(int $id, String $title, int $catID, int $AuthorID, int $ConditionID, int $StatusID, int $OwnerID, string $ISBN, string $Date, string $Description) {
    include(__DIR__ . '/../includes/config.php');
    $updateDate = date("Y-m-d H:i:s");
    $stmt = "UPDATE `stuff` SET Title=:title, CatId='$catID', AuthorId='$AuthorID', ConditionId='$ConditionID', StatusId='$StatusID', OwnerId='$OwnerID', ISBN=:isbn, Date=:date, Description=:desc, UpdateDate='$updateDate' WHERE id=$id";
    $query = $pdo -> prepare($stmt);
    $query->bindParam(":title", $title);
    $query->bindParam(":isbn", $ISBN);
    $query->bindParam(":date", $Date);
    $query->bindParam(":desc", $Description);
    $query->execute();
}

function getAllStuffByAuthor(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `stuff` where AuthorId = $id";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getAllStuffByCategory(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `stuff` where CatId = $id";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getAllStuffByCondition(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `stuff` where ConditionId = $id";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getAllStuffByStatus(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `stuff` where StatusId = $id";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getAllStuffByOwner(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `stuff` where OwnerId = $id";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

//echo getAllStuff();
//TODO test cases
?>