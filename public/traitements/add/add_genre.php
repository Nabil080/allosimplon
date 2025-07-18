<?php
session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if ($_POST['submit']) {
    $genre_name = trim(htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES));
    if (empty($genre_name)) {
        die();
    } else {
        $add_genre_request = $con->prepare(
            'INSERT INTO
                genre
            SET
                genre_name = ?'
        );
        $add_genre_request->execute([$genre_name]);

        if (strpos($_SERVER['HTTP_REFERER'], '?')) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=add_genre');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=add_genre');
        }
    }
} else {
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=no_form');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=no_form');
    }
    die();
}

?>
