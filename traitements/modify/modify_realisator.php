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
$realisator_name = trim(htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES));
$ID_realisator = trim(htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES));
if(isset($_POST['film'])){
$ID_film_array = ($_POST['film']);
}

if(
    empty($realisator_name)
    ){
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=missing_element");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=missing_element");
            }
    }else{

        $add_realisator_request=$con->prepare(
            "UPDATE
                realisator
            SET
                realisator_name = ?
            WHERE
                ID_realisator = ?");
    
        $add_realisator_request->execute([$realisator_name, $ID_realisator]);
    
    if(isset($_POST['film'])){
        // Suppression des éléments dans les tables de liaisons
        $delete_realisator_film=$con->prepare("DELETE FROM film_realisator WHERE ID_realisator = ?");
        $delete_realisator_film->execute([$ID_realisator]);

        foreach($ID_film_array as $ID_film){
            $add_realisator_request=$con->prepare(
                "INSERT INTO
                    film_realisator
                SET
                ID_film = ?, ID_realisator = ? ");
            $add_realisator_request->execute([ $ID_film, $ID_realisator]);
        }
}
if(strpos($_SERVER['HTTP_REFERER'],"?")){
    header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=update_actor");
    }else{
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=update_actor");
    }

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
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=size_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=size_error");
                        }
                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
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
                        }
                }
        
                $realisator_name_photo = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/realisator/';
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $realisator_name_photo)) {
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=move_file");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=move_file");
                        }

                    $update_photo=$con->prepare("UPDATE realisator SET realisator_photo = ? WHERE ID_realisator = ?");
                    $update_photo->execute([$realisator_name_photo, $ID_realisator]);
                }else{
                    if(strpos($_SERVER['HTTP_REFERER'],"?")){
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=move_file_error");
                        }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=move_file_error");
                        }

                }
            }
            


        



    }
}

?>