<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
?>

<?php
// Variables + sécurisation
$errors = array();
$ID = $_SESSION['ID_user'];
if(isset($_POST['submit'])){
    $email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES );
    $email_verif = htmlspecialchars(strip_tags($_POST['email_verif']), ENT_QUOTES );
    $password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );
}

// var_dump($ID);
// var_dump($email);
// var_dump($email_verif);
// var_dump($password);

if(password_verify($password,$_SESSION['user_password'])){
    if($email == $email_verif){
        $request=$con->prepare("UPDATE user SET user_mail = ? WHERE ID_user = $ID");
        $request->execute([$email]);
        var_dump($email);
    }else{
        $errors['email']="Les emails ne correspondent pas";
    }
}else{
    $errors['password']="Mot de passe incorrect";
}

echo '<pre>'.print_r($errors,true).'<pre>';
