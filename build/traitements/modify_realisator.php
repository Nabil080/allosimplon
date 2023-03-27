<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    echo "venez depuis le formulaire de modification du réalisateur";
}else{
$realisator_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
$ID_realisator = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);
$ID_film_array = ($_POST['film']);

if(
    empty($realisator_name) ||
    empty($ID_film_array)
    ){
    echo 'un élément est manquant';
    }else{

        $add_realisator_request=$con->prepare(
            "UPDATE
                realisator
            SET
                realisator_name = ?
            WHERE
                ID_realisator = ?");
    
        $add_realisator_request->execute([$realisator_name, $ID_realisator]);
    
        // Suppression des éléments dans les tables de liaisons
        $delete_realisator_film=$con->prepare("DELETE FROM film_realisator WHERE ID_realisator = ?");
        $delete_realisator_film->execute([$ID_realisator]);

    foreach($ID_film_array as $ID_film){
        $add_realisator_request=$con->prepare(
            "INSERT
                film_realisator
            SET
            ID_film = ?, ID_realisator = ? ");
        $add_realisator_request->execute([ $ID_film, $ID_realisator]);
    }

        echo "L'acteur a été modifié.";
        echo'<br> ID acteurs : <br>';
        var_dump($ID_realisator);

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
        
                $realisator_name_photo = uniqid() . '.' . $file_type;
            
                $upload_dir = '../img/';
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $realisator_name_photo)) {
                    echo 'le fichier est dans le serveur';// Le fichier a été correctement déplacé


                    $update_photo=$con->prepare("UPDATE realisator SET realisator_photo = ? WHERE ID_realisator = ?");
                    $update_photo->execute([$realisator_name_photo, $ID_realisator]);
                }else{
                    echo "problème lors du déplacement de l'image dans le serveur";
                }
            }else{
                echo "image non modifiée";
            }
            


        



    }
}

?>