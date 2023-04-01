<?php session_start();
require_once '../../config/connexion.php';

if(empty($_POST['ID'])){
    echo "Il manque l'ID du film que vous souhaitez supprimer !";
    echo "<script>alert('Il manque l'ID du film'); window.location.replace(document.referrer);</script>";
    die();
}else{
// DEFINITIONS DES VARIABLES
$ID_film = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);

// Suppression des éléments dans les tables de liaisons
$delete_film_actor=$con->prepare("DELETE FROM film_actor WHERE ID_film = ?");
$delete_film_actor->execute([$ID_film]);

$delete_film_realisator=$con->prepare("DELETE FROM film_realisator WHERE ID_film = ?");
$delete_film_realisator->execute([$ID_film]);

$delete_film_scenarist=$con->prepare("DELETE FROM film_scenarist WHERE ID_film = ?");
$delete_film_scenarist->execute([$ID_film]);

$delete_film_genre=$con->prepare("DELETE FROM film_genre WHERE ID_film = ?");
$delete_film_genre->execute([$ID_film]);

// Suppression du film

$delete_film=$con->prepare("DELETE FROM film WHERE ID_film = ?");
$delete_film->execute([$ID_film]);

echo 'Le film a bien été supprimé ! ', '<br> var_dump post en bas là ! ';
var_dump($_POST);
echo "<script>alert('Le film a bien été supprimé!'); window.location.replace(document.referrer);</script>";


}



?>