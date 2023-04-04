<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if(!isset($_POST['submit'])){
    if(strpos($_SERVER['HTTP_REFERER'],"?")){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=no_form");
        }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=no_form");
        }
}else{
$message = htmlspecialchars(strip_tags($_POST['message']), ENT_QUOTES );
$ID = htmlspecialchars(strip_tags($_POST['ID']),ENT_QUOTES);

if(empty($message)){
    if(strpos($_SERVER['HTTP_REFERER'],"?")){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=missing_element");
        }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=missing_element");
        }
}else{
        $modify_comment_request=$con->prepare(
            "UPDATE
                comment
            SET
                comment_message = ?
            WHERE
                ID_comment = ?");
        $modify_comment_request->execute([$message, $ID]);
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=update_comment");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=update_comment");
            }
    }
}

?>