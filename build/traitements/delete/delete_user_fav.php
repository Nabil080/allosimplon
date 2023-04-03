<?php session_start();
require_once '../../config/connexion.php';

// RECUP VARIABLES + SAFE
if(isset($_POST['submit'])){
    $ID_user=htmlspecialchars(strip_tags($_POST['ID_user']),ENT_QUOTES);
    $ID_film=htmlspecialchars(strip_tags($_POST['ID_film']),ENT_QUOTES);
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=no_form");
    die();
}

$add_user_fav_request=$con->prepare(
    "DELETE FROM
        user_fav
    WHERE ID_user = ? AND ID_film = ?");
$add_user_fav_request->execute([$ID_user,$ID_film]);
$update_fav_count=$con->prepare(
    "UPDATE film JOIN (SELECT ID_film, COUNT(*) as likes_count FROM user_fav GROUP BY ID_film) AS fav_counts ON film.ID_film = fav_counts.ID_film SET film.likes = fav_counts.likes_count;");
$update_fav_count->execute();

header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=delete_fav");

?>