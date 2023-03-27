<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    echo "venez depuis le formulaire de modification du genre";
}else{
$genre_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
$ID_genre = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);
if(isset($_POST['film'])){$ID_film_array = ($_POST['film']);}

if(
    empty($genre_name)
    ){
    echo 'un élément est manquant';
    var_dump($genre_name);
    var_dump($ID_genre);
    }else{

        $add_genre_request=$con->prepare(
            "UPDATE
                genre
            SET
                genre_name = ?
            WHERE
                ID_genre = ?");
    
        $add_genre_request->execute([$genre_name, $ID_genre]);
    
    if(isset($ID_film_array)){
        // Suppression des éléments dans les tables de liaisons
        $delete_genre_film=$con->prepare("DELETE FROM film_genre WHERE ID_genre = ?");
        $delete_genre_film->execute([$ID_genre]);

        foreach($ID_film_array as $ID_film){
            $add_genre_request=$con->prepare(
                "INSERT INTO
                    film_genre
                SET
                ID_film = ?, ID_genre = ? ");
            $add_genre_request->execute([ $ID_film, $ID_genre]);
        }
    }
        echo "Le genre a été modifié.";
        echo'<br> ID genre : <br>';
        var_dump($ID_genre);
        echo'<br> nom du genre : <br>';
        var_dump($genre_name);
        echo'<br> ID des films : <br>';
        var_dump($ID_film_array);



    }
}

?>