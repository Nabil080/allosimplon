<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    echo "Il manque l'ID de l'acteur que vous souhaitez supprimer !";
    die();
}else{
// DEFINITIONS DES VARIABLES
$ID_actor = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);

// Suppression des éléments dans les tables de liaisons
$delete_actor_film=$con->prepare("DELETE FROM film_actor WHERE ID_actor = ?");
$delete_actor_film->execute([$ID_actor]);


// Suppression de l'acteur

$delete_actor=$con->prepare("DELETE FROM actor WHERE ID_actor = ?");
$delete_actor->execute([$ID_actor]);

echo "L'acteur a bien été supprimé ! ", "<br> var_dump post en bas là ! "; 
var_dump($_POST);

}



?>