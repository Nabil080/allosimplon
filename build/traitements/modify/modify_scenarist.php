<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    echo "venez depuis le formulaire de modification du scénariste";
}else{
$scenarist_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
$ID_scenarist = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);
if(isset($_POST['film'])){
$ID_film_array = ($_POST['film']);
}
if(
    empty($scenarist_name)
    ){
    echo 'un élément est manquant';
    }else{

        $add_scenarist_request=$con->prepare(
            "UPDATE
                scenarist
            SET
                scenarist_name = ?
            WHERE
                ID_scenarist = ?");
    
        $add_scenarist_request->execute([$scenarist_name, $ID_scenarist]);
    
if(isset($_POST['film'])){
        // Suppression des éléments dans les tables de liaisons
        $delete_scenarist_film=$con->prepare("DELETE FROM film_scenarist WHERE ID_scenarist = ?");
        $delete_scenarist_film->execute([$ID_scenarist]);

    foreach($ID_film_array as $ID_film){
        $add_scenarist_request=$con->prepare(
            "INSERT INTO
                film_scenarist
            SET
            ID_film = ?, ID_scenarist = ? ");
        $add_scenarist_request->execute([ $ID_film, $ID_scenarist]);
    }
}
        echo "Le scénariste a été modifié.";
        echo'<br> ID scénariste : <br>';
        var_dump($ID_scenarist);

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
                    echo "Taille de l'affiche trop importante";
                    die();
                }
            
                $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                $file_type = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                if(!in_array($file_type, $allowed_types)) {
                    echo 'format image invalide';
                    die();
                }
        
                $extension = explode('.', $nameFile);
                if(!count($extension) <=2 && !in_array(strtolower(end($extension)), $extensions)) {
                    echo 'format image incorrect';
                }
        
                $scenarist_name_photo = uniqid() . '.' . $file_type;
            
                $upload_dir = '../../upload/scenarist/';
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $scenarist_name_photo)) {
                    echo 'le fichier est dans le serveur';// Le fichier a été correctement déplacé


                    $update_photo=$con->prepare("UPDATE scenarist SET scenarist_photo = ? WHERE ID_scenarist = ?");
                    $update_photo->execute([$scenarist_name_photo, $ID_scenarist]);
                }else{
                    echo "problème lors du déplacement de l'image dans le serveur";
                }
            }else{
                echo "image non modifiée";
            }
            


        



    }
}

?>