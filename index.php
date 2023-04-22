<?php session_start();
require_once 'config/connexion.php';
require_once 'config/functions.php';
?>

<?php include('include/general/head.php')?>

<?php include('include/general/nav.php')?>

    <!-- <div class=" mt-28">
    <?php
    var_dump($_SESSION);
    ?>
    </div> -->


<?php include('include/unique/top_film_slide.php')?>

<?php include('include/unique/last_film_slide.php')?>

<?php include('include/unique/random_film_slide.php')?>

<div class="flex justify-center mt-5 lg:mt-10 mb-6 reveal">
<h1 class="font-bold text-xl lg:text-2xl">Et bien d'autres !</h1>
</div>
<div class="flex justify-center mt-2 reveal">
<a href="/portfolio/allosimplon/content/catalogue.php"><button class="p-4 bg-main-light rounded-xl hover:bg-main-hover hover:border">Parcourez notre catalogue</button></a>
</div>


<?php include('include/general/footer.php')?>

