
<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../../config/connexion.php';
?>

<?php
// Variables + sécurisation
$errors = array();
$ID = $_SESSION['ID_user'];
$old_password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );
$password_verif = htmlspecialchars(strip_tags($_POST['password_verif']), ENT_QUOTES );
$new_password = htmlspecialchars(strip_tags($_POST['new_password']), ENT_QUOTES );

// var_dump($ID);
// var_dump($email);
// var_dump($email_verif);
// var_dump($password);

if(password_verify($old_password,$_SESSION['user_password'])){
    if($new_password == $password_verif){
        $password_hash=password_hash($new_password,PASSWORD_BCRYPT);
        $request=$con->prepare("UPDATE user SET user_password = ? WHERE ID_user = $ID");
        $request->execute([$password_hash]);
        var_dump($new_password);
        var_dump($password_hash);

        $_SESSION['password']=$password_hash;
    }else{
        $errors['password']="Les mots de passe ne correspondent pas";
    }
}else{
    $errors['password']="Mot de passe incorrect";
}

echo '<pre>'.print_r($errors,true).'<pre>';

?>
