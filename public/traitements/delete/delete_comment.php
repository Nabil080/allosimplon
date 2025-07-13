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
    $ID = htmlspecialchars(strip_tags($_POST['ID']), ENT_QUOTES);

    // Suppression des éléments dans les tables de liaisons
    $delete_genre_film = $con->prepare('DELETE FROM comment WHERE ID_comment = ?');
    $delete_genre_film->execute([$ID]);

    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=delete_comment');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=delete_comment');
    }
}

?>
