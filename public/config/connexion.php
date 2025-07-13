<?php
try {
    $host = 'db';  // service name from docker-compose
    $user = 'user';
    $pass = 'pass';
    $db = 'allosimplon';

    $con = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $con;;
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
