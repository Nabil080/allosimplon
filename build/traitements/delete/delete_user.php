<?php session_start();
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    echo "Il manque l'ID de l'utilisateur que vous souhaitez supprimer !";
    die();
}else{
// DEFINITIONS DES VARIABLES
$ID_user = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);

// Suppression des éléments dans les tables de liaisons
$delete_user_film=$con->prepare("DELETE FROM user_fav WHERE ID_user = ?");
$delete_user_film->execute([$ID_user]);


// Suppression de l'utilisateur

$delete_user=$con->prepare("DELETE FROM user WHERE ID_user = ?");
$delete_user->execute([$ID_user]);

echo "L'utilisateur a bien été supprimé ! ", "<br> var_dump post en bas là ! "; 
var_dump($_POST);

}



?>