<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    echo "Il manque l'ID du réalisateur que vous souhaitez supprimer !";
    die();
}else{
// DEFINITIONS DES VARIABLES
$ID_realisator = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);

// Suppression des éléments dans les tables de liaisons
$delete_realisator_film=$con->prepare("DELETE FROM film_realisator WHERE ID_realisator = ?");
$delete_realisator_film->execute([$ID_realisator]);


// Suppression du réalisateur

$delete_realisator=$con->prepare("DELETE FROM realisator WHERE ID_realisator = ?");
$delete_realisator->execute([$ID_realisator]);

echo "Le réalisateur a bien été supprimé ! ", "<br> var_dump post en bas là ! "; 
var_dump($_POST);

}



?>