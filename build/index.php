<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'config/connexion.php';
?>

<?php include('include/general/head.php')?>

<?php include('include/general/nav.php')?>

    <div class=" mt-28">
    <?php
    var_dump($_SESSION);
    ?>
    </div>


<?php include('include/unique/top_film_slide.php')?>

<?php include('include/unique/last_film_slide.php')?>

<?php include('include/unique/random_film_slide.php')?>

<?php include('include/general/footer.php')?>