

<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
?>

<?php
// Variables + sécurisation
$errors = array();
$ID = $_SESSION['ID_user'];
    $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES );
    $password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );

// var_dump($ID);
// var_dump($email);
// var_dump($email_verif);
// var_dump($password);

if(password_verify($password,$_SESSION['user_password'])){
        $request=$con->prepare("UPDATE user SET user_pseudo = ? WHERE ID_user = $ID");
        $request->execute([$pseudo]);
        var_dump($pseudo);
        $_SESSION['user_pseudo']=$pseudo;
}else{
    $errors['password']="Mot de passe incorrect";
}

echo '<pre>'.print_r($errors,true).'<pre>';

?>

