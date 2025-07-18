<?php
session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
$errors = array();
$ID = $_SESSION['ID_user'];
$email = trim(htmlspecialchars(strip_tags($_POST['email']), ENT_QUOTES));
$email_verif = trim(htmlspecialchars(strip_tags($_POST['email_verif']), ENT_QUOTES));
$password = trim(htmlspecialchars(strip_tags($_POST['password']), ENT_QUOTES));

if (empty($email) || empty($email_verif) || empty($password)) {
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=missing_element');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=missing_element');
    }
} else {
    if (password_verify($password, $_SESSION['user_password'])) {
        if ($email == $email_verif) {
            $request = $con->prepare("UPDATE user SET user_email = ? WHERE ID_user = $ID");
            $request->execute([$email]);
            $_SESSION['user_email'] = $email;
            if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=update_mail');
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=update_mail');
            }
        } else {
            $errors['email'] = 'Les emails ne correspondent pas';
            if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=mail_verif_error');
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=mail_verif_error');
            }
        }
    } else {
        $errors['password'] = 'Mot de passe incorrect';
        if (strpos($_SERVER['HTTP_REFERER'], '?')) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=wrong_password');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=wrong_password');
        }
    }
}

?>

