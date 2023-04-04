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
        // dark: '#092327',
        dark: '#051315',
        hover: '#1B7673',
    },
    }
},
},
    }
    </script>
<title>Cinemet</title>
</head>

<?php 
if(!isset($_GET['page'])){$_GET['page']=1;}
$ID_film = $_GET['page'];
$request=GetOneFilm($ID_film);
$film=$request->fetch();
// var_dump($film);

?>

<body class="bg-main-dark text-gray-100 bg-cover bg-center bg-fixed bg-no-repeat " style="background-image:url(/portfolio/allosimplon/build/upload/film/<?=$film['film_background']?>)">

<?php include('../include/general/nav.php')?>



<div class="flex justify-center mt-20 lg:mt-28 mb-6">
<h1 class="font-bold text-xl lg:text-4xl drop-shadow-lg "><?=$film['film_name']?></h1>
</div>


<!-- PAGE FILM -->
<section class="mx-auto w-full lg:w-[90%] xl:w-[80%] 2xl:w-[60%] border relative bg-main-dark">
<!-- AJOUTER/RETIRER FAVORIS -->
<div class="absolute top-2 right-4 text-main-light text-lg flex text-center gap-8 w-fit">
    <div>
<?php
    if(isset($_SESSION['ID_user'])){isFilmFav($ID_film,$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
?>
    </div>
</div>
<!-- GRILLE -->
    <div class="block md:grid md:grid-cols-2 lg:gap-8  ">
        <div class="p-2 sm:p-4 lg:p-8">
            <img src="/portfolio/allosimplon/build/upload/film/<?=$film['film_photo']?>" class=" w-full sm:w-[75vw] mx-auto md:w-full" alt="">
        </div>
        <div class="[&>*]:my-4 my-8 relative">
            <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Nom d'origine : </p><span class="font-normal"><?=$film['film_name']?></span></div>
            <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Date de sortie : </p><span class="font-normal"><?=$film['film_date']?></span></div>
            <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Durée du film : </p><span class="font-normal"><?=$film['film_time']?> minutes</span></div>
            <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Genres : </p>
                <?php $request=GetOneGenre($ID_film);
                while($genres=$request->fetch()){
                    $genre_info=$con->prepare("SELECT * from genre WHERE ID_genre = ?");
                    $genre_info->execute([$genres['ID_genre']]);
                    while($genre=$genre_info->fetch()){?>
                        <a href="/portfolio/allosimplon/build/" class="text-main-light hover:text-main-hover font-normal"><?=$genre['genre_name']?></a>
                <?php }
                } ?>
            </div>
            <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-3"><p class="underline ">Acteurs principaux : </p>


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
    
                        <?=$actor['actor_name'].','?>
                    </a>
                <?php }
                } ?>
            </div>
        <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Réalisateurs : </p><span class="font-normal">
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
                    <?=$realisator['realisator_name'].','?>
                    </a>
                <?php }
                } ?>
            </div>
            <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-2"><p class="underline ">Scénaristes : </p><span class="font-normal">
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
                    
                    <?=$scenarist['scenarist_name'].','?>
                </a>
                <?php }
                } ?>
            </div>
            <div class="px-8 font-bold text-sm sm:text-base lg:text-xl flex flex-wrap gap-y-4 gap-x-2 md:absolute bottom-0"><p class="underline ">Note : </p>
            <?php Stars($film['film_grade'],$film['ID_film'])?>
                <span class="font-normal text-gray-50 text-center">
                    Note des internautes : <?=$film['film_grade'];?>,<?php if(isset($_SESSION['ID_user'])){ UserNote($film['ID_film'],$_SESSION['ID_user']); }?>
                </span>
            </div>
        </div>
    </div>
<div class="px-8 font-bold text-sm sm:text-base lg:text-xl space-x-2"><p class="underline float-left">Synopsis :</p><span class="font-normal"><?=$film['film_description']?></span></div>
<!-- IFRAME -->
<div class="p-8 flex place-content-center">
    <iframe class="w-full aspect-video" src="<?=$film['film_video']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
</section>

<?php if(isset($_SESSION['ID_role'])&&($_SESSION['ID_role']==1)){ ?>
<div class="mx-auto w-fit mt-6">
    <button class="p-4 bg-main-light rounded-xl hover:bg-main-hover hover:border" data-modal-target="modifyfilm<?=$ID_film?>" data-modal-toggle="modifyfilm<?=$ID_film?>"> MODIFIER CE FILM </button>
</div>
<!-- Modal ModifyFilm -->
<div id="modifyfilm<?=$ID_film?>"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4  rounded-lg shadow bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 border-gray-600">
                <h3 class="text-lg font-semibold  text-white">
                    Modifier un film
                </h3>
                <button type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="modifyfilm<?=$ID_film?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/modify/modify_film.php" target="_blank" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium  text-white">Nom du film</label>
                        <input value="<?=$film['film_name']?>" type="text" name="name" id="name" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Nom du film" required="">
                    </div>
                    <div>
                        <label for="time" class="block mb-2 text-sm font-medium  text-white">Durée</label>
                        <input value="<?=$film['film_time']?>" type="number" step=".1"  name="time" id="time" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="120" required="">
                    </div>
                    <div>
                        <label for="date" class="block mb-2 text-sm font-medium  text-white">Année</label>
                        <input value="<?=$film['film_date']?>" type="number" step=".1"  name="date" id="date" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="2009" required="">
                    </div>
                    <div>
                        <label for="grade" class="block mb-2 text-sm font-medium  text-white">Note</label>
                        <input value="<?=$film['film_grade']?>" type="number" step=".1"  name="grade" id="grade" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="8,00" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium  text-white">Synopsis</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm   rounded-lg border  focus:ring-primary-500 focus:border-primary-500 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Write product description here"><?=$film['film_description']?></textarea>                    
                    </div>
                    <div>
                        <label for="genre" class="block mb-2 text-sm font-medium  text-white">Genres</label>
                        <select name="genre[]" multiple id="dd" class=" border   text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                            <?php SelectedGenre($film['ID_film']) ?>
                        </select>
                    </div>
                    <div>
                        <label for="actor" class="block mb-2 text-sm font-medium  text-white">Acteurs</label>
                        <select name="actor[]" multiple id="dd" class=" border   text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                            <?php SelectedActor($film['ID_film']) ?>
                        </select>
                    </div>
                    <div>
                        <label for="realisator" class="block mb-2 text-sm font-medium  text-white">Réalisateurs</label>
                        <select name="realisator[]" multiple id="dd" class=" border   text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                            <?php SelectedRealisator($film['ID_film']) ?>
                        </select>
                    </div>
                    <div>
                        <label for="scenarist" class="block mb-2 text-sm font-medium  text-white">Scénario</label>
                        <select name="scenarist[]" multiple  id="dd" class=" border   text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                            <?php SelectedScenarist($film['ID_film']) ?>
                        </select>
                    </div>
                    <div class="col-start-1 col-span-2">
                        <label for="video" class="block mb-2 text-sm font-medium  text-white">Lien de la vidéo</label>
                        <input value="<?=$film['film_video']?>" type="url" name="video" id="video" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="iframe ytb" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium  text-white">Affiche poster (laisser vide si besoin)</label>
                        <input value="<?=$film['film_photo']?>" type="file" name="photo" id="photo" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="affiche">
                    </div>
                    <div>
                        <label for="background" class="block mb-2 text-sm font-medium  text-white">Photo background (laisser vide si besoin)</label>
                        <input value="<?=$film['film_background']?>" type="file" name="background" id="background" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="belle photo">
                    </div>
                    <input type="number" step=".1"  class="hidden" value="<?=$film['ID_film']?>" name="ID" >
                </div>
                <button type="submit" name="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Modifier le film
                </button>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php $comment_request=$con->prepare("SELECT * FROM comment WHERE ID_film = ?");$comment_request->execute([$film['ID_film']]);
$comment_count= $comment_request->rowCount() ?>
<section class=" bg-transparent py-8 lg:py-16">
  <div class="max-w-2xl mx-auto px-4">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg lg:text-2xl font-bold  text-gray-50">Commentaires (<?=$comment_count?>)</h2>
    </div>
    <form class="mb-6" method="post" action="/portfolio/allosimplon/build/traitements/add/add_comment.php">
        <input class="hidden" name="ID_film" value="<?=$film['ID_film']?>">
        <div class="py-2 px-4 mb-4  rounded-lg rounded-t-lg border  bg-main-dark border-main-light">
            <label for="comment" class="sr-only">Votre commentaire :</label>
            <textarea id="comment" rows="6" name="message"
                class="px-0 w-full text-sm  border-0 focus:ring-0 focus:outline-none text-white placeholder-gray-400 bg-main-dark"
                placeholder="Écrivez un commentaire..." required></textarea>
        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-main-light rounded-lg focus:ring-4 focus:ring-primary-200 focus:ring-primary-900 hover:bg-primary-800">
            Envoyer le commentaire
        </button>
    </form>
    <?php
    while($comment=$comment_request->fetch()){
        setlocale(LC_TIME, 'fr_FR.utf8');
        $date = new DateTime($comment['comment_date']); ?>
    <article class="p-6 text-base mb-6 border-t  border-main-light bg-main-dark">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center capitalize text-sm  text-gray-50"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg><?php $ID_user = $comment['ID_user'];$comment_pseudo_request=$con->prepare("SELECT user_pseudo FROM user WHERE ID_user = $ID_user");$comment_pseudo_request->execute();$comment_pseudo=$comment_pseudo_request->fetch();?><?=$comment_pseudo[0]?></p>
                <p class="text-sm ml-3 text-gray-400"><time pubdate datetime="2022-06-23"
                        title="June 23rd, 2022"><?=$date->format('d.M.Y H:i')?></time></p>
            </div>
            <button id="dropdownCommentButton<?=$comment['ID_comment']?>" data-dropdown-toggle="dropdownComment<?=$comment['ID_comment']?>"
                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-50  rounded-lg  focus:ring-4 focus:outline-none  bg-main-light hover:bg-main-hover focus:ring-main-hover"
                type="button">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                    </path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownComment<?=$comment['ID_comment']?>"
            class="hidden z-10 w-fit  rounded divide-y  shadow bg-main-dark divide-gray-600">
            
                <ul class="py-1  text-sm  text-gray-200"
                    aria-labelledby="dropdownMenuIconHorizontalButton">
                    <?php if(isset($_SESSION['ID_user'])){if($comment['ID_user'] == $_SESSION['ID_user']){?>
                    <li>
                        <button onclick="SwitchComment<?=$comment['ID_comment']?>()"
                            class="block py-2 px-8 w-full hover:bg-gray-600 hover:text-white">Modifier</a>
                    </li>
                    <?php }?>
            <form method="post" action="/portfolio/allosimplon/build/traitements/manage_comment.php">
                    <?php if($comment['ID_user'] == $_SESSION['ID_user'] || $_SESSION['ID_role'] == 1){?>
                    <li>
                        <button type="submit" name="delete_comment"
                            class="block py-2 px-8 w-full  hover:bg-gray-600 hover:text-white">Supprimer</a>
                    </li>
                    <?php }} ?>
                    <li>
                        <button type="submit" name="report_comment"
                            class="block py-2 px-8 w-full hover:bg-gray-600 hover:text-white">Signaler</a>
                    </li>
                </ul>
                <input class="hidden" name="ID_comment" value="<?=$comment['ID_comment']?>">
            </form>
        </div>
        </footer>
        <p id="old_comment<?=$comment['ID_comment']?>" class="text-gray-400"><?=$comment['comment_message']?></p>
        <form id="new_comment<?=$comment['ID_comment']?>" class="hidden" method="post" action="/portfolio/allosimplon/build/traitements/manage_comment.php">
            <input class="hidden" name="ID_comment" value="<?=$comment['ID_comment']?>">
            <textarea name="modified_comment" class=" text-gray-400 bg-transparent border-main-light rounded-lg p-2 w-full"><?=$comment['comment_message']?></textarea>
            <button type="submit" name="modify_comment" class="inline-flex items-center py-2.5 px-4 mt-2 text-xs font-medium text-center text-white bg-main-light rounded-lg focus:ring-4 focus:ring-primary-200 focus:ring-primary-900 hover:bg-primary-800">Modifier le commentaire</button>
        </form>
    </article>
    <script>
function SwitchComment<?=$comment['ID_comment']?>() {
    var div1 = document.getElementById("old_comment<?=$comment['ID_comment']?>");
    var div2 = document.getElementById("new_comment<?=$comment['ID_comment']?>");
    if (div1.style.display === "block") {
    div1.style.display = "none";
    div2.style.display = "block";
    } else {
    div1.style.display = "block";
    div2.style.display = "none";
    }
}
</script>
    <?php } ?>
    </div>
</section>
















<div class="flex justify-center mt-6 mb-6">
<h1 class="font-bold text-xl md:text-4xl">Films Similaires</h1>
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
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand group-hover:bg-sand group-focus:ring-sand group-focus:ring-sand">
                <svg aria-hidden="true" class="w-5 h-5 text-main-light sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
            </button>

        </div>
        <!-- Carousel wrapper -->
        <div class="relative h-96 w-[80%] mx-auto overflow-hidden rounded-lg  md:h-[400px]">

            <!-- Item 1 -->
            <?php if(!empty($similar_films[4])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <?php for($i=0;$i<5;$i++){?>
                                            <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[$i]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <div class="hidden lg:block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                            <div class="hidden lg:block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                            <div class="hidden lg:block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto group-hover:hidden"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 lg:group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[$i]['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[$i]['film_name']?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[$i]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[$i]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="relative w-fit h-96 md:h-[400px] mx-auto">
                                    <div class="block lg:hidden absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                                    <div class="block lg:hidden absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                                    <div class="block lg:hidden absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                                    <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[$i]['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div> <?php } ?>
                </div>
            <?php } ?>
            <!-- Item 2 -->
            <?php if(!empty($similar_films[9])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php for($i=5;$i<9;$i++){?>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[$i]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <div class="hidden lg:block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                            <div class="hidden lg:block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                            <div class="hidden lg:block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto group-hover:hidden"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 lg:group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[$i]['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[$i]['film_name']?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[$i]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[$i]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="relative w-fit h-96 md:h-[400px] mx-auto">
                                    <div class="block lg:hidden absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                                    <div class="block lg:hidden absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                                    <div class="block lg:hidden absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                                    <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[$i]['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div> <?php } ?>
                </div>
                    </div>
            </div>
            <?php } ?>
            <!-- Item 3 -->
            <?php if(!empty($similar_films[14])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php for($i=10;$i<5;$i++){?>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[$i]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <div class="hidden lg:block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                            <div class="hidden lg:block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                            <div class="hidden lg:block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto group-hover:hidden"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 lg:group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[$i]['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[$i]['film_name']?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[$i]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[$i]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="relative w-fit h-96 md:h-[400px] mx-auto">
                                    <div class="block lg:hidden absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                                    <div class="block lg:hidden absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                                    <div class="block lg:hidden absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                                    <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[$i]['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div> <?php } ?>
                </div>
                    </div>
            </div>
            <?php } ?>
            <!-- Item 4 -->
            <?php if(!empty($similar_films[19])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php for($i=15;$i<20;$i++){?>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[$i]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <div class="hidden lg:block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                            <div class="hidden lg:block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                            <div class="hidden lg:block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto group-hover:hidden"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 lg:group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[$i]['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[$i]['film_name']?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[$i]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[$i]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="relative w-fit h-96 md:h-[400px] mx-auto">
                                    <div class="block lg:hidden absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                                    <div class="block lg:hidden absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                                    <div class="block lg:hidden absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                                    <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[$i]['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div> <?php } ?>
                </div>
                    </div>
            </div>
            <?php } ?>
            <!-- Item 5 -->
            <?php if(!empty($similar_films[24])){?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item >
                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php for($i=20;$i<20;$i++){ ?>
                        <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[$i]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <div class="hidden lg:block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                            <div class="hidden lg:block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                            <div class="hidden lg:block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto group-hover:hidden"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 lg:group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[$i]['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[$i]['film_name']?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[$i]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[$i]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="relative w-fit h-96 md:h-[400px] mx-auto">
                                    <div class="block lg:hidden absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                                    <div class="block lg:hidden absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                                    <div class="block lg:hidden absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                                    <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[$i]['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div> <?php } ?>
                </div>
            </div>
        </div>
            <?php } ?>


        </div>

        <!-- BOUTON NEXT -->
        <div class="grow flex justify-start">
            <button type="button" class="z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand group-hover:bg-sand group-focus:ring-sand group-focus:ring-sand">
                    <svg aria-hidden="true" class="w-5 h-5 text-main-light sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke-height="20" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

</div>
</section>



<?php }elseif(!empty($similar_films[4])){?>
<div class="relative h-96 w-[80%] mx-auto overflow-hidden rounded-lg  md:h-[400px]">

<!-- GRID SI MOINS DE 9 FILMS -->
    <div class="duration-3000 ease-in-out h-full">
        <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
        <?php for($i=0;$i<5;$i++){?>
                                            <div class="h-full relative group">
                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$similar_films[$i]['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <div class="hidden lg:block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 md:group-hover:hidden bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                            <div class="hidden lg:block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 md:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                            <div class="hidden lg:block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto md:group-hover:hidden"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 md:group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$similar_films[$i]['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$similar_films[$i]['film_name']?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($similar_films[$i]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$similar_films[$i]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="relative h-96 md:h-[400px] mx-auto w-fit">
                                    <div class="block lg:hidden absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 md:group-hover:hidden bg-main-light "><?=$similar_films[$i]['film_date']?></div>
                                    <div class="block lg:hidden absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 md:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($similar_films[$i]['ID_film'],$_SESSION['ID_user'],$similar_films[$i]['likes']);}else{ShowFakeFav($similar_films[$i]['likes']);}?></div>
                                    <div class="block lg:hidden absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto md:group-hover:hidden"><?php Stars($similar_films[$i]['film_grade'],$similar_films[$i]['ID_film']);?></div>
                                    <img src="/portfolio/allosimplon/build/upload/film/<?=$similar_films[$i]['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div> <?php } ?></div>
    </div>
</div>
<?php } ?>

<?php include('../include/general/footer.php')?>
