<?php session_start();
require_once '../config/connexion.php';
require_once '../config/functions.php';


?>

<?php include('../include/general/head.php')?>

<?php include('../include/general/nav.php')?>

<?php if(isset($_SESSION['ID_role'])){
    if($_SESSION['ID_role']==1){ ?>


<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Commentaires - Interface administrateur</h1>
</div>




<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->


<div id="crudtable" class="relative overflow-x-scroll shadow-md sm:rounded-lg">

<table id="comment" class="w-[80%] mx-auto text-sm text-left  text-gray-300">
        <thead class="text-xs  uppercase  bg-gray-700 text-gray-300 [&_th]:text-center">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-blue-600 ring-offset-gray-800 focus:ring-offset-gray-800 focus:ring-2 bg-gray-700 border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> -->
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Utilisateur
                </th>
                <th scope="col" class="px-6 py-3">
                    Film
                </th>
                <th scope="col" class="px-6 py-3">
                    Commentaire
                </th>
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Signalements
                </th>
                <th scope="col" class="px-6 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">

    <?php
        // REQUETE RECUP commentS + BOUCLE
        $request=$con->prepare("SELECT * FROM comment ORDER BY comment_reports DESC");
        $request->execute();
        while($comment=$request->fetch()){
            $ID = $comment['ID_comment'];
            $ID_user = $comment['ID_user'];
            $ID_film = $comment['ID_film'];
            $film=GetCommentFilm($ID_film);
            $pseudo = $comment['comment_pseudo'];
            $message = $comment['comment_message'];
            $date = $comment['comment_date'];
            $reports = $comment['comment_reports'];
    ?>



<!-- Modal modifycomment -->
<div id="modifycomment<?=$ID?>"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4  rounded-lg shadow bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 border-gray-600">
                <h3 class="text-lg font-semibold  text-white">
                    Modifier un comment
                </h3>
                <button type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="modifycomment<?=$ID?>">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form enctype="multipart/form-data" action="/portfolio/allosimplon/build/traitements/modify/modify_comment.php" method="post">
                <div class=>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium  text-white">Commentaire</label>
                        <textarea type="text" rows="6" name="message" class=" border text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-primary-500 focus:border-primary-500" placeholder="Commentaire" required=""><?=$message?></textarea>
                    </div>
                    <input type="number" class="hidden" value="<?=$ID?>" name="ID" >
                </div>
                <button type="submit" name="submit" value="submit" class="mt-4 text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-primary-600 hover:bg-primary-700 focus:ring-primary-800">
                    Modifier le commentaire
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal Deletecomment -->
<div id="deletecomment<?=$ID?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center  rounded-lg shadow bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="deletecomment<?=$ID?>">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class=" text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4  text-gray-300">Etes vous sur de vouloir supprimer cette donnée ?</p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deletecomment<?=$ID?>" type="button" class="py-2 px-3 text-sm font-medium   rounded-lg border   focus:ring-4 focus:outline-none focus:ring-primary-300  focus:z-10 bg-gray-700 text-gray-300 border-gray-500 hover:text-white hover:bg-gray-600 focus:ring-gray-600">
                    Non, annuler
                </button>
                <form action="/portfolio/allosimplon/build/traitements/delete/delete_comment.php" method="post" >
                    <input type="text" name="ID" value="<?=$ID?>" class="hidden" selected>
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
                <th scope="row" class="text-center px-1 py-4 font-medium  whitespace-nowrap text-white max-w-[8rem]">
                    <?=$ID?>
                </th>
                <td class="px-6 py-4">
                    <?=$ID_user.', '.$pseudo?>
                </td>
                <td class="px-6 py-4">
                    <?=$film['ID_film'].', '.$film['film_name']?>
                </td>
                <td class="px-6 py-4">
                    <?=$message?>
                </td>
                <td class="px-6 py-4">
                    <?=$date?>
                </td>
                <td class="px-6 py-4">
                    <?=$reports?>
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a data-modal-toggle="modifycomment<?=$ID?>" class="cursor-pointer font-medium p-4 border-blue-600 border rounded-lg   text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a data-modal-toggle="deletecomment<?=$ID?>" class="cursor-pointer font-medium p-4 border-red-600 border rounded-lg  text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>




<script>

const multiSelectWithoutCtrl = ( elemSelector ) => {
    let options = [].slice.call(document.querySelectorAll(`${elemSelector} option`));
    options.forEach(function (element) {
        element.addEventListener("mousedown",
            function (e) {
                e.preventDefault();
                element.parentElement.focus();
                this.selected = !this.selected;
                return false;
            }, false );
    });
}


    multiSelectWithoutCtrl('#dd')
    </script>






<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->



<?php include('../include/general/footer.php')?>

<?php }else{ ?>
<div class=mt-8>Vous n'êtes pas un admnisitrateur ! Zone inaccessible.</div>
<a class="text-main-light" href="/portfolio/allosimplon/build/index.php">Retourner à l'accueil</a>
<?php };}else{ ?>
    <div class=mt-8>Vous n'êtes pas un admnisitrateur ! Zone inaccessible.</div>
    <a class="text-main-light" href="/portfolio/allosimplon/build/index.php">Retourner à l'accueil</a>
<?php } ?>
