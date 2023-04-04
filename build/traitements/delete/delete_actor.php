<?php session_start();
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=no_form");
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

header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=actor_delete");


}



?>