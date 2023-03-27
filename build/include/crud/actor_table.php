<!-- Modal Addactor -->
<div id="addactor"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ajouter un acteur
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addactor">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/add_actor.php" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'acteur</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Prénom Nom" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                        <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche" required="">
                    </div>

                </div>
                <button type="submit" name="submit" value="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un acteur
                </button>
            </form>
        </div>
    </div>
</div>


<table id="actor" aria-labelledby="actortab" class="w-[80%] mx-auto text-sm text-left text-gray-500 dark:text-gray-300 hidden">
        <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-300 [&_th]:text-center">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> -->
                <th scope="col" class="px-6 py-3">
                    Acteur
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom de l'acteur
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Films
                </th>
                <th scope="col" class="px-6 py-3">
                    <button type="button" data-modal-toggle="addactor" class=""><i class="fa-solid fa-plus text-main-light ">ADD</i></button>
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">



        <?php
        // REQUETE RECUP ACTEURS + BOUCLE
        $request=$con->prepare("SELECT * FROM actor");
        $request->execute();
        while($actor=$request->fetch()){
            $ID = $actor['ID_actor'];
            $name = $actor['actor_name'];
            $photo = $actor['actor_photo'];
        ?>

<!-- Modal modifyactor -->
<div id="modifyactor<?=$ID?>"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Modifier un acteur
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modifyactor<?=$ID?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/modify_actor.php" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'acteur</label>
                        <input type="text" value="<?=$name?>" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Prénom Nom" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                        <input type="file" value="<?=$photo?>" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche">
                    </div>
                    <div>
                        <label for="actor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Films</label>
                        <select name="film[]" multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectedFilm($ID,"ID_actor","film_actor") ?>
                        </select>
                    </div>
                    <input type="number" class="hidden" value="<?=$ID?>" name="ID" >
                </div>
                <button type="submit" name="submit" value="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un acteur
                </button>
            </form>
        </div>
    </div>
</div>






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
                    <?php GetActorFilm($ID) ?>
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a data-modal-toggle="modifyactor<?=$ID?>" class="cursor-pointer font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a data-modal-toggle="deleteactor<?=$ID?>" class="cursor-pointer font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>

            <?php } ?>

        </tbody>
    </table>