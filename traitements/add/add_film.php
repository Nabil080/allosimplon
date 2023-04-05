<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    if(strpos($_SERVER['HTTP_REFERER'],"?")){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=no_form");
        }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=no_form");
        }
}else{
$film_name = trim(htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES ));
$film_date = trim(htmlspecialchars(strip_tags($_POST['date']), ENT_QUOTES ));
$film_video = trim(htmlspecialchars(strip_tags($_POST['video']), ENT_QUOTES ));
$film_grade = trim(htmlspecialchars(strip_tags($_POST['grade']), ENT_QUOTES ));
$film_description = trim(htmlspecialchars(strip_tags($_POST['description']), ENT_QUOTES ));
$film_time = trim(htmlspecialchars(strip_tags($_POST['time']), ENT_QUOTES ));
$film_admin_id = trim(htmlspecialchars(strip_tags($_POST['admin_id']), ENT_QUOTES ));
$film_admin_pseudo = trim(htmlspecialchars(strip_tags($_POST['admin_pseudo']), ENT_QUOTES ));
$ID_actor_array = ($_POST['actor']);
$ID_realisator_array = ($_POST['realisator']);
$ID_genre_array = ($_POST['genre']);
$ID_scenarist_array = ($_POST['scenarist']);

if(
    empty($film_name) ||
    empty($film_date) ||
    empty($film_video) ||
    !filter_var($film_video,FILTER_VALIDATE_URL) ||
    empty($film_grade) ||
    empty($film_description) ||
    empty($film_time) ||
    empty($film_admin_id) ||
    empty($film_admin_pseudo) ||
    empty($ID_actor_array) ||
    empty($ID_realisator_array) ||
    empty($ID_genre_array) ||
    empty($ID_scenarist_array)
    ){
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=missing_element");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=missing_element");
            }
    }else{
    
        if(isset($_FILES['photo']['name']) && isset($_FILES['background']['name'])) {
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
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=file_size");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=file_size");
                        }                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                if(!in_array($file_type, $allowed_types)) {
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=format_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                        }                    die();
                }
        
                $extension = explode('.', $nameFile);
                if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=format_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                        }                }
        
                $film_name_photo = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/film/';
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $film_name_photo)) {
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=move_file");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=move_file");
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
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=size_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=size_error");
                        }
                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['background']['name'], PATHINFO_EXTENSION);
                if(!in_array($file_type, $allowed_types)) {
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=format_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                        }
                die();
                }
        
                $extension = explode('.', $nameFile);
                if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=format_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=format_error");
                        }                }
        
                $film_name_background = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/film/';
                if(move_uploaded_file($_FILES['background']['tmp_name'], $upload_dir . $film_name_background)) {
                    echo 'le fichier est dans le serveur';// Le fichier a été correctement déplacé

                    $add_film_request=$con->prepare(
                        "INSERT INTO
                            film
                        SET
                            film_name = ?, film_date = ?, film_photo = ?, film_video = ?, film_grade = ?, film_description = ?, film_time = ?, film_background = ?, admin_id = ?, admin_pseudo = ?");
                
                    $add_film_request->execute([ $film_name, $film_date, $film_name_photo, $film_video, $film_grade,  $film_description, $film_time, $film_name_background,$film_admin_id, $film_admin_pseudo]);
                
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
                
                if(strpos($_SERVER['HTTP_REFERER'],"?")){
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=add_film");
                    }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=add_film");
                    }
                    
                }

                } else {
                    echo 'la photo background n as pas pu etre upload';
                    
                    var_dump($_FILES);
                    var_dump($_FILES['background']['error']);
                    var_dump($_FILES['background']['name']);
                    die(); // Il y a eu une erreur lors du déplacement du fichier
                    
                }
        
            } else {
                if(strpos($_SERVER['HTTP_REFERER'],"?")){
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=file_error");
                    }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=file_error");
                    }
                die();
            }
                
        
                } else {
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=move_file_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=move_file_error");
                        }
                    die(); // Il y a eu une erreur lors du déplacement du fichier

                }
        
            } else {
                if(strpos($_SERVER['HTTP_REFERER'],"?")){
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=file_error");
                    }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=file_error");
                    }
                die();
            }


    }
}

?>
