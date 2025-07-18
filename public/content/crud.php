<?php
session_start();
require_once '../config/connexion.php';
require_once '../config/functions.php';

?>

<?php include ('../include/general/head.php') ?>

<?php include ('../include/general/nav.php') ?>

<?php if (isset($_SESSION['ID_role'])) {
    if ($_SESSION['ID_role'] == 1) { ?>


<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Interface administrateur</h1>
</div>

<center><a href="/content/comment_crud.php" class="text-main-light underline hover:text-main-hover">Comment crud (WIP)</a></center>

<!-- burger tab -->
<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" bg-gray-700 w-full h-8 py-2 object-center px-auto sm:hidden text-sm font-medium text-center text-gray-50 divide-x  rounded-lg rounded-b-none shadow divide-gray-700" type="button">Changer de tab</button>
<!-- Dropdown menu -->
<div data-tabs-toggle="#crudtable" role="tablist" id="dropdown" class="w-full z-10 hidden divide-y divide-gray-100 rounded-lg shadow bg-gray-700">
    <ul class="py-2 text-sm  text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li class="w-full">
            <button role="tab" aria-controls="film" id="filmtab" data-tabs-target="#film" class="inline-block w-full p-4   rounded-tl-lg focus:ring-4 active focus:outline-none bg-gray-700 text-white" aria-current="page">Film</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="actor" id="actortab" data-tabs-target="#actor" class="inline-block w-full p-4 hover:text-gray-700  focus:ring-4 focus:outline-none bg-gray-800 hover:bg-gray-700">Acteurs</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="genre" id="genretab" data-tabs-target="#genre" class="inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Genres</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="user" id="usertab" data-tabs-target="#user" class="inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Utilisateurs</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="real" id="realtab" data-tabs-target="#real" class="inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Réalisateurs</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="scenario" id="scenariotab" data-tabs-target="#scenario" class="inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Scénaristes</button>
        </li>
    </ul>
</div>

<!-- normal tab -->
<ul id="crudtab" data-tabs-toggle="#crudtable" role="tablist" class="w-[80%] mx-auto hidden text-sm font-medium text-center  divide-x  rounded-lg rounded-b-none shadow sm:flex divide-gray-700 text-gray-400">
    <li class="w-full">
        <button role="tab" aria-controls="film" id="filmtab" data-tabs-target="#film" class="aria-selected:text-gray-50 aria-selected:bg-gray-700 inline-block w-full p-4  rounded-tl-lg focus:ring-4 active focus:outline-none bg-gray-800 text-gray-400" aria-current="page">Film</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="actor" id="actortab" data-tabs-target="#actor" class="aria-selected:text-gray-50 aria-selected:bg-gray-700 inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Acteurs</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="real" id="realtab" data-tabs-target="#real" class="aria-selected:text-gray-50 aria-selected:bg-gray-700 inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Réalisateurs</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="scenario" id="scenariotab" data-tabs-target="#scenario" class="aria-selected:text-gray-50 aria-selected:bg-gray-700 inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Scénaristes</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="genre" id="genretab" data-tabs-target="#genre" class="aria-selected:text-gray-50 aria-selected:bg-gray-700 inline-block w-full p-4   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Genres</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="user" id="usertab" data-tabs-target="#user" class="aria-selected:text-gray-50 aria-selected:bg-gray-700 inline-block w-full p-4 rounded-tr-lg   focus:ring-4 focus:outline-none hover:text-white bg-gray-800 hover:bg-gray-700">Utilisateurs</button>
    </li>
</ul>



<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->


<div id="crudtable" class="relative overflow-x-scroll shadow-md sm:rounded-lg">
    <?php include ('../include/crud/film_table.php') ?>
    <?php include ('../include/crud/actor_table.php') ?>
    <?php include ('../include/crud/realisator_table.php') ?>
    <?php include ('../include/crud/scenarist_table.php') ?>
    <?php include ('../include/crud/genre_table.php') ?>
    <?php include ('../include/crud/user_table.php') ?>
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



<?php include ('../include/general/footer.php') ?>

<?php } else { ?>
<div class=mt-8>Vous n'êtes pas un admnisitrateur ! Zone inaccessible.</div>
<a class="text-main-light" href="/index.php">Retourner à l'accueil</a>
<?php };
} else { ?>
    <div class=mt-8>Vous n'êtes pas un admnisitrateur ! Zone inaccessible.</div>
    <a class="text-main-light" href="/index.php">Retourner à l'accueil</a>
<?php } ?>
