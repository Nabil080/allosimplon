<?php session_start();
require_once '../../config/connexion.php';
?>

<?php
// Variables + sécurisation
$errors = array();
    // $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES );
    $email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES );
    $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES );
    $password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );
    $password_verif = htmlspecialchars(strip_tags($_POST['password_verif']), ENT_QUOTES );

// verif syntaxe email
if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']="L'email est invalide";
    echo "<script>alert('L'email est invalide!'); window.location.replace(document.referrer);</script>";
}else{
    // verif email unique
    $verif_mail=$con->prepare("SELECT ID_user FROM user WHERE user_email = ? ");
    $verif_mail->execute([$email]);
    $email_row=$verif_mail->fetch();
    if($email_row){
        $errors['email']="L'adresse mail existe déjà";
        echo "<script>alert('L'adresse mail existe déjà!'); window.location.replace(document.referrer);</script>";
    }
}
if(empty($password) || $password!=$password_verif
// || !preg_match('/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$password)
){
    $errors['mdp']="Les mots de passes ne sont pas assez forts ou ne correspondent pas.";
    echo "<script>alert('Les mots de passes ne sont pas assez forts ou ne correspondent pas!'); window.location.replace(document.referrer);</script>";
}

if(empty($pseudo) || strlen($pseudo) > 16){
    $errors['pseudo']="Pseudo trop long ou invalide (16 charactères maximum)";
    echo "<script>alert('Pseudo trop long ou invalide'); window.location.replace(document.referrer);</script>";
}

if(empty($errors)){
    // Insère l'utilisateur dans la bdd
    $request=$con->prepare("INSERT INTO user SET user_pseudo = ?, user_email = ?, user_password = ?, ID_role = ?");
    $password_hash=password_hash($password,PASSWORD_BCRYPT);
    $request->execute([$pseudo, $email, $password_hash, 2]);
    echo "<p>inscription reussie</p>";
    echo "<script>alert('Vous vous êtes inscrit avec succès!'); window.location.replace(document.referrer);</script>";
}else{
    echo '<pre>'.print_r($errors,true).'<pre>';

}

?>
