<?php session_start();
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
<div class="absolute top-2 right-4 text-main-light text-lg flex text-center gap-8 w-fit">
    <div>
<?php
    if(isset($_SESSION['ID_user'])){isFilmFav($ID_film,$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
?>
    </div>
</div>
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
            <?php Stars($film['film_grade'])?>
                <span class="font-normal text-gray-50 text-center">
                    <?=$film['film_grade'];?>
                </span></div>
        </div>
    </div>
<div class="px-8 font-bold text-xl space-x-6"><p class="underline float-left">Synopsis : </p><span class="font-normal"><?=$film['film_description']?></span></div>
<!-- IFRAME -->
<div class="p-8 flex place-content-center">
    <iframe class="w-full aspect-video" src="<?=$film['film_video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
</section>

<?php if(isset($_SESSION['ID_role'])&&($_SESSION['ID_role']==1)){ ?>
<div class="fixed right-36 top-[48%]">
    <button class="p-4 bg-main-light rounded-xl hover:bg-main-hover hover:border" data-modal-target="modifyfilm<?=$ID_film?>" data-modal-toggle="modifyfilm<?=$ID_film?>"> MODIFIER CE FILM </button>
</div>
<!-- Modal ModifyFilm -->
<div id="modifyfilm<?=$ID_film?>"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Modifier un film
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modifyfilm<?=$ID_film?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/modify/modify_film.php" target="_blank" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du film</label>
                        <input value="<?=$film['film_name']?>" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nom du film" required="">
                    </div>
                    <div>
                        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durée</label>
                        <input value="<?=$film['film_time']?>" type="number" step=".1"  name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="120" required="">
                    </div>
                    <div>
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Année</label>
                        <input value="<?=$film['film_date']?>" type="number" step=".1"  name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2009" required="">
                    </div>
                    <div>
                        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                        <input value="<?=$film['film_grade']?>" type="number" step=".1"  name="grade" id="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="8,00" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Synopsis</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"><?=$film['film_description']?></textarea>                    
                    </div>
                    <div>
                        <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres</label>
                        <select name="genre[]" multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectedGenre($film['ID_film']) ?>
                        </select>
                    </div>
                    <div>
                        <label for="actor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acteurs</label>
                        <select name="actor[]" multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectedActor($film['ID_film']) ?>
                        </select>
                    </div>
                    <div>
                        <label for="realisator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réalisateurs</label>
                        <select name="realisator[]" multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectedRealisator($film['ID_film']) ?>
                        </select>
                    </div>
                    <div>
                        <label for="scenarist" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scénario</label>
                        <select name="scenarist[]" multiple  id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectedScenarist($film['ID_film']) ?>
                        </select>
                    </div>
                    <div class="col-start-1 col-span-2">
                        <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lien de la vidéo</label>
                        <input value="<?=$film['film_video']?>" type="url" name="video" id="video" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="iframe ytb" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affiche poster (laisser vide si besoin)</label>
                        <input value="<?=$film['film_photo']?>" type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche">
                    </div>
                    <div>
                        <label for="background" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo background (laisser vide si besoin)</label>
                        <input value="<?=$film['film_background']?>" type="file" name="background" id="background" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="belle photo">
                    </div>
                    <input type="number" step=".1"  class="hidden" value="<?=$film['ID_film']?>" name="ID" >
                </div>
                <button type="submit" name="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Modifier le film
                </button>
            </form>
        </div>
    </div>
</div>
<?php } ?>


<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Films Similaires</h1>
</div>



<?php
$similar_films=GetFilmByGenre($film['ID_film']);
?>


<?php if(!empty($similar_films[9])){?>
<!-- CAROUSEL -->
<section id="five car" class="">
    <div id="dark-carousel" class="relative flex" data-carousel="static">

        <!-- BOUTON PREV -->
        <div class="grow flex justify-end">
            <button type="button" class="z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                <svg aria-hidden="true" class="w-5 h-5 text-main-light sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
            </button>

        </div>
        <!-- Carousel wrapper -->
        <div class="relative h-[40vh] w-[80%] mx-auto overflow-hidden rounded-lg  md:h-96">

            <!-- Item 1 -->
            <?php if(!empty($similar_films[4])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[0]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[0]['film_date']?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[0]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[0]['ID_film'],$_SESSION['ID_user'],$similar_films[0]['likes']);}else{ShowFakeFav($similar_films[0]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[0]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[0]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[0]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[0]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[0]['film_grade'])?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[0]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[1]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[1]['film_date']?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[1]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[1]['ID_film'],$_SESSION['ID_user'],$similar_films[1]['likes']);}else{ShowFakeFav($similar_films[1]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[1]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[1]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[1]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[1]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[1]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[1]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[2]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[2]['film_date']?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[2]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[2]['ID_film'],$_SESSION['ID_user'],$similar_films[2]['likes']);}else{ShowFakeFav($similar_films[2]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[2]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[2]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[2]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[2]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[2]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[2]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[3]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[3]['film_date']?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[3]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[3]['ID_film'],$_SESSION['ID_user'],$similar_films[3]['likes']);}else{ShowFakeFav($similar_films[3]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[3]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[3]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[3]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[3]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[3]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[3]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[4]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[4]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[4]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[4]['ID_film'],$_SESSION['ID_user'],$similar_films[4]['likes']);}else{ShowFakeFav($similar_films[4]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[4]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[4]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[4]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[4]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[4]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[4]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                    </div>
            </div>
            <?php } ?>
            <!-- Item 2 -->
            <?php if(!empty($similar_films[9])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[5]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[5]['film_date']?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[5]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[5]['ID_film'],$_SESSION['ID_user'],$similar_films[5]['likes']);}else{ShowFakeFav($similar_films[5]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[5]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[5]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[5]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[5]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[5]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[5]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[6]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[6]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[6]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[6]['ID_film'],$_SESSION['ID_user'],$similar_films[6]['likes']);}else{ShowFakeFav($similar_films[6]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[6]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[6]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[6]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[6]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[6]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[6]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[7]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[7]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[7]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[7]['ID_film'],$_SESSION['ID_user'],$similar_films[7]['likes']);}else{ShowFakeFav($similar_films[7]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[7]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[7]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[7]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[7]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[7]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[7]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[8]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[8]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[8]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[8]['ID_film'],$_SESSION['ID_user'],$similar_films[8]['likes']);}else{ShowFakeFav($similar_films[8]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[8]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[8]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[8]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[8]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[8]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[8]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[9]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[9]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[9]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[9]['ID_film'],$_SESSION['ID_user'],$similar_films[9]['likes']);}else{ShowFakeFav($similar_films[9]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[9]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[9]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[9]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[9]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[9]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[9]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                    </div>
            </div>
            <?php } ?>
            <!-- Item 3 -->
            <?php if(!empty($similar_films[14])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[10]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[10]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[10]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[10]['ID_film'],$_SESSION['ID_user'],$similar_films[10]['likes']);}else{ShowFakeFav($similar_films[10]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[10]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[10]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[10]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[10]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[10]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[10]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[11]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[11]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[11]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[11]['ID_film'],$_SESSION['ID_user'],$similar_films[11]['likes']);}else{ShowFakeFav($similar_films[11]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[11]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[11]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[11]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[11]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[11]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[11]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[12]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[12]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[12]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[12]['ID_film'],$_SESSION['ID_user'],$similar_films[12]['likes']);}else{ShowFakeFav($similar_films[12]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[12]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[12]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[12]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[12]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[12]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[12]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[13]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[13]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[13]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[13]['ID_film'],$_SESSION['ID_user'],$similar_films[13]['likes']);}else{ShowFakeFav($similar_films[13]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[13]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[13]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[13]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[13]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[13]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[13]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[14]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[14]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[14]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[14]['ID_film'],$_SESSION['ID_user'],$similar_films[14]['likes']);}else{ShowFakeFav($similar_films[14]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[14]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[14]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[14]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[14]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[14]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[14]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                    </div>
            </div>
            <?php } ?>
            <!-- Item 4 -->
            <?php if(!empty($similar_films[19])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[15]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[15]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[15]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[15]['ID_film'],$_SESSION['ID_user'],$similar_films[15]['likes']);}else{ShowFakeFav($similar_films[15]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[15]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[15]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[15]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[15]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[15]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[15]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[16]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[16]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[16]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[16]['ID_film'],$_SESSION['ID_user'],$similar_films[16]['likes']);}else{ShowFakeFav($similar_films[16]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[16]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[16]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[16]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[16]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[16]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[16]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[17]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[17]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[17]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[17]['ID_film'],$_SESSION['ID_user'],$similar_films[17]['likes']);}else{ShowFakeFav($similar_films[17]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[17]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[17]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[17]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[17]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[17]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[17]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[18]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[18]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[18]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[18]['ID_film'],$_SESSION['ID_user'],$similar_films[18]['likes']);}else{ShowFakeFav($similar_films[18]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[18]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[18]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[18]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[18]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[18]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[18]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[19]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[19]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[19]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[19]['ID_film'],$_SESSION['ID_user'],$similar_films[19]['likes']);}else{ShowFakeFav($similar_films[19]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[19]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[19]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[19]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[19]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[19]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[19]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                    </div>
            </div>
            <?php } ?>
            <!-- Item 5 -->
            <?php if(!empty($similar_films[24])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item >
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[20]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[20]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[20]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[20]['ID_film'],$_SESSION['ID_user'],$similar_films[20]['likes']);}else{ShowFakeFav($similar_films[20]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[20]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[20]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[20]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[20]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[20]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[20]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[21]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[21]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[21]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[21]['ID_film'],$_SESSION['ID_user'],$similar_films[21]['likes']);}else{ShowFakeFav($similar_films[21]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[21]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[21]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[21]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[21]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[21]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[21]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[22]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[22]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[22]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[22]['ID_film'],$_SESSION['ID_user'],$similar_films[22]['likes']);}else{ShowFakeFav($similar_films[22]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[22]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[22]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[22]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[22]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[22]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[22]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[23]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[23]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[23]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[23]['ID_film'],$_SESSION['ID_user'],$similar_films[23]['likes']);}else{ShowFakeFav($similar_films[23]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[23]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[23]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[23]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[23]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[23]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[23]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[24]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                        <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[24]['film_date']?></div>

                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[24]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[24]['ID_film'],$_SESSION['ID_user'],$similar_films[24]['likes']);}else{ShowFakeFav($similar_films[24]['likes']);}
                        ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[24]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[24]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[24]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[24]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[24]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[24]['film_photo']?>" class="h-full mx-auto">
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>




        </div>

        <!-- BOUTON NEXT -->
        <div class="grow flex justify-start">
            <button type="button" class="z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                    <svg aria-hidden="true" class="w-5 h-5 text-main-light sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke-height="20" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

</div>
</section>
<?php }elseif(!empty($similar_films[4])){?>
<div class="relative h-[40vh] w-[80%] mx-auto overflow-hidden rounded-lg  md:h-96">

<!-- GRID SI MOINS DE 9 FILMS -->
    <div class="duration-3000 ease-in-out h-full">
        <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
            <div class="h-full relative group">
                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[0]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[0]['film_date']?></div>
                <!-- OVERLAY!!! -->
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark"><?=$similar_films[0]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[0]['ID_film'],$_SESSION['ID_user'],$similar_films[0]['likes']);}else{ShowFakeFav($similar_films[0]['likes']);}
                        ?>
                        <div>
                            <div class="flex justify-start">
                                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[0]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[0]['film_name']?></h2></a>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal"><?=substr($similar_films[0]['film_description'],0,200),'...';?></p>
                            </div>
                            <div class="flex justify-between h-auto mt-4 text-center">
                                <div class="flex justify-start align-bottom">
                                    <?=$similar_films[0]['film_time']?>min
                                </div>
                                <div class="flex justify-end">
                                    <?php Stars($similar_films[0]['film_grade']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- IMAGE -->
                <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[0]['film_photo']?>" class="h-full mx-auto">
                </a>
            </div>
            <div class="h-full relative group">
                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[1]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
            <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[1]['film_date']?></div>
                <!-- OVERLAY!!! -->
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark"><?=$similar_films[1]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[1]['ID_film'],$_SESSION['ID_user'],$similar_films[1]['likes']);}else{ShowFakeFav($similar_films[0]['likes']);}
                        ?>
                        <div>
                            <div class="flex justify-start">
                                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[1]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[1]['film_name']?></h2></a>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal"><?=substr($similar_films[1]['film_description'],0,200),'...';?></p>
                            </div>
                            <div class="flex justify-between h-auto mt-4 text-center">
                                <div class="flex justify-start align-bottom">
                                    <?=$similar_films[1]['film_time']?>min
                                </div>
                                <div class="flex justify-end">
                                    <?php Stars($similar_films[1]['film_grade']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- IMAGE -->
                <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[1]['film_photo']?>" class="h-full mx-auto">
                </a>
            </div>
            <div class="h-full relative group">
                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[2]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
            <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[2]['film_date']?></div>
                <!-- OVERLAY!!! -->
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark"><?=$similar_films[2]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[2]['ID_film'],$_SESSION['ID_user'],$similar_films[2]['likes']);}else{ShowFakeFav($similar_films[0]['likes']);}
                        ?>
                        <div>
                            <div class="flex justify-start">
                                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[2]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[2]['film_name']?></h2></a>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal"><?=substr($similar_films[2]['film_description'],0,200),'...';?></p>
                            </div>
                            <div class="flex justify-between h-auto mt-4 text-center">
                                <div class="flex justify-start align-bottom">
                                    <?=$similar_films[2]['film_time']?>min
                                </div>
                                <div class="flex justify-end">
                                    <?php Stars($similar_films[2]['film_grade']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- IMAGE -->
                <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[2]['film_photo']?>" class="h-full mx-auto">
                </a>
            </div>
            <div class="h-full relative group">
                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[3]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
            <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[3]['film_date']?></div>
                <!-- OVERLAY!!! -->
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark"><?=$similar_films[3]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[3]['ID_film'],$_SESSION['ID_user'],$similar_films[3]['likes']);}else{ShowFakeFav($similar_films[0]['likes']);}
                        ?>
                        <div>
                            <div class="flex justify-start">
                                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[3]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[3]['film_name']?></h2></a>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal"><?=substr($similar_films[3]['film_description'],0,200),'...';?></p>
                            </div>
                            <div class="flex justify-between h-auto mt-4 text-center">
                                <div class="flex justify-start align-bottom">
                                    <?=$similar_films[3]['film_time']?>min
                                </div>
                                <div class="flex justify-end">
                                    <?php Stars($similar_films[3]['film_grade']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- IMAGE -->
                <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[3]['film_photo']?>" class="h-full mx-auto">
                </a>
            </div>
            <div class="h-full relative group">
                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[4]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
            <div class="absolute top-4 left-4 text-xl font-bold text-main-default"><?=$similar_films[4]['film_date']?></div>

                <!-- OVERLAY!!! -->
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark"><?=$similar_films[4]['film_date']?></p>
                        <?php
                            if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[4]['ID_film'],$_SESSION['ID_user'],$similar_films[4]['likes']);}else{ShowFakeFav($similar_films[0]['likes']);}
                        ?>
                        <div>
                            <div class="flex justify-start">
                                <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[4]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[4]['film_name']?></h2></a>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal"><?=substr($similar_films[4]['film_description'],0,200),'...';?></p>
                            </div>
                            <div class="flex justify-between h-auto mt-4 text-center">
                                <div class="flex justify-start align-bottom">
                                    <?=$similar_films[4]['film_time']?>min
                                </div>
                                <div class="flex justify-end">
                                    <?php Stars($similar_films[4]['film_grade']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- IMAGE -->
                <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[4]['film_photo']?>" class="h-full mx-auto">
                </a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php include('../include/general/footer.php')?>
