<?php
session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
$errors = array();
// $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES );
$email = trim(htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES));
$pseudo = trim(htmlspecialchars(strip_tags($_POST['pseudo']), ENT_QUOTES));
$password = trim(htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES));
$password_verif = trim(htmlspecialchars(strip_tags($_POST['password_verif']), ENT_QUOTES));

// verif syntaxe email
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "L'email est invalide";
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=mail_invalid');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=mail_invalid');
    }
} else {
    // verif email unique
    $verif_mail = $con->prepare('SELECT ID_user FROM user WHERE user_email = ? ');
    $verif_mail->execute([$email]);
    $email_row = $verif_mail->fetch();
    if ($email_row) {
        $errors['email'] = "L'adresse mail existe déjà";
        if (strpos($_SERVER['HTTP_REFERER'], '?')) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=mail_existing');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=mail_existing');
        }
    }
}
if (empty($password) || $password != $password_verif
// || !preg_match('/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/',$password)
) {
    $errors['mdp'] = 'Les mots de passes ne sont pas assez forts ou ne correspondent pas.';
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=size_verif_password');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=size_verif_password');
    }
}

if (empty($pseudo) || strlen($pseudo) > 10) {
    $errors['pseudo'] = 'Pseudo trop long ou invalide (16 charactères maximum)';
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=size_pseudo');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=size_pseudo');
    }
}

if (empty($errors)) {
    // Insère l'utilisateur dans la bdd
    $request = $con->prepare('INSERT INTO user SET user_pseudo = ?, user_email = ?, user_password = ?, ID_role = ?');
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $request->execute([$pseudo, $email, $password_hash, 2]);
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=inscrit');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=inscrit');
    }
}

?>
