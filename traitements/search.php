<?php session_start();
require_once '../config/connexion.php';
$search=trim(htmlspecialchars(strip_tags($_GET['search'])),ENT_QUOTES);
if(empty($_SESSION['filters'])){
    $url = "/portfolio/allosimplon/content/catalogue.php?";
  }else{
    $url = "/portfolio/allosimplon/content/catalogue.php?" . $_SESSION['filters']  . "&";
  }
header('Location:'.$url.'search='.$search);
?>