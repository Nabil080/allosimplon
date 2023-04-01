<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if($_POST['submit']){
$actor_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
if(empty($actor_name)){
    echo "Des éléments sont manquants";
    var_dump($actor_name);
    var_dump($_POST);
    die();
}else{
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

        $actor_name_photo = uniqid() . '.' . $file_type;

        $upload_dir = '../../upload/actor/';
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $actor_name_photo)) {
            echo 'le fichier est dans le serveur <br>';// Le fichier a été correctement déplacé

        echo "L'acteur a bien été ajouté <br>";
        

        // Redirect to previous page
        // echo "<script>window.location.replace(document.referrer);</script>";

        $add_actor_request=$con->prepare(
            "INSERT INTO
                actor
            SET
                actor_name = ?, actor_photo = ?");
        $add_actor_request->execute([ $actor_name, $actor_name_photo]);

        var_dump ($add_actor_request);

        header('Location: ../../content/crud.php');
        

    }else{
        echo "Le fichier n'a pas pu être déplacé dans le serveur";
        die();
    }
}else{
    echo "erreur avec l'image";
    var_dump($_FILES);
    die();
}


}
}else{
    echo "venez depuis le formulaire d'ajout de film";
    var_dump($_POST);
    die();
}




?>