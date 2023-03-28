<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../../config/connexion.php';
require_once '../../config/functions.php';

AddFav();
?>