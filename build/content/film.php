<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
require_once '../config/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/portfolio/allosimplon/build/css/output.css">
    <link rel="stylesheet" href="/Portfolio/allosimplon/src/input.css">
    <link rel="icon" type="image/x-icon" href="/portfolio/allosimplon/build/img/popcorn.png">
    <script>
        tailwind.config = {
            theme: {
    extend: {
      colors:{
        'main': {
          light: '#00A9A5',
          default: '#0B5351',
          dark: '#092327',
          hover: '#1B7673',
      },
      }
    },
  },
        }
      </script>
    <title>Cinemet</title>
</head>

<?php $ID_film = $_GET['page'];
$request=GetOneFilm($ID_film);
$film=$request->fetch();
// var_dump($film);

?>

<body class="bg-main-dark text-gray-100 bg-cover bg-center bg-fixed bg-no-repeat " style="background-image:url(/portfolio/allosimplon/build/upload/film/<?=$film['film_background']?>)">

<?php include('../include/general/nav.php')?>



<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl drop-shadow-lg "><?=$film['film_name']?></h1>
</div>


<!-- PAGE FILM -->
<section class="mx-auto w-[60%]  border relative bg-main-dark">
<!-- AJOUTER/RETIRER FAVORIS -->
    <button class="absolute -top-12 right-4 text-main-light text-xl flex text-center gap-2"> Ajouter aux favoris <i class="fa-regular fa-heart relative group text-2xl"><i class="fa-solid fa-heart absolute hidden group-hover:block top-0 left-0 text-2xl"></i></i></button>
<!-- GRILLE -->
    <div class="block md:grid md:grid-cols-2 gap-8  ">
        <div class="p-8">
            <img src="/portfolio/allosimplon/build/upload/film/<?=$film['film_photo']?>" class="" alt="">
        </div>
        <div class="[&>*]:my-4 my-8 relative">
            <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Nom d'origine : </p><span class="font-normal"><?=$film['film_name']?></span></div>
            <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Date de sortie : </p><span class="font-normal"><?=$film['film_date']?></span></div>
            <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Durée du film : </p><span class="font-normal"><?=$film['film_time']?></span></div>
            <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Genres : </p>
                <?php $request=GetOneGenre($ID_film);
                while($genres=$request->fetch()){
                    $genre_info=$con->prepare("SELECT * from genre WHERE ID_genre = ?");
                    $genre_info->execute([$genres['ID_genre']]);
                    while($genre=$genre_info->fetch()){?>
                        <a href="/portfolio/allosimplon/build/" class="text-main-light hover:text-main-hover font-normal"><?=$genre['genre_name']?></a>
                <?php }
                } ?>
            </div>
            <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-3"><p class="underline ">Acteurs principaux : </p>


                <?php $request=GetOneActor($ID_film);
                while($actors=$request->fetch()){
                    $actor_info=$con->prepare("SELECT * from actor WHERE ID_actor = ?");
                    $actor_info->execute([$actors['ID_actor']]);
                    while($actor=$actor_info->fetch()){?>
                    <a href="/portfolio/allosimplon/build/" class="text-main-light relative hover:text-main-hover hover:underline font-normal group">
                        <!-- overlay acteur -->
                        <div class="opacity-0 pointer-events-none group-hover:opacity-100 -translate-y-20 group-hover:-translate-y-0  group-hover:linear duration-500  absolute bottom-10 w-24 aspect-square object-cover ">
                            <img class="w-full h-auto" src="/portfolio/allosimplon/build/upload/actor/<?=$actor['actor_photo']?>">
                        </div>
    
                        <?=$actor['actor_name']?>
                    </a>
                <?php }
                } ?>
            </div>
        <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Réalisateurs : </p><span class="font-normal">
        <?php $request=GetOneRealisator($ID_film);
                while($realisators=$request->fetch()){
                    $realisator_info=$con->prepare("SELECT * from realisator WHERE ID_realisator = ?");
                    $realisator_info->execute([$realisators['ID_realisator']]);
                    while($realisator=$realisator_info->fetch()){?>
                    <a href="/portfolio/allosimplon/build/" class="text-main-light relative hover:text-main-hover hover:underline font-normal group">
                        <!-- overlay réalisateur -->
                        <div class="opacity-0 pointer-events-none group-hover:opacity-100 -translate-y-20 group-hover:-translate-y-0  group-hover:linear duration-500 absolute bottom-10 w-24 aspect-square object-cover">
                            <img class="w-full h-auto" src="/portfolio/allosimplon/build/upload/realisator/<?=$realisator['realisator_photo']?>">
                        </div>
                    <?=$realisator['realisator_name']?>
                </a>
                <?php }
                } ?>
            </div>
            <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Scénaristes : </p><span class="font-normal">
        <?php $request=GetOneScenarist($ID_film);
                while($scenarists=$request->fetch()){
                    $scenarist_info=$con->prepare("SELECT * from scenarist WHERE ID_scenarist = ?");
                    $scenarist_info->execute([$scenarists['ID_scenarist']]);
                    while($scenarist=$scenarist_info->fetch()){?>
                    <a href="/portfolio/allosimplon/build/" class="text-main-light relative hover:text-main-hover hover:underline font-normal group">
                        <!-- overlay scénariste -->
                        <div class="opacity-0 pointer-events-none group-hover:opacity-100 translate-y-20 group-hover:translate-y-0  group-hover:linear duration-500 absolute top-10 w-24 aspect-square object-cover">
                            <img class="w-full h-auto" src="/portfolio/allosimplon/build/upload/scenarist/<?=$scenarist['scenarist_photo']?>">
                        </div>
                    
                    <?=$scenarist['scenarist_name']?>
                </a>
                <?php }
                } ?>
            </div>
            <div class="font-bold text-xl flex flex-wrap gap-y-4 gap-x-2 absolute bottom-0"><p class="underline ">Note : </p>
                <span class="font-normal text-main-light">
                    <i class="fa-solid fa-star cursor-pointer"></i>
                    <i class="fa-solid fa-star cursor-pointer"></i>
                    <i class="fa-solid fa-star cursor-pointer"></i>
                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                </span></div>
        </div>
    </div>
