<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=no_form");
}else{
$film_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
$film_date = htmlspecialchars(strip_tags($_POST['date']), ENT_QUOTES );
$film_video = htmlspecialchars(strip_tags($_POST['video']), ENT_QUOTES );
$film_grade = htmlspecialchars(strip_tags($_POST['grade']), ENT_QUOTES );
$film_description = htmlspecialchars(strip_tags($_POST['description']), ENT_QUOTES );
$film_time = htmlspecialchars(strip_tags($_POST['time']), ENT_QUOTES );
$ID_film = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);
$ID_actor_array = ($_POST['actor']);
$ID_realisator_array = ($_POST['realisator']);
$ID_genre_array = ($_POST['genre']);
$ID_scenarist_array = ($_POST['scenarist']);

if(
    empty($film_name) ||
    empty($film_date) ||
    empty($film_video) ||
    empty($film_grade) ||
    empty($film_description) ||
    empty($film_time) ||
    empty($ID_film) ||
    empty($ID_actor_array) ||
    empty($ID_realisator_array) ||
    empty($ID_genre_array) ||
    empty($ID_scenarist_array)
    ){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=missing_element");
    }else{

        $add_film_request=$con->prepare(
            "UPDATE
                film
            SET
                film_name = ?, film_date = ?, film_video = ?, film_grade = ?, film_description = ?, film_time = ?
            WHERE
                ID_film = ?");
    
        $add_film_request->execute([ $film_name, $film_date, $film_video, $film_grade,  $film_description, $film_time, $ID_film]);
    
        // Suppression des éléments dans les tables de liaisons
        $delete_film_actor=$con->prepare("DELETE FROM film_actor WHERE ID_film = ?");
        $delete_film_actor->execute([$ID_film]);

        $delete_film_realisator=$con->prepare("DELETE FROM film_realisator WHERE ID_film = ?");
        $delete_film_realisator->execute([$ID_film]);

        $delete_film_scenarist=$con->prepare("DELETE FROM film_scenarist WHERE ID_film = ?");
        $delete_film_scenarist->execute([$ID_film]);

        $delete_film_genre=$con->prepare("DELETE FROM film_genre WHERE ID_film = ?");
        $delete_film_genre->execute([$ID_film]);

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
            "INSERT
                film_realisator
            SET
            ID_film = ?, ID_realisator = ?
            ");
        $add_realisator_request->execute([ $ID_film, $ID_realisator
        ]);
    }
    
    foreach($ID_genre_array as $ID_genre){
        $add_genre_request=$con->prepare(
            "INSERT
                film_genre
            SET
            ID_film = ?, ID_genre = ?
            ");
        $add_genre_request->execute([ $ID_film, $ID_genre
        ]);
    }
    
    foreach($ID_scenarist_array as $ID_scenarist){
        $add_scenarist_request=$con->prepare(
            "INSERT
                film_scenarist
            SET
            ID_film = ?, ID_scenarist = ?
            ");
        $add_scenarist_request->execute([ $ID_film, $ID_scenarist
        ]);
    }
    
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=update_film");
            // VERIFICATION PHOTO AFFICHE
            if (isset($_FILES['photo']['name']) && $_FILES['photo']['error'] == 0) {
                $nameFile = $_FILES['photo']['name'];
                $typeFile = $_FILES['photo']['type'];
                $tmpFile = $_FILES['photo']['tmp_name'];
                $errorFile = $_FILES['photo']['error'];
                $sizeFile = $_FILES['photo']['size'];
        
                $max_size = 20000000;
                $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];
        
                if ($sizeFile > $max_size) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=size_error");
                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                if(!in_array($file_type, $allowed_types)) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                    die();
                }
        
                $extension = explode('.', $nameFile);
                if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                }
        
                $film_name_photo = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/film/';
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $film_name_photo)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=missing_element");
// Le fichier a été correctement déplacé


                    $update_photo=$con->prepare("UPDATE film SET film_photo = ? WHERE ID_film = ?");
                    $update_photo->execute([$film_name_photo, $ID_film]);
                }
            }
                                // VERIFICATION BACKGROUND PHOTO
            if (isset($_FILES['background']['name']) && $_FILES['background']['error'] == 0) {
                $nameFile = $_FILES['background']['name'];
                $typeFile = $_FILES['background']['type'];
                $tmpFile = $_FILES['background']['tmp_name'];
                $errorFile = $_FILES['background']['error'];
                $sizeFile = $_FILES['background']['size'];
        
                $max_size = 20000000;
                $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];
        
                if ($sizeFile > $max_size) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=size_error");
                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION);
                if(!in_array($file_type, $allowed_types)) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                    die();
                }
        
                $extension = explode('.', $nameFile);
                if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                }
        
                $film_name_background = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/film/';
                if(move_uploaded_file($_FILES['background']['tmp_name'], $upload_dir . $film_name_background)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=move_file");
                    $update_background=$con->prepare("UPDATE film SET film_background = ? WHERE ID_film = ?");
                    $update_background->execute([$film_name_background, $ID_film]);
                }


        



    }
}
}
?>