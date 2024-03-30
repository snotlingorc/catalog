<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");


function getOwnerAssociationByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `ownerAssociation` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getOwnerAssociationByFormat(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `ownerAssociation` WHERE formatid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $json = json_encode($results);
    return $json;
}

function getOwnerAssociationByStatus(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `ownerAssociation` WHERE statusid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $json = json_encode($results);
    return $json;
}

function getOwnerAssociationByCondition(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `ownerAssociation` WHERE conditionid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $json = json_encode($results);
    return $json;
}

function getOAFormatByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT DISTINCT formatid FROM `ownerAssociation` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getOAConditionByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT DISTINCT conditionid FROM `ownerAssociation` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getOAStatusByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT DISTINCT statusid FROM `ownerAssociation` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function getOAOwnerByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT DISTINCT ownerid FROM `ownerAssociation` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    return $results;
}

function newOwnerAssociation(int $stuffID, int $ownerID, int $formatID, int $statusID, int $conditionID, float $price) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `ownerAssociation` ( `stuffid`, `ownerid`, `formatid`, `statusid`, `conditionid`, `price`) VALUES ('$stuffID', '$ownerID', '$formatID', '$statusID', '$conditionID', '$price');";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    return $pdo->lastInsertId();
}

function delOwnerAssociationbyOwnerStuff(int $stuffID, int $ownerID) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `ownerAssociation` WHERE ownerid=$ownerid and stuffID=$stuffID;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function delOwnerAssociation(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `ownerAssociation` WHERE id=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}


//TODO build test cases
?>