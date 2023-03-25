<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';

// Variables + sécurisation
$film_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
$film_date = htmlspecialchars(strip_tags($_POST['date']), ENT_QUOTES );
$film_photo = htmlspecialchars(strip_tags($_POST['photo']), ENT_QUOTES );
$film_video = htmlspecialchars(strip_tags($_POST['video']), ENT_QUOTES );
$film_grade = htmlspecialchars(strip_tags($_POST['grade']), ENT_QUOTES );
$film_description = htmlspecialchars(strip_tags($_POST['description']), ENT_QUOTES );
$film_time = htmlspecialchars(strip_tags($_POST['time']), ENT_QUOTES );
$film_background = htmlspecialchars(strip_tags($_POST['background']), ENT_QUOTES );
$ID_film = htmlspecialchars(strip_tags($_POST['film']), ENT_QUOTES );
$ID_actor = htmlspecialchars(strip_tags($_POST['actor']), ENT_QUOTES );
$ID_realisator = htmlspecialchars(strip_tags($_POST['realisator']), ENT_QUOTES );
$ID_genre = htmlspecialchars(strip_tags($_POST['genre']), ENT_QUOTES );
$ID_scenarist = htmlspecialchars(strip_tags($_POST['scenarist']), ENT_QUOTES );




    $add_film_request=$con->prepare(
        "INSERT INTO
            film
        SET
            film_name = ?, film_date = ?, film_photo = ?, film_video = ?, film_grade = ?, film_description = ?, film_time = ?, film_background = ?");

    $add_film_request->execute([ $film_name, $film_date, $film_photo, $film_video, $film_grade,  $film_description, $film_time, $film_background]);

    $add_actor_request=$con->prepare(
        "INSERT INTO
            film_actor
        SET
        ID_film = ?, ID_actor = ? ");

    $add_actor_request->execute([ $ID_film, $ID_actor]);

    $add_realisator_request=$con->prepare(
        "INSERT INTO
            film_realisator
        SET
        ID_film = ?, ID_realisator = ?
        ");
    $add_realisator_request->execute([ $ID_film, $ID_realisator
    ]);

    $add_genre_request=$con->prepare(
        "INSERT INTO
            film_genre
        SET
        ID_film = ?, ID_genre = ?
        ");
    $add_genre_request->execute([ $ID_film, $ID_genre
    ]);

    $add_scenarist_request=$con->prepare(
        "INSERT INTO
            film_scenarist
        SET
        ID_film = ?, ID_scenarist = ?
        ");
    $add_scenarist_request->execute([ $ID_film, $ID_genre
    ]);


    echo 'Le film a été ajouté.';


?>