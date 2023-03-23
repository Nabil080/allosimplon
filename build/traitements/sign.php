<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
?>

<?php

$errors = array();

// verif syntaxe email
if(empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    $errors['email']="L'email est invalide";
}else{
    // verif email unique
    $verif_mail=$con->prepare("SELECT ID_user FROM user WHERE user_email = ? ");
    $verif_mail->execute([$_POST['email']]);
    $email_row=$verif_mail->fetch();
    if($email_row){
        $errors['email']="L'adresse mail existe déjà";
    }
}
if(empty($_POST['password']) || $_POST['password']!=$_POST['password_verif']
// || !preg_match('/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$_POST['password'])
){
    $errors['mdp']="Les mots de passes ne sont pas assez forts ou ne correspondent pas.";
}



if(empty($errors)){
    // Insère l'utilisateur dans la bdd
    $request=$con->prepare("INSERT INTO user SET user_email = ?, user_password = ?, ID_role = ?");
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $request->execute([$_POST['email'], $password, 1]);
    echo "<p>inscription reussie</p>";
    header('location: /portfolio/allosimplon/build/index.php');
}else{
    echo '<pre>'.print_r($errors,true).'<pre>';

}

?>
