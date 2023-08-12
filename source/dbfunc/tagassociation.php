<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");


function getAssociationByTag(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `tagAssociation` WHERE tagid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $json = json_encode($results);
    return $json;
}

function getAssociationByStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "SELECT * FROM `tagAssociation` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $json = json_encode($results);
    return $json;
}

function newAssociation(int $stuffID, int $tagID) {
    include(__DIR__ . '/../includes/config.php');
    $creationDate = date("Y-m-d H:i:s");
    $stmt = "INSERT INTO `tagAssociation` ( `stuffid`, `tagid`) VALUES ('$stuffID', '$tagID');";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function delAssociation(int $stuffID, int $tagID) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `tagAssociation` WHERE tagid=$tagid and stuffID=$stuffID;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function delAssociationbyTag(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `tagAssociation` WHERE tagid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

function delAssociationbyStuff(int $id) {
    include(__DIR__ . '/../includes/config.php');
    $stmt = "DELETE FROM `tagAssociation` WHERE stuffid=$id;";
    $query = $pdo -> prepare($stmt);
    $query->execute();
}

//TODO build test cases
?>