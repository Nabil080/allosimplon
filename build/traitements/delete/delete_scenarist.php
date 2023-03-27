<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    echo "Il manque l'ID du scénariste que vous souhaitez supprimer !";
    die();
}else{
// DEFINITIONS DES VARIABLES
$ID_scenarist = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);

// Suppression des éléments dans les tables de liaisons
$delete_scenarist_film=$con->prepare("DELETE FROM film_scenarist WHERE ID_scenarist = ?");
$delete_scenarist_film->execute([$ID_scenarist]);


// Suppression du scénariste

$delete_scenarist=$con->prepare("DELETE FROM scenarist WHERE ID_scenarist = ?");
$delete_scenarist->execute([$ID_scenarist]);

echo "Le scénariste a bien été supprimé ! ", "<br> var_dump post en bas là ! "; 
var_dump($_POST);

}



?>