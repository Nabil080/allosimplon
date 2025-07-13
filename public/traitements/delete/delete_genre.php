<?php
session_start();
require_once '../../config/connexion.php';

if (empty($_POST['ID'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?&message=no_form');
    die();
} else {
    // DEFINITIONS DES VARIABLES
    $ID_genre = htmlspecialchars(strip_tags($_POST['ID']), ENT_QUOTES);

    // Suppression des éléments dans les tables de liaisons
    $delete_genre_film = $con->prepare('DELETE FROM film_genre WHERE ID_genre = ?');
    $delete_genre_film->execute([$ID_genre]);

    // Suppression du genre

    $delete_genre = $con->prepare('DELETE FROM genre WHERE ID_genre = ?');
    $delete_genre->execute([$ID_genre]);

    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?&message=delete_genre');
}

?>
