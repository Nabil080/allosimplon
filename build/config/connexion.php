<?php
try {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "allosimplon";
        
        $con = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        echo 'CONNECTÉ A LA BDD', $db;
        return $con;
         ;
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
?>