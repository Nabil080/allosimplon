<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    echo "venez depuis le formulaire de modification de l'utilisateur";
}else{
$user_pseudo = htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES );
$user_email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES );
$ID_role = htmlspecialchars(strip_tags($_POST['role']), ENT_QUOTES );
$ID_user = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);
$ID_film_array = ($_POST['film']);

if(
    empty($user_pseudo) ||
    empty($user_email) ||
    empty($ID_role) ||
    empty($ID_film_array)
    ){
    echo 'un élément est manquant';
    }else{

        $add_user_request=$con->prepare(
            "UPDATE
                user
            SET
                user_pseudo = ?, user_email = ?, ID_role = ?
            WHERE
                ID_user = ?");
    
        $add_user_request->execute([$user_pseudo,$user_email,$ID_role, $ID_user]);
    
        // Suppression des éléments dans les tables de liaisons
        $delete_user_fav=$con->prepare("DELETE FROM user_fav WHERE ID_user = ?");
        $delete_user_fav->execute([$ID_user]);

    foreach($ID_film_array as $ID_film){
        $add_user_request=$con->prepare(
            "INSERT INTO
                user_fav
            SET
            ID_film = ?, ID_user = ? ");
        $add_user_request->execute([ $ID_film, $ID_user]);
    }

        echo "L'utilisateur a été modifié.";
        echo'<br> ID utilisateur : <br>';
        var_dump($ID_user);

    }
}

?>