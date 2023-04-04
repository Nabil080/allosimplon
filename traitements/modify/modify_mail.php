<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
$errors = array();
$ID = $_SESSION['ID_user'];
    $email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES );
    $email_verif = htmlspecialchars(strip_tags($_POST['email_verif']), ENT_QUOTES );
    $password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );

// var_dump($ID);
// var_dump($email);
// var_dump($email_verif);
// var_dump($password);

if(password_verify($password,$_SESSION['user_password'])){
    if($email == $email_verif){
        $request=$con->prepare("UPDATE user SET user_email = ? WHERE ID_user = $ID");
        $request->execute([$email]);
        $_SESSION['user_email']=$email;
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=update_mail");
    }else{
        $errors['email']="Les emails ne correspondent pas";
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=mail_verif_error");
    }
}else{
    $errors['password']="Mot de passe incorrect";
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=wrong_password");
}


?>

