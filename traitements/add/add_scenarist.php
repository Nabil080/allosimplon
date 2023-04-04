<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if($_POST['submit']){
$scenarist_name = htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES );
if(empty($scenarist_name)){
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=missing_element");
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
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=size-error");
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
        $scenarist_name_photo = uniqid() . '.' . $file_type;

        $upload_dir = '../../upload/scenarist/';
        if(move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $scenarist_name_photo)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=move_file");

        $add_scenarist_request=$con->prepare(
            "INSERT INTO
                scenarist
            SET
                scenarist_name = ?, scenarist_photo = ?");
        $add_scenarist_request->execute([ $scenarist_name, $scenarist_name_photo]);

        header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=add_scenarist");

    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=move_file_error");
        die();
    }
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=file_error");
    die();
}


}
}else{
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=no_form");
    die();
}




?>