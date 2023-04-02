<?php session_start();
require_once '../../config/connexion.php';
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
if(empty($pseudo) || strlen($pseudo) > 10){
    $errors['pseudo']="Pseudo trop long ou invalide (16 charactères maximum)";
    echo "<script>alert('Pseudo trop long ou invalide'); window.location.replace(document.referrer);</script>";
}else{
if(password_verify($password,$_SESSION['user_password'])){
        $request=$con->prepare("UPDATE user SET user_pseudo = ? WHERE ID_user = $ID");
        $request->execute([$pseudo]);
        var_dump($pseudo);
        $_SESSION['user_pseudo']=$pseudo;
}else{
    $errors['password']="Mot de passe incorrect";
}
}
echo '<pre>'.print_r($errors,true).'<pre>';

?>

