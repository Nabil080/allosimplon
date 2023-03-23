<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
?>

<?php
// Variables + sécurisation
$errors = array();
if(isset($_POST['submit'])){
    // $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES );
    $email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES );
    $password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );
    $password_verif = htmlspecialchars(strip_tags($_POST['password_verif']), ENT_QUOTES );
}

// verif syntaxe email
if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']="L'email est invalide";
}else{
    // verif email unique
    $verif_mail=$con->prepare("SELECT ID_user FROM user WHERE user_email = ? ");
    $verif_mail->execute([$email]);
    $email_row=$verif_mail->fetch();
    if($email_row){
        $errors['email']="L'adresse mail existe déjà";
    }
}
if(empty($password) || $password!=$password_verif
// || !preg_match('/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$password)
){
    $errors['mdp']="Les mots de passes ne sont pas assez forts ou ne correspondent pas.";
}

// if(empty($pseudo) || strlen($pseudo) > 16){
//     $errors['pseudo']="Pseudo trop long ou invalide (16 charactères maximum)";
// }

if(empty($errors)){
    // Insère l'utilisateur dans la bdd
    $request=$con->prepare("INSERT INTO user SET user_email = ?, user_password = ?, ID_role = ?");
    $password_hash=password_hash($password,PASSWORD_BCRYPT);
    $request->execute([$email, $password_hash, 2]);
    echo "<p>inscription reussie</p>";
    header('location: /portfolio/allosimplon/build/index.php');
}else{
    echo '<pre>'.print_r($errors,true).'<pre>';

}

?>
