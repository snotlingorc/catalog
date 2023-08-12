<?php 
declare(strict_types=1);
date_default_timezone_set("America/Denver");

function adminLogin(String $adminusername, String $adminpassword) {
    include(__DIR__ . '/../includes/config.php');
    //$password = md5($password);
    $stmt = "SELECT UserName,Password FROM administrator WHERE UserName=:username and Password=:password";
    $query = $pdo -> prepare($stmt);
    $query-> bindParam(':username', $adminusername, PDO::PARAM_STR);
    $query-> bindParam(':password', $adminpassword, PDO::PARAM_STR);
    $query-> execute();
    return $query->rowCount();
}



?>