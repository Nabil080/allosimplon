<div class="text-red-400 mt-24"><?php
require('config/connexion.php');
session_start();

echo '<br> echo root server';
echo $_SERVER['DOCUMENT_ROOT'];
echo '<br> dump server';
var_dump($_SERVER);

$path = $_SERVER['DOCUMENT_ROOT'];


?></div>

<?php include('include/head.php')
?>

<?php
include($path . "/portfolio/allosimplon/build/include/nav.php")
?>

<?php
include('include/top_film_slide.php')
?>

<?php
include('include/last_film_slide.php')
?>

<?php
include('include/random_film_slide.php')
?>

<?php
include('include/footer.php')
?>

