<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
$errors = array();
$ID = $_SESSION['ID_user'];
    $pseudo = trim(htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES ));
    $password = trim(htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES ));

// var_dump($ID);
// var_dump($email);
// var_dump($email_verif);
// var_dump($password);
if(empty($pseudo) || strlen($pseudo) > 10){
    $errors['pseudo']="Pseudo trop long ou invalide (16 charactères maximum)";
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=size_pseudo");

}else{
if(password_verify($password,$_SESSION['user_password'])){
        $request=$con->prepare("UPDATE user SET user_pseudo = ? WHERE ID_user = $ID");
        $request->execute([$pseudo]);
        $_SESSION['user_pseudo']=$pseudo;
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=update_pseudo");
}else{
    $errors['password']="Mot de passe incorrect";
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=wrong_password");
}
}
?>

