<?php session_start();
require_once '../config/connexion.php';
require_once '../config/functions.php';

if(isset($_POST['message'])){
    $name=htmlspecialchars(strip_tags(($_POST['name']),ENT_QUOTES));
    $email=htmlspecialchars(strip_tags(($_POST['mail']),ENT_QUOTES));
    $objet=htmlspecialchars(strip_tags(($_POST['objet']),ENT_QUOTES));
    $message=htmlspecialchars(strip_tags(($_POST['message']),ENT_QUOTES));


    if(!empty($name)&&!empty($email)&&!empty($objet)&&!empty($message)){
        $to = "bellinabil8@gmail.com";
        $email_subject = $objet;
        $bodyParagraphs = ["Name: {$name}", "Email: {$email}", "Message:", $message];
        $email_body = join(PHP_EOL, $bodyParagraphs);
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=utf-8'];
        if (mail($to, $email_subject, $email_body, $headers)){
            echo 'mail envoyé';
            echo "<script> alert( 'Le mail a bien été envoyé' ) ; window.location.replace(document.referrer) ; </script>";
            } else {
            echo "<script> alert( 'Le mail n'a pas pu être envoyé' ) ; window.location.replace(document.referrer) ; </script>";
                echo 'Oops, c\'est pas envoyé :/';
            }
    }

}


?>