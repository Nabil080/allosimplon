

<!-- Modal AddFilm -->
<div id="addfilm"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ajouter un film
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addfilm">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/add_film.php" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du film</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nom du film" ="">
                    </div>
                    <div>
                        <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durée</label>
                        <input type="number" name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="120" ="">
                    </div>
                    <div>
                        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Année</label>
                        <input type="number" name="date" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2009" ="">
                    </div>
                    <div>
                        <label for="grade" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                        <input type="number" name="grade" id="grade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="8,00" ="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Synopsis</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>                    
                    </div>
                    <div>
                        <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres</label>
                        <select name="genre[]" multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectGenre() ?>
                        </select>
                    </div>
                    <div>
                        <label for="actor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acteurs</label>
                        <select name="actor[]"  multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectActor() ?>
                        </select>
                    </div>
                    <div>
                        <label for="realisator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réalisateurs</label>
                        <select name="realisator[]" multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectRealisator() ?>
                        </select>
                    </div>
                    <div>
                        <label for="scenarist" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scénario</label>
                        <select name="scenarist[]" multiple  id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectScenarist() ?>
                        </select>
                    </div>
                    <div class="col-start-1 col-span-2">
                        <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lien de la vidéo</label>
                        <input type="text" name="video" id="video" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="iframe ytb" ="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affiche poster</label>
                        <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche" ="">
                    </div>
                    <div>
                        <label for="background" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo background</label>
                        <input type="file" name="background" id="background" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="belle photo" ="">
                    </div>
                </div>
                <button type="submit" name="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un film
                </button>
            </form>
        </div>
    </div>
</div>



<table id="film" aria-labelledby="filmtab" class="w-[80%] mx-auto text-sm text-left text-gray-500 dark:text-gray-300">
        <thead class="text-xs text-gray-700 uppercase dark:bg-gray-700 dark:text-gray-300 [&_th]:text-center relative ">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> -->
                <th scope="col" class="px-6 py-3">
                    Affiche
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom du Film
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Durée
                </th>
                <th scope="col" class="px-6 py-3">
                    Année
                </th>
                <th scope="col" class="px-6 py-3">
                    Note
                </th>
                <th scope="col" class="px-6 py-3">
                    Casting/Vidéo/Synopsis/Détails
                </th>
                <th scope="col" class="px-6 py-3">
                    <button type="button" data-modal-toggle="addfilm" class=""><i class="fa-solid fa-plus text-main-light ">ADD</i></button>
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">




        <!-- REQUETE RECUP FILM + BOUCLE -->


        <?php
            $request=$con->prepare("SELECT * FROM film");
            $request->execute();
            while($film=$request->fetch()){
                // Variables
                $photo=$film['film_photo'];
                $name=$film['film_name'];
                $ID=$film['ID_film'];
                $time=$film['film_time'];
                $date=$film['film_date'];
                $note=$film['film_grade'];
                $description=$film['film_description'];
                $video=$film['film_video'];
                $background=$film['film_background']
        ?>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="/portfolio/allosimplon/build/img/<?=$photo?>" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    <?=$name?>
                </td>
                <td class="px-6 py-4">
                    <?=$ID?>
                </td>
                <td class="px-6 py-4">
                    <?=$time?>
                </td>
                <td class="px-6 py-4">
                    <?=$date?>
                </td>
                <td class="px-6 py-4">
                    <?=$note?>
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
<div class="flex justify-center m-5">
    <button data-modal-toggle="modal<?=$ID?>" class="block text-white bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Plus d'informations
    </button>
</div>

<!-- REQUETE JOIN ACTEUR/REAL/GENRE/SCENAR -->
<!-- REQUETE JOIN ACTEUR/REAL/GENRE/SCENAR -->

<?php


?>

<!-- Main modal -->
    <div id="modal<?=$ID?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-3xl h-full max-h-[80vh]">
        <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            <?=$name?>
                        </h3>

                    </div>
                    <div>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="readProductModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                </div>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Genres</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <?php GetFilmGenre($ID,false,true) ?>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Scénario</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                        <?php GetFilmScenarist($ID,false,false,true) ?>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Réalisateurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                        <?php GetFilmRealisator($ID,false,false,true);?>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Acteurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                        <?php GetFilmActor($ID,false,false,true)?>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Image de fond</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <img src="/portfolio/allosimplon/build/img/<?=$background?>" alt="">
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Bande annonce</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <iframe class="w-full aspect-video" width="" height="" src="<?=$video?>" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Synopsis</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300"><?=$description?></dd>
                                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" data-modal-toggle="modifyfilm" class="text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg aria-hidden="true" class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                            Modifier
                        </button>               

                    </div>
                    <button type="button" class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        <svg aria-hidden="true" class="w-5 h-5 mr-1.5 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        Supprimer
                    </button>
                </div>
        </div>
    </div>
</div>
                </td>
                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a data-modal-toggle="modifyfilm" class="cursor-pointer font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a data-modal-toggle="deletefilm" class="cursor-pointer font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
       <?php };
        ?>
        </tbody>
    </table>