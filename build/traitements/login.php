
<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
?>

<?php
// Variables + sécurisation
$errors = array();
    $email = htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES );
    $password = htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES );

// Verif email valide
if(empty($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']= "Email invalide";
}else{
// Verif email présent en BDD

    $verif_mail=$con->prepare("SELECT ID_user FROM user WHERE user_email = ?");
    $verif_mail->execute([$email]);
    $email_row=$verif_mail->fetch();
    $bool="false";
    if($email_row){
        $bool="true";
        $ID = $email_row['ID_user'];
    }else{
        $errors['email']="L'email n'existe pas dans nos serveurs";
    }
}

if($bool=="true"){
    $request=$con->prepare("SELECT * FROM user WHERE ID_user = $ID");
    $request->execute();
    $user_row=$request->fetch();
    if(password_verify($password,$user_row['user_password'])){
        $_SESSION['ETAT'] = "connected";
        echo 'Connexion réussie <br> <a href="/portfolio/allosimplon/build/index.php">accueil</a>';
        $_SESSION['ID_user'] = $user_row['ID_user'];
        $_SESSION['user_pseudo'] = $user_row['user_pseudo'];
        $_SESSION['user_email'] = $user_row['user_email'];
        $_SESSION['user_password'] = $user_row['user_password'];
        $_SESSION['ID_role'] = $user_row['ID_role'];
        header('Location: ../index.php');
        $connected = "true";

    }else{
        $_SESSION['ETAT'] = "not connected";
        echo 'Connexion échouée'; echo '<br> mdp incorrect';
        var_dump($password);
        // header('Location: ../index.php');
        echo '<a href="/portfolio/allosimplon/build/index.php">accueil</a>';
    }
}
    echo '<pre>'.print_r($errors,true).'<pre>';



?>

