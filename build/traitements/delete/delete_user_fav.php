<?php session_start();
require_once '../../config/connexion.php';
require_once '../../config/functions.php';

DeleteFav();
header('Location: ' . $_SERVER['HTTP_REFERER'])
?>