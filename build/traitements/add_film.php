<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    echo 'un élément est manquant';
}else{
$film_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
$film_date = htmlspecialchars(strip_tags($_POST['date']), ENT_QUOTES );
$film_photo = htmlspecialchars(strip_tags($_POST['photo']), ENT_QUOTES );
$film_video = htmlspecialchars(strip_tags($_POST['video']), ENT_QUOTES );
$film_grade = htmlspecialchars(strip_tags($_POST['grade']), ENT_QUOTES );
$film_description = htmlspecialchars(strip_tags($_POST['description']), ENT_QUOTES );
$film_time = htmlspecialchars(strip_tags($_POST['time']), ENT_QUOTES );
$film_background = htmlspecialchars(strip_tags($_POST['background']), ENT_QUOTES );
$ID_actor_array = ($_POST['actor']);
$ID_realisator_array = ($_POST['realisator']);
$ID_genre_array = ($_POST['genre']);
$ID_scenarist_array = ($_POST['scenarist']);


if(
empty($film_name) ||
empty($film_date) ||
empty($film_photo) ||
empty($film_video) ||
empty($film_grade) ||
empty($film_description) ||
empty($film_time) ||
empty($film_background) ||
empty($ID_actor_array) ||
empty($ID_realisator_array) ||
empty($ID_genre_array) ||
empty($ID_scenarist_array)
){
echo 'un élément est manquant';
}else{



    $add_film_request=$con->prepare(
        "INSERT INTO
            film
        SET
            film_name = ?, film_date = ?, film_photo = ?, film_video = ?, film_grade = ?, film_description = ?, film_time = ?, film_background = ?");

    $add_film_request->execute([ $film_name, $film_date, $film_photo, $film_video, $film_grade,  $film_description, $film_time, $film_background]);

    $get_film_id=$con->prepare(
        "SELECT ID_film
        FROM film
        WHERE film_name = ?"
    );
    $get_film_id->execute([$film_name]);
    $ID_film_array=$get_film_id->fetch();
    $ID_film=$ID_film_array[0];

foreach($ID_actor_array as $ID_actor){
    $add_actor_request=$con->prepare(
        "INSERT INTO
            film_actor
        SET
        ID_film = ?, ID_actor = ? ");
    $add_actor_request->execute([ $ID_film, $ID_actor]);
}

foreach($ID_realisator_array as $ID_realisator){
    $add_realisator_request=$con->prepare(
        "INSERT INTO
            film_realisator
        SET
        ID_film = ?, ID_realisator = ?
        ");
    $add_realisator_request->execute([ $ID_film, $ID_realisator
    ]);
}

foreach($ID_genre_array as $ID_genre){
    $add_genre_request=$con->prepare(
        "INSERT INTO
            film_genre
        SET
        ID_film = ?, ID_genre = ?
        ");
    $add_genre_request->execute([ $ID_film, $ID_genre
    ]);
}

foreach($ID_scenarist_array as $ID_scenarist){
    $add_scenarist_request=$con->prepare(
        "INSERT INTO
            film_scenarist
        SET
        ID_film = ?, ID_scenarist = ?
        ");
    $add_scenarist_request->execute([ $ID_film, $ID_scenarist
    ]);
}

    echo 'Le film a été ajouté.';
    echo'<br> ID acteurs : <br>';
    var_dump($ID_actor_array);
    echo'<br> ID realisator : <br>';
    var_dump($ID_realisator_array);
    echo'<br> ID genre : <br>';
    var_dump($ID_genre_array);
    echo'<br> ID scenarist : <br>';
    var_dump($ID_scenarist_array);

}
}

?>