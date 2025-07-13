<!-- Modal Addscenarist -->
<div id="addscenarist"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4  rounded-lg shadow bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 border-gray-600">
                <h3 class="text-lg font-semibold  text-white">
                    Ajouter un scénariste
                </h3>
                <button type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="addscenarist">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/traitements/add/add_scenarist.php" target="_blank" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium  text-white">Nom du scénariste</label>
                        <input type="text" name="name" id="name" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Prénom Nom" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium  text-white">Photo (laisser vide si besoin)</label>
                        <input type="file" name="photo" id="photo" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="affiche" required="">
                    </div>

                </div>
                <button type="submit" name="submit" value="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un scénariste
                </button>
            </form>
        </div>
    </div>
</div>


<table id="scenario" aria-labelledby="scenariotab" class="w-[80%] mx-auto text-sm text-left  text-gray-300 hidden">
        <thead class="text-xs  uppercase  bg-gray-700 text-gray-300 [&_th]:text-center">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> -->
                <th scope="col" class="px-6 py-3">
                    Photo
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom du scénariste
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Films
                </th>
                <th scope="col" class="px-6 py-3">
                    <button type="button" data-modal-toggle="addscenarist" class=""><i class="fa-solid fa-plus text-main-light ">ADD</i></button>
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">

            <?php

            $request = $con->prepare('SELECT * FROM scenarist');
            $request->execute();
            while ($scenarist = $request->fetch()) {
                $ID = $scenarist['ID_scenarist'];
                $name = $scenarist['scenarist_name'];
                $photo = $scenarist['scenarist_photo'];
                ?>



<!-- Modal modifyscenarist -->
<div id="modifyscenarist<?= $ID ?>"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4  rounded-lg shadow bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 border-gray-600">
                <h3 class="text-lg font-semibold  text-white">
                    Modifier un scénariste
                </h3>
                <button type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="modifyscenarist<?= $ID ?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/traitements/modify/modify_scenarist.php" target="_blank" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium  text-white">Nom du scénariste</label>
                        <input type="text" value="<?= $name ?>" name="name" id="name" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Prénom Nom" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium  text-white">Photo (laisser vide si besoin)</label>
                        <input type="file" value="<?= $photo ?>" name="photo" id="photo" class=" border   text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="affiche">
                    </div>
                    <div>
                        <label for="scenarist" class="block mb-2 text-sm font-medium  text-white">Films</label>
                        <select name="film[]" multiple id="dd" class=" border   text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500">
                            <?php SelectedFilm($ID, 'ID_scenarist', 'film_scenarist') ?>
                        </select>
                    </div>
                    <input type="number" class="hidden" value="<?= $ID ?>" name="ID" >
                </div>
                <button type="submit" name="submit" value="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un scénariste
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Deletescenarist -->
<div id="deletescenarist<?= $ID ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center  rounded-lg shadow bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="deletescenarist<?= $ID ?>">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class=" text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4  text-gray-300">Etes vous sur de vouloir supprimer cette donnée ?</p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deletescenarist<?= $ID ?>" type="button" class="py-2 px-3 text-sm font-medium   rounded-lg border   focus:ring-4 focus:outline-none focus:ring-primary-300  focus:z-10 bg-gray-700 text-gray-300 border-gray-500 hover:text-white hover:bg-gray-600 focus:ring-gray-600">
                    Non, annuler
                </button>
                <form action="/traitements/delete/delete_scenarist.php" method="post" >
                    <input type="text" name="ID" value="<?= $ID ?>" class="hidden" selected>
                    <button type="submit" value="submit" name="submit" class="py-2 px-3 text-sm font-medium text-center text-white  rounded-lg  focus:ring-4 focus:outline-none  bg-red-500 hover:bg-red-600 focus:ring-red-900">
                        Oui, je suis sûr.
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

            <tr class=" border-b bg-gray-800 border-gray-700  hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium  whitespace-nowrap text-white max-w-[8rem]">
                    <img src="/upload/scenarist/<?= $photo ?>" class="w-full objet-cover" alt="">
                </th>
                <td scope="row" class="text-center px-1 py-4 font-medium  whitespace-nowrap text-white max-w-[8rem]">
                    <?= $name ?>
                </td>
                <td class="px-6 py-4">
                    <?= $ID ?>
                </td>
                <td class="px-6 py-4">
                    <?php GetScenaristFilm($ID) ?>
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a data-modal-toggle="modifyscenarist<?= $ID ?>" class="cursor-pointer font-medium p-4 border-blue-600 border rounded-lg   text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a data-modal-toggle="deletescenarist<?= $ID ?>" class="cursor-pointer font-medium p-4 border-red-600 border rounded-lg  text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
