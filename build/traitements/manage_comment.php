<?php
session_start();
require_once '../config/connexion.php';
if(isset($_POST['modified_comment'])){
    // handle modify comment action
    $ID_comment = $_POST['ID_comment'];
    $modified_comment = trim(htmlspecialchars(strip_tags($_POST['modified_comment']), ENT_QUOTES));
    if(empty($modified_comment)){
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=missing_element");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=missing_element");
            }
        die();
    }else{
        $update_comment_request=$con->prepare("UPDATE comment SET comment_message = ? WHERE ID_comment = ?");
        $update_comment_request->execute([$modified_comment, $ID_comment]);
        if(strpos($_SERVER['HTTP_REFERER'],"?")){
            header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=update_comment");
            }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=update_comment");
            }
    }
} elseif(isset($_POST['delete_comment'])){
    // handle delete comment action
    $ID_comment = $_POST['ID_comment'];
    $delete_comment_request=$con->prepare("DELETE FROM comment WHERE ID_comment = ?");
    $delete_comment_request->execute([$ID_comment]);
    if(strpos($_SERVER['HTTP_REFERER'],"?")){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=delete_comment");
        }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=delete_comment");
        }

} elseif(isset($_POST['report_comment'])){
    // handle report comment action
    $ID_comment = $_POST['ID_comment'];
    // perform necessary actions for reporting comment
    $report_comment_request=$con->prepare("UPDATE comment SET comment_reports = comment_reports + 1 WHERE ID_comment = ?");
    $report_comment_request->execute([$ID_comment]);
    if(strpos($_SERVER['HTTP_REFERER'],"?")){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=report_comment");
        }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=report_comment");
        }

} else {
    if(strpos($_SERVER['HTTP_REFERER'],"?")){
        header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=invalid");
        }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=invalid");
        }
}
?>
