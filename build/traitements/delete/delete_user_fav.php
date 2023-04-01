<?php session_start();
require_once '../../config/connexion.php';
require_once '../../config/functions.php';

DeleteFav();
echo "<script>window.location.replace(document.referrer);</script>";

?>