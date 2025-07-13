<?php
session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if ($_POST['submit']) {
    $actor_name = trim(htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES));
    if (empty($actor_name)) {
        die();
    } else {
        if (isset($_FILES['photo']['name']) && $_FILES['photo']['error'] == 0) {
            $nameFile = $_FILES['photo']['name'];
            $typeFile = $_FILES['photo']['type'];
            $tmpFile = $_FILES['photo']['tmp_name'];
            $errorFile = $_FILES['photo']['error'];
            $sizeFile = $_FILES['photo']['size'];

            $max_size = 20000000;
            $extensions = ['png', 'jpg', 'jpeg', 'gif', 'jiff'];

            if ($sizeFile > $max_size) {
                if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=size_error');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=size_error');
                }
                die();
            }

            $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
            $file_type = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
            if (!in_array($file_type, $allowed_types)) {
                if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=format_error');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=format_error');
                }
                die();
            }

            $extension = explode('.', $nameFile);
            if (!count($extension) <= 2 && !in_array(strtolower(end($extension)), $extensions)) {
                if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=format_error');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=format_error');
                }
            }

            $actor_name_photo = uniqid() . '.' . $file_type;

            $upload_dir = '../../upload/actor/';
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $actor_name_photo)) {
                echo 'le fichier est dans le serveur <br>';  // Le fichier a été correctement déplacé

                if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=move_file');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=move_file');
                }

                // Redirect to previous page
                // echo "<script>window.location.replace(document.referrer);</script>";

                $add_actor_request = $con->prepare(
                    'INSERT INTO
                actor
            SET
                actor_name = ?, actor_photo = ?'
                );
                $add_actor_request->execute([$actor_name, $actor_name_photo]);

                if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=add_actor');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=add_actor');
                }
            } else {
                if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=move_file_error');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=move_file_error');
                }
                die();
            }
        } else {
            if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=file_error');
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=file_error');
            }
        }
    }
} else {
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=no_form');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=no_form');
    }
}

?>
