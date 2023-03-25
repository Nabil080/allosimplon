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
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>

            <?php } ?>

        </tbody>
    </table>