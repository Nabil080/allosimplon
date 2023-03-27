<?php
try {
        $user = "root";
        $pass = "";
        $host = "localhost";
        $db = "allosimplon";

// $host = "db5011786307.hosting-data.io";
// $user = "dbu244505";
// $pass = "75sFgJk3";
// $db= "dbs9928323";

        $con = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $con;
         ;
    } catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
?>