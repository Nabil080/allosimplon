<!-- Modal Adduser -->
<div id="adduser"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ajouter un utilisateur
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="adduser">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/sign.php" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                    <label for="pseudo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Pseudo </label>
                        <input type="text" name="pseudo" maxlength="16" id="pseudo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Pseudo" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> E-mail </label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div>
                        <label for="password_verif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Vérifiez le mot de passe </label>
                        <input type="password" name="password_verif" id="password_verif" placeholder="*********" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                </div>
                <button type="submit" name="submit" value="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un utilisateur
                </button>
            </form>
        </div>
    </div>
</div>



<table id="user" aria-labelledby="usertab" class="w-[80%] mx-auto text-sm text-left text-gray-500 dark:text-gray-300 hidden">
        <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-300 [&_th]:text-center">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> -->
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Pseudo
                </th>
                <th scope="col" class="px-6 py-3">
                    E-mail utilisateur
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Films favoris
                </th>
                <th scope="col" class="px-6 py-3">
                    <button type="button" data-modal-toggle="adduser" class=""><i class="fa-solid fa-plus text-main-light ">ADD</i></button>
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">


        <?php


$request=$con->prepare("SELECT * FROM user");
$request->execute();
while($user=$request->fetch()){
    $ID = $user['ID_user'];
    $pseudo = $user['user_pseudo'];
    $email = $user['user_email'];
    $role = $user['ID_role'];
?>



<!-- Modal modifyuser -->
<div id="modifyuser<?=$ID?>"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Modifier un utilisateur
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modifyuser<?=$ID?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/modify_user.php" method="post">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="pseudo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pseudo</label>
                        <input type="text" value="<?=$pseudo?>" name="pseudo" id="pseudo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Prénom Nom" required="">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" value="<?=$email?>" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche">
                    </div>
                    <div>
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <input type="number" value="<?=$role?>" name="role" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche">
                    </div>
                    <div>
                        <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Favoris</label>
                        <select name="film[]" multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php SelectedFilm($ID,"ID_user","user_fav") ?>
                        </select>
                    </div>
                    <input type="number" class="hidden" value="<?=$ID?>" name="ID" >
                </div>
                <button type="submit" name="submit" value="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Modifier un utilisateur
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
                <th scope="row" class="text-center px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <?=$ID?>
                </th>
                <td class="px-6 py-4">
                    <?=$pseudo?>
                </td>
                <td class="px-6 py-4">
                    <?=$email?>
                </td>
                <td class="px-6 py-4">
                    <?=$role?>
                </td>
                <td class="px-6 py-4">
                    <?php GetUserFav($ID) ?>
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a data-modal-toggle="modifyuser<?=$ID?>" class="cursor-pointer font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a data-modal-toggle="deleteuser<?=$ID?>" class="cursor-pointer font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>


            <?php } ?>

        </tbody>
    </table>