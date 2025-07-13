<?php
session_start();
require_once '../../config/connexion.php';

if (isset($_POST['message'])) {
    $message = trim(htmlspecialchars(strip_tags($_POST['message']), ENT_QUOTES));
    $film = htmlspecialchars(strip_tags($_POST['ID_film']), ENT_QUOTES);
    if (empty($message || ctype_space($message))) {
        if (strpos($_SERVER['HTTP_REFERER'], '?')) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=missing_element');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=missing_element');
        }
        die();
    } else {
        $add_comment_request = $con->prepare('INSERT INTO comment (ID_user, ID_film, comment_message, comment_pseudo) VALUES (? ,? ,? ,?)');
        $add_comment_request->execute([$_SESSION['ID_user'], $film, $message, $_SESSION['user_pseudo']]);
        if (strpos($_SERVER['HTTP_REFERER'], '?')) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=add_comment');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=add_comment');
        }
    }
}

?>
