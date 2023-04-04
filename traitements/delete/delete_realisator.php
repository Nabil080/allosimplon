<?php session_start();
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=no_form");
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

header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=delete_realisator");

}
?>