<?php
session_start();
require_once '../config/connexion.php';
if(isset($_POST['modify_comment'])){
    // handle modify comment action
    $ID_comment = $_POST['ID_comment'];
    $new_message = htmlspecialchars(strip_tags($_POST['new_message']), ENT_QUOTES);
    if(empty($new_message)){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=empty_comment");
        die();
    }else{
        $update_comment_request=$con->prepare("UPDATE comment SET comment_message = ? WHERE ID_comment = ?");
        $update_comment_request->execute([$new_message, $ID_comment]);
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=update_comment");
    }
} elseif(isset($_POST['delete_comment'])){
    // handle delete comment action
    $ID_comment = $_POST['ID_comment'];
    $delete_comment_request=$con->prepare("DELETE FROM comment WHERE ID_comment = ?");
    $delete_comment_request->execute([$ID_comment]);
    header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=delete_comment");

} elseif(isset($_POST['report_comment'])){
    // handle report comment action
    $ID_comment = $_POST['ID_comment'];
    // perform necessary actions for reporting comment
    $report_comment_request=$con->prepare("UPDATE comment SET comment_reports = comment_reports + 1 WHERE ID_comment = ?");
    $report_comment_request->execute([$ID_comment]);
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=report_comment");

} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']. "?&message=invalid");
}
?>