<div class="px-8 font-bold text-xl space-x-6"><p class="underline float-left">Synopsis : </p><span class="font-normal"><?=$film['film_description']?></span></div>
<!-- IFRAME -->
<div class="p-8 flex place-content-center">
    <iframe class="w-full aspect-video" src="<?=$film['film_video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
</section>


<!-- FILMS SIMILAIRES -->
<div class="flex justify-center mt-28 mb-6">
    <h1 class="font-bold text-4xl">Films similaires</h1>
    </div>
    
    <!-- CAROUSEL -->
    <section id="five car" class="">
        <div id="dark-carousel" class="relative flex" data-carousel="static">
    
            <!-- BOUTON PREV -->
            <div class="grow flex justify-end">
                <button type="button" class="z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-100 sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="sr-only">Previous</span>
                </span>
                </button>
    
            </div>
            <!-- Carousel wrapper -->
            <div class="relative h-[40vh] w-[80%] mx-auto overflow-hidden rounded-lg  md:h-96">
    
                <!-- Item 1 -->
                <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                        <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                <img src="/portfolio/allosimplon/build/img/1.jpg" class="h-full mx-auto">
                            </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/2.jpg" class="hidden md:block h-full">
                                </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/3.jpg" class="hidden lg:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/4.jpg" class="hidden xl:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/4.jpg" class="hidden 2xl:block h-full"
                                    ></div>
                        </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                        <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                <img src="/portfolio/allosimplon/build/img/6.jpg" class="h-full mx-auto">
                            </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/7.jpg" class="hidden md:block h-full">
                                </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/8.jpg" class="hidden lg:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/9.jpg" class="hidden xl:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/10.jpg" class="hidden 2xl:block h-full"
                                    ></div>
                        </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                        <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                <img src="/portfolio/allosimplon/build/img/1.jpg" class="h-full mx-auto">
                            </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/2.jpg" class="hidden md:block h-full">
                                </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/3.jpg" class="hidden lg:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/4.jpg" class="hidden xl:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/4.jpg" class="hidden 2xl:block h-full"
                                    ></div>
                        </div>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                        <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                <img src="/portfolio/allosimplon/build/img/6.jpg" class="h-full mx-auto">
                            </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/7.jpg" class="hidden md:block h-full">
                                </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/8.jpg" class="hidden lg:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/9.jpg" class="hidden xl:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/10.jpg" class="hidden 2xl:block h-full"
                                    ></div>
                        </div>
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                        <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                <img src="/portfolio/allosimplon/build/img/1.jpg" class="h-full mx-auto">
                            </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/2.jpg" class="hidden md:block h-full">
                                </div>
                            <div class="h-full relative group">
                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <!-- IMAGE -->
                                    <img src="/portfolio/allosimplon/build/img/3.jpg" class="hidden lg:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/4.jpg" class="hidden xl:block h-full">
                                </div>
                            <div class="h-full relative group">
                                    <!-- IMAGE -->
                                                                <!-- OVERLAY!!! -->
                                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                    <div class="relative w-full h-full flex flex-col justify-between">
                                        <p class="font-bold text-xl cursor-dark">2022</p>
                                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                        </i>
                                        <div>
                                            <div class="flex justify-start">
                                                <a href="/portfolio/allosimplon/build/content/film.php" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                            </div>
                                            <div class="flex justify-start">
                                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                                </p>
                                            </div>
                                            <div class="flex justify-center mt-6 mb-2">
                                                <div class="grade text-main-light z-50 text-2xl">
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <img src="/portfolio/allosimplon/build/img/4.jpg" class="hidden 2xl:block h-full"
                                    ></div>
                        </div>
                </div>




            </div>

            <!-- BOUTON NEXT -->
            <div class="grow flex justify-start">
                <button type="button" class="z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                        <svg aria-hidden="true" class="w-5 h-5 text-main-white sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke-height="20" d="M9 5l7 7-7 7"></path></svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

    </div>
    </section>


    <?php include('../include/general/footer.php')?>
