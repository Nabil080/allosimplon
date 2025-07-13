<?php
session_start();
require_once '../../config/connexion.php';

if (empty($_POST['ID'])) {
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=no_form');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=no_form');
    }
    die();
} else {
    // DEFINITIONS DES VARIABLES
    $ID_film = htmlspecialchars(strip_tags($_POST['ID']), ENT_QUOTES);

    // Suppression des éléments dans les tables de liaisons
    $delete_film_actor = $con->prepare('DELETE FROM film_actor WHERE ID_film = ?');
    $delete_film_actor->execute([$ID_film]);

    $delete_film_realisator = $con->prepare('DELETE FROM film_realisator WHERE ID_film = ?');
    $delete_film_realisator->execute([$ID_film]);

    $delete_film_scenarist = $con->prepare('DELETE FROM film_scenarist WHERE ID_film = ?');
    $delete_film_scenarist->execute([$ID_film]);

    $delete_film_genre = $con->prepare('DELETE FROM film_genre WHERE ID_film = ?');
    $delete_film_genre->execute([$ID_film]);

    $delete_film_user = $con->prepare('DELETE FROM user_fav WHERE ID_film = ?');
    $delete_film_user->execute([$ID_film]);

    $delete_film_comment = $con->prepare('DELETE FROM comment WHERE ID_film = ?');
    $delete_film_comment->execute([$ID_film]);

    // Suppression du film

    $delete_film = $con->prepare('DELETE FROM film WHERE ID_film = ?');
    $delete_film->execute([$ID_film]);

    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=delete_film');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=delete_film');
    }
}

?>
