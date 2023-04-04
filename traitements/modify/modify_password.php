
<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
$errors = array();
$ID = $_SESSION['ID_user'];
$old_password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );
$password_verif = htmlspecialchars(strip_tags($_POST['password_verif']), ENT_QUOTES );
$new_password = trim(htmlspecialchars(strip_tags($_POST['new_password']), ENT_QUOTES ));


if(password_verify($old_password,$_SESSION['user_password'])){
    if($new_password == $password_verif){
        $password_hash=password_hash($new_password,PASSWORD_BCRYPT);
        $request=$con->prepare("UPDATE user SET user_password = ? WHERE ID_user = $ID");
        $request->execute([$password_hash]);
        $_SESSION['password']=$password_hash;
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=update_password");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=update_password");
            }
    }else{
        $errors['password']="Les mots de passe ne correspondent pas";
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=password_verif_error");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=password_verif_error");
            }
    }
}else{
    $errors['password']="Mot de passe incorrect";
    if(strpos($_SERVER['HTTP_REFERER'],"?")){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=wrong_password");
        }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=wrong_password");
        }
}


?>
