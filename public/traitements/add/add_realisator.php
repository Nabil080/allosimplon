<?php
session_start();
require_once '../../config/connexion.php';

// Variables + sécurisation
if ($_POST['submit']) {
    $realisator_name = trim(htmlspecialchars(strip_tags($_POST['name']), ENT_QUOTES));
    if (empty($realisator_name)) {
        if (strpos($_SERVER['HTTP_REFERER'], '?')) {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=missing_element');
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=missing_element');
        }
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
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=size_erro');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=size_erro');
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

            $realisator_name_photo = uniqid() . '.' . $file_type;

            $upload_dir = '../../upload/realisator/';
            if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload_dir . $realisator_name_photo)) {
                $add_realisator_request = $con->prepare(
                    'INSERT INTO
                realisator
            SET
                realisator_name = ?, realisator_photo = ?'
                );
                $add_realisator_request->execute([$realisator_name, $realisator_name_photo]);

                if (strpos($_SERVER['HTTP_REFERER'], '?')) {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=add_realisator');
                } else {
                    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=add_realisator');
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
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=error_file');
            } else {
                header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=error_file');
            }
            die();
        }
    }
} else {
    if (strpos($_SERVER['HTTP_REFERER'], '?')) {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&message=no_form');
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '?message=no_form');
    }
    die();
}

?>
