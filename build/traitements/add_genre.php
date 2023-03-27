<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';

// Variables + sécurisation
if($_POST['submit']){
$genre_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
if(empty($genre_name)){
    echo "Des éléments sont manquants";
    var_dump($genre_name);
    var_dump($_POST);
    die();





}else{
        $add_genre_request=$con->prepare(
            "INSERT INTO
                genre
            SET
                genre_name = ?");
        $add_genre_request->execute([ $genre_name]);

        echo "Le genre a bien été ajouté";
        var_dump ($add_genre_request);
    }





}else{
    echo "venez depuis le formulaire d'ajout de genre";
    var_dump($_POST);
    die();
}




?>