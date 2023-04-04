<?php session_start();
require_once '../config/connexion.php';
$search=$_GET['search'];
if(empty($_SESSION['filters'])){
    $url = "/portfolio/allosimplon/content/catalogue.php?";
  }else{
    $url = "/portfolio/allosimplon/content/catalogue.php?" . $_SESSION['filters']  . "&";
  }
header('Location:'.$url.'search='.$search);
?>