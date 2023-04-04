<?php session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if(isset($_GET)){
    $note=htmlspecialchars($_GET['note'],ENT_QUOTES);
    $film=htmlspecialchars($_GET['film'],ENT_QUOTES);
    $user=$_SESSION['ID_user'];
    if(!empty($note)&&!empty($film)){
        $verify_user_note_request=$con->prepare("SELECT ID_note FROM film_note WHERE ID_film = ? AND ID_user = ?");
        $verify_user_note_request->execute([$film,$user]);
        $verify_user_note=$verify_user_note_request->fetch();
        if(!empty($verify_user_note)){

            $update_note_request=$con->prepare("UPDATE film_note SET note = ? WHERE ID_film = ? AND ID_user = ?g");
            $update_note_request->execute([$note,$film,$user]);
            if(strpos($_SERVER['HTTP_REFERER'],"?")){
                header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=update_note");
                }else{
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=update_note");
                    }
        }else{

            $add_note_request=$con->prepare("INSERT INTO film_note (ID_film, ID_user, note) VALUES (?, ?, ?)");
            $add_note_request->execute([$film,$user,$note]);
            if(strpos($_SERVER['HTTP_REFERER'],"?")){
                    header('Location: ' . $_SERVER['HTTP_REFERER']. "&message=add_note");
                    }else{
                        header('Location: ' . $_SERVER['HTTP_REFERER']. "?message=add_note");
                        }
                }
        }
}else{
}