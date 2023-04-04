<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=no_form");
}else{
$actor_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
$ID_actor = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);
$ID_film_array = ($_POST['film']);
if(
    empty($actor_name) ||
    empty($ID_film_array)
    ){
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=missing_element");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=missing_element");
            }
    }else{

        $add_actor_request=$con->prepare(
            "UPDATE
                actor
            SET
                actor_name = ?
            WHERE
                ID_actor = ?");
    
        $add_actor_request->execute([$actor_name, $ID_actor]);
    
        // Suppression des éléments dans les tables de liaisons
        $delete_actor_film=$con->prepare("DELETE FROM film_actor WHERE ID_actor = ?");
        $delete_actor_film->execute([$ID_actor]);

    foreach($ID_film_array as $ID_film){
        $add_actor_request=$con->prepare(
            "INSERT INTO
                film_actor
            SET
            ID_film = ?, ID_actor = ? ");
        $add_actor_request->execute([ $ID_film, $ID_actor]);
    }

        echo "L'acteur a été modifié.";
        echo'<br> ID acteurs : <br>';
        var_dump($ID_actor);

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
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=size_error");
                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                if(!in_array($file_type, $allowed_types)) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=format_error");
                    die();
                }
        
                $extension = explode('.', $nameFile);
                if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=format_error");
                }
        
                $actor_name_photo = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/actor/';
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $actor_name_photo)) {
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=move_file");


                    $update_photo=$con->prepare("UPDATE actor SET actor_photo = ? WHERE ID_actor = ?");
                    $update_photo->execute([$actor_name_photo, $ID_actor]);
                }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=move_file_error");
                }
            }
    }
}

?>