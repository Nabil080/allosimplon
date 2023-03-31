<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
require_once '../config/functions.php';

$search=$_GET['search'];

if(empty($_SESSION['filters'])){
    $url = "/portfolio/allosimplon/build/content/catalogue.php?";
  }else{
    $url = "/portfolio/allosimplon/build/content/catalogue.php?" . $_SESSION['filters']  . "&";
  }

header('Location:'.$url.'search='.$search);

?>