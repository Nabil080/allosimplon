<?php session_start();
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=no_form");
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

var_dump($_POST);
header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=delete_scenarist");


}



?>