<?php include('../include/head.php')?>

<?php include('../include/nav.php')?>



<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Interface administrateur</h1>
</div>

<!-- burger tab -->
<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class=" bg-gray-700 w-full h-8 py-2 object-center px-auto sm:hidden text-sm font-medium text-center text-gray-50 divide-x divide-gray-200 rounded-lg rounded-b-none shadow dark:divide-gray-700" type="button">Changer de tab</button>
<!-- Dropdown menu -->
<div data-tabs-toggle="#crudtable" role="tablist" id="dropdown" class="w-full z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li class="w-full">
            <button role="tab" aria-controls="film" id="filmtab" data-tabs-target="#film" aria-selected="true" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-tl-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">Film</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="actor" id="actortab" data-tabs-target="#actor" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Acteurs</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="genre" id="genretab" data-tabs-target="#genre" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Genres</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="user" id="usertab" data-tabs-target="#user" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Utilisateurs</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="real" id="realtab" data-tabs-target="#real" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Réalisateurs</button>
        </li>
        <li class="w-full">
            <button role="tab" aria-controls="scenario" id="scenariotab" data-tabs-target="#scenario" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Scénaristes</button>
        </li>
    </ul>
</div>

<!-- normal tab -->
<ul id="crudtab" data-tabs-toggle="#crudtable" role="tablist" class="w-[80%] mx-auto hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg rounded-b-none shadow sm:flex dark:divide-gray-700 dark:text-gray-400">
    <li class="w-full">
        <button role="tab" aria-controls="film" id="filmtab" data-tabs-target="#film" aria-selected="true" class="inline-block w-full p-4 text-gray-900 bg-gray-100 rounded-tl-lg focus:ring-4 focus:ring-blue-300 active focus:outline-none dark:bg-gray-700 dark:text-white" aria-current="page">Film</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="actor" id="actortab" data-tabs-target="#actor" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Acteurs</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="genre" id="genretab" data-tabs-target="#genre" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Genres</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="user" id="usertab" data-tabs-target="#user" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Utilisateurs</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="real" id="realtab" data-tabs-target="#real" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Réalisateurs</button>
    </li>
    <li class="w-full">
        <button role="tab" aria-controls="scenario" id="scenariotab" data-tabs-target="#scenario" aria-selected="false" class="inline-block w-full p-4 bg-white hover:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">Scénaristes</button>
    </li>
</ul>



<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->

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
            <form action="#">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du film</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nom du film" required="">
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durée</label>
                        <input type="number" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="120" required="">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Année</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2009" required="">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="8,00" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Synopsis</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>                    
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres</label>
                        <select multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                            <option value="PH">Calembours</option>
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                            <option value="PH">Calembours</option>
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                            <option value="PH">Calembours</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acteurs</label>
                        <select multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réalisateurs</label>
                        <select  multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Réalisateur 1</option>
                            <option value="PC">Réalisateur 2</option>
                            <option value="PC">Réalisateur 3</option>
                            <option value="PC">Réalisateur 4</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scénario</label>
                        <select multiple  id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                        </select>
                    </div>
                    <div class="col-start-1 col-span-2">
                        <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lien de la vidéo</label>
                        <input type="text" name="video" id="video" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="iframe ytb" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affiche poster</label>
                        <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche" required="">
                    </div>
                    <div>
                        <label for="background" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo background</label>
                        <input type="file" name="background" id="background" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="belle photo" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un film
                </button>
            </form>
        </div>
    </div>
</div>


<!-- Modal ModifyFilm -->
<div id="modifyfilm"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Modifier un film
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modifyfilm">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="#">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du film</label>
                        <input value="ancienne" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nom du film" required="">
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durée</label>
                        <input value="12" type="number" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="120" required="">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Année</label>
                        <input value="12" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2009" required="">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                        <input value="12" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="8,00" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Synopsis</label>
                        <textarea value="ancienne"  id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>                    
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres</label>
                        <select multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                             <option value="PH">Calembours</option>
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                            <option value="PH">Calembours</option>
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                            <option value="PH">Calembours</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acteurs</label>
                        <select multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réalisateurs</label>
                        <select  multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Réalisateur 1</option>
                            <option value="PC">Réalisateur 2</option>
                            <option value="PC">Réalisateur 3</option>
                            <option value="PC">Réalisateur 4</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scénario</label>
                        <select multiple  id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                        </select>
                    </div>
                    <div class="col-start-1 col-span-2">
                        <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lien de la vidéo</label>
                        <input type="text" name="video" id="video" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="iframe ytb" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affiche poster</label>
                        <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche" required="">
                    </div>
                    <div>
                        <label for="background" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo background</label>
                        <input type="file" name="background" id="background" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="belle photo" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un film
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal DeleteFilm -->
<div id="deletefilm" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deletefilm">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Etes vous sur de vouloir supprimer cette donnée ?</p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Non, annuler
                </button>
                <form action="" >
                    <input type="text" value="IDPRODUIT" class="hidden" selected>
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Oui, je suis sûr.
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


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
            <form action="#">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'acteur</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Prénom Nom" required="">
                    </div>
                    <div>
                        <label for="dd" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Films</label>
                        <select multiple  id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Films</option>
                            <option value="TV">Films</option>
                            <option value="TV">Films</option>
                            <option value="TV">Films</option>
                        </select>
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo</label>
                        <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche" required="">
                    </div>

                </div>
                <button type="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un acteur
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal ModifyFilm -->
<div id="modifyfilm"  tabindex="-1" aria-hidden="true" class=" my-auto hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:max-h-[80%]">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-full">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Modifier un actor
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="modifyfilm">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="#">
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du actor</label>
                        <input value="ancienne" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nom du actor" required="">
                    </div>
                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durée</label>
                        <input value="12" type="number" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="120" required="">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Année</label>
                        <input value="12" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2009" required="">
                    </div>
                    <div>
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Note</label>
                        <input value="12" type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="8,00" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Synopsis</label>
                        <textarea value="ancienne"  id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write product description here"></textarea>                    
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genres</label>
                        <select multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                             <option value="PH">Calembours</option>
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                            <option value="PH">Calembours</option>
                            <option value="TV">Action</option>
                            <option value="PC">Aventure</option>
                            <option value="GA">Boutades</option>
                            <option value="PH">Calembours</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Acteurs</label>
                        <select multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                            <option value="TV">Ryan gosling</option>
                            <option value="PC">Leonardo Dicaprio</option>
                            <option value="GA">Messi</option>
                            <option value="PH">Ronaldo</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réalisateurs</label>
                        <select  multiple id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">Réalisateur 1</option>
                            <option value="PC">Réalisateur 2</option>
                            <option value="PC">Réalisateur 3</option>
                            <option value="PC">Réalisateur 4</option>
                        </select>
                    </div>
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Scénario</label>
                        <select multiple  id="dd" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                            <option value="TV">scénariste 1</option>
                        </select>
                    </div>
                    <div class="col-start-1 col-span-2">
                        <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lien de la vidéo</label>
                        <input type="text" name="video" id="video" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="iframe ytb" required="">
                    </div>
                    <div>
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Affiche poster</label>
                        <input type="file" name="photo" id="photo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="affiche" required="">
                    </div>
                    <div>
                        <label for="background" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo background</label>
                        <input type="file" name="background" id="background" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="belle photo" required="">
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Ajouter un actor
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal DeleteFilm -->
<div id="deletefilm" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="deletefilm">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            <p class="mb-4 text-gray-500 dark:text-gray-300">Etes vous sur de vouloir supprimer cette donnée ?</p>
            <div class="flex justify-center items-center space-x-4">
                <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    Non, annuler
                </button>
                <form action="" >
                    <input type="text" value="IDPRODUIT" class="hidden" selected>
                    <button type="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Oui, je suis sûr.
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>






<div id="crudtable" class="relative overflow-x-scroll shadow-md sm:rounded-lg">
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/4.jpg" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    Blade runner
                </td>
                <td class="px-6 py-4">
                    1
                </td>
                <td class="px-6 py-4">
                    163m
                </td>
                <td class="px-6 py-4">
                    2017
                </td>
                <td class="px-6 py-4">
                    8,00
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
<div class="flex justify-center m-5">
    <button id="readProductButton" data-modal-toggle="readProductModal" class="block text-white bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center  dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Plus d'informations
    </button>
</div>

<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full max-h-[80vh]">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            Blade runner
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
                            <li>Sciences-fiction</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Scénario</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Hampton Fancher</li>
                            <li>Michael Green</li>
                            <li>Ridley Scott</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Réalisateurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Denis Villeneuve</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Acteurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Ryan Gosling</li>
                            <li>Harrison Ford</li>
                            <li>Ana de Amars</li>
                            <li>Robin Wright</li>
                            <li>Sylvia Hoeks</li>
                        </ul>
                    </dd>
                    
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Image de fond</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <img src="img/4-bg.jpg" alt="">
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Bande annonce</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <iframe class="w-full aspect-video" width="" height="" src="https://www.youtube.com/embed/FfRPKYwsFNg" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Synopsis</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">Blade Runner 2049 est un film de science-fiction américain réalisé par Denis Villeneuve et sorti en 2017. Il fait suite au film Blade Runner, réalisé par Ridley Scott (producteur de cette suite), sorti en 1982 et adapté du roman Les androïdes rêvent-ils de moutons électriques ? de Philip K. Dick.
                        L'histoire de Blade Runner 2049 se situe trente ans après les aventures de Rick Deckard et raconte les aventures d'un « blade runner » (policier chargé de traquer les réplicants, des androïdes créés à l'image de l'Homme). </dd>
                </dl>
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/4.jpg" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    Blade runner
                </td>
                <td class="px-6 py-4">
                    1
                </td>
                <td class="px-6 py-4">
                    163m
                </td>
                <td class="px-6 py-4">
                    2017
                </td>
                <td class="px-6 py-4">
                    8,00
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
<div class="flex justify-center m-5">
    <button id="readProductButton" data-modal-toggle="readProductModal" class="block text-white bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Plus d'informations
    </button>
</div>

<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full max-h-[80vh]">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            Blade runner
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
                            <li>Sciences-fiction</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Scénario</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Hampton Fancher</li>
                            <li>Michael Green</li>
                            <li>Ridley Scott</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Réalisateurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Denis Villeneuve</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Acteurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Ryan Gosling</li>
                            <li>Harrison Ford</li>
                            <li>Ana de Amars</li>
                            <li>Robin Wright</li>
                            <li>Sylvia Hoeks</li>
                        </ul>
                    </dd>
                    
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Image de fond</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <img src="img/4-bg.jpg" alt="">
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Bande annonce</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <iframe class="w-full aspect-video" width="" height="" src="https://www.youtube.com/embed/FfRPKYwsFNg" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Synopsis</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">Blade Runner 2049 est un film de science-fiction américain réalisé par Denis Villeneuve et sorti en 2017. Il fait suite au film Blade Runner, réalisé par Ridley Scott (producteur de cette suite), sorti en 1982 et adapté du roman Les androïdes rêvent-ils de moutons électriques ? de Philip K. Dick.
                        L'histoire de Blade Runner 2049 se situe trente ans après les aventures de Rick Deckard et raconte les aventures d'un « blade runner » (policier chargé de traquer les réplicants, des androïdes créés à l'image de l'Homme). </dd>
                </dl>
                                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/4.jpg" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    Blade runner
                </td>
                <td class="px-6 py-4">
                    1
                </td>
                <td class="px-6 py-4">
                    163m
                </td>
                <td class="px-6 py-4">
                    2017
                </td>
                <td class="px-6 py-4">
                    8,00
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
<div class="flex justify-center m-5">
    <button id="readProductButton" data-modal-toggle="readProductModal" class="block text-white bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Plus d'informations
    </button>
</div>

<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full max-h-[80vh]">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            Blade runner
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
                            <li>Sciences-fiction</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Scénario</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Hampton Fancher</li>
                            <li>Michael Green</li>
                            <li>Ridley Scott</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Réalisateurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Denis Villeneuve</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Acteurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Ryan Gosling</li>
                            <li>Harrison Ford</li>
                            <li>Ana de Amars</li>
                            <li>Robin Wright</li>
                            <li>Sylvia Hoeks</li>
                        </ul>
                    </dd>
                    
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Image de fond</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <img src="img/4-bg.jpg" alt="">
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Bande annonce</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <iframe class="w-full aspect-video" width="" height="" src="https://www.youtube.com/embed/FfRPKYwsFNg" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Synopsis</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">Blade Runner 2049 est un film de science-fiction américain réalisé par Denis Villeneuve et sorti en 2017. Il fait suite au film Blade Runner, réalisé par Ridley Scott (producteur de cette suite), sorti en 1982 et adapté du roman Les androïdes rêvent-ils de moutons électriques ? de Philip K. Dick.
                        L'histoire de Blade Runner 2049 se situe trente ans après les aventures de Rick Deckard et raconte les aventures d'un « blade runner » (policier chargé de traquer les réplicants, des androïdes créés à l'image de l'Homme). </dd>
                </dl>
                                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/4.jpg" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    Blade runner
                </td>
                <td class="px-6 py-4">
                    1
                </td>
                <td class="px-6 py-4">
                    163m
                </td>
                <td class="px-6 py-4">
                    2017
                </td>
                <td class="px-6 py-4">
                    8,00
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
<div class="flex justify-center m-5">
    <button id="readProductButton" data-modal-toggle="readProductModal" class="block text-white bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Plus d'informations
    </button>
</div>

<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full max-h-[80vh]">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            Blade runner
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
                            <li>Sciences-fiction</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Scénario</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Hampton Fancher</li>
                            <li>Michael Green</li>
                            <li>Ridley Scott</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Réalisateurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Denis Villeneuve</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Acteurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Ryan Gosling</li>
                            <li>Harrison Ford</li>
                            <li>Ana de Amars</li>
                            <li>Robin Wright</li>
                            <li>Sylvia Hoeks</li>
                        </ul>
                    </dd>
                    
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Image de fond</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <img src="img/4-bg.jpg" alt="">
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Bande annonce</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <iframe class="w-full aspect-video" width="" height="" src="https://www.youtube.com/embed/FfRPKYwsFNg" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Synopsis</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">Blade Runner 2049 est un film de science-fiction américain réalisé par Denis Villeneuve et sorti en 2017. Il fait suite au film Blade Runner, réalisé par Ridley Scott (producteur de cette suite), sorti en 1982 et adapté du roman Les androïdes rêvent-ils de moutons électriques ? de Philip K. Dick.
                        L'histoire de Blade Runner 2049 se situe trente ans après les aventures de Rick Deckard et raconte les aventures d'un « blade runner » (policier chargé de traquer les réplicants, des androïdes créés à l'image de l'Homme). </dd>
                </dl>
                                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/4.jpg" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    Blade runner
                </td>
                <td class="px-6 py-4">
                    1
                </td>
                <td class="px-6 py-4">
                    163m
                </td>
                <td class="px-6 py-4">
                    2017
                </td>
                <td class="px-6 py-4">
                    8,00
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
<div class="flex justify-center m-5">
    <button id="readProductButton" data-modal-toggle="readProductModal" class="block text-white bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Plus d'informations
    </button>
</div>

<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full max-h-[80vh]">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            Blade runner
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
                            <li>Sciences-fiction</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Scénario</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Hampton Fancher</li>
                            <li>Michael Green</li>
                            <li>Ridley Scott</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Réalisateurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Denis Villeneuve</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Acteurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Ryan Gosling</li>
                            <li>Harrison Ford</li>
                            <li>Ana de Amars</li>
                            <li>Robin Wright</li>
                            <li>Sylvia Hoeks</li>
                        </ul>
                    </dd>
                    
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Image de fond</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <img src="img/4-bg.jpg" alt="">
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Bande annonce</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <iframe class="w-full aspect-video" width="" height="" src="https://www.youtube.com/embed/FfRPKYwsFNg" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Synopsis</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">Blade Runner 2049 est un film de science-fiction américain réalisé par Denis Villeneuve et sorti en 2017. Il fait suite au film Blade Runner, réalisé par Ridley Scott (producteur de cette suite), sorti en 1982 et adapté du roman Les androïdes rêvent-ils de moutons électriques ? de Philip K. Dick.
                        L'histoire de Blade Runner 2049 se situe trente ans après les aventures de Rick Deckard et raconte les aventures d'un « blade runner » (policier chargé de traquer les réplicants, des androïdes créés à l'image de l'Homme). </dd>
                </dl>
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/4.jpg" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    Blade runner
                </td>
                <td class="px-6 py-4">
                    1
                </td>
                <td class="px-6 py-4">
                    163m
                </td>
                <td class="px-6 py-4">
                    2017
                </td>
                <td class="px-6 py-4">
                    8,00
                </td>
                <td class="px-6 py-4">
                    <!-- Modal toggle -->
<div class="flex justify-center m-5">
    <button id="readProductButton" data-modal-toggle="readProductModal" class="block text-white bg-main-light hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Plus d'informations
    </button>
</div>

<!-- Main modal -->
<div id="readProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-scroll overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-3xl h-full max-h-[80vh]">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between mb-4 rounded-t sm:mb-5">
                    <div class="text-lg text-gray-900 md:text-xl dark:text-white">
                        <h3 class="font-semibold ">
                            Blade runner
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
                            <li>Sciences-fiction</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Scénario</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Hampton Fancher</li>
                            <li>Michael Green</li>
                            <li>Ridley Scott</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Réalisateurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Denis Villeneuve</li>
                        </ul>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Acteurs</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <ul>
                            <li>Ryan Gosling</li>
                            <li>Harrison Ford</li>
                            <li>Ana de Amars</li>
                            <li>Robin Wright</li>
                            <li>Sylvia Hoeks</li>
                        </ul>
                    </dd>
                    
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Image de fond</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <img src="img/4-bg.jpg" alt="">
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Bande annonce</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">
                        <iframe class="w-full aspect-video" width="" height="" src="https://www.youtube.com/embed/FfRPKYwsFNg" title="YouTube video player" frameborder="0"  allowfullscreen></iframe>
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-gray-900 dark:text-white w-full bg-main-default py-2 my-2">Synopsis</dt>
                    <dd class="mb-4 font- text-gray-500 sm:mb-5 dark:text-gray-300">Blade Runner 2049 est un film de science-fiction américain réalisé par Denis Villeneuve et sorti en 2017. Il fait suite au film Blade Runner, réalisé par Ridley Scott (producteur de cette suite), sorti en 1982 et adapté du roman Les androïdes rêvent-ils de moutons électriques ? de Philip K. Dick.
                        L'histoire de Blade Runner 2049 se situe trente ans après les aventures de Rick Deckard et raconte les aventures d'un « blade runner » (policier chargé de traquer les réplicants, des androïdes créés à l'image de l'Homme). </dd>
                </dl>
                                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-3 sm:space-x-4">
                        <button type="button" class="text-white bg-blue-600 hover:bg-blue-700 inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
            
        </tbody>
    </table>
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/ryan.jpg" class="w-full objet-cover" alt="">
                </th>
                <td class="px-6 py-4">
                    Ryan Gosling
                </td>
                <td class="px-6 py-4">
                    48
                </td>
                <td class="px-6 py-4">
                    Blade runner, lame coureur..
                    Blade runner, lame coureur..
                </td>
                
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>


        </tbody>
    </table>
    <table id="genre" aria-labelledby="genretab" class="w-[80%] mx-auto text-sm text-left text-gray-500 dark:text-gray-300 hidden">
        <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-300 [&_th]:text-center">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> -->
                <th scope="col" class="px-6 py-3">
                    Nom du Genre
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="text-center px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    Sciences-Fiction
                </th>
                <td class="px-6 py-4">
                    24
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>


        </tbody>
    </table>
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
                    E-mail utilisateur
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Films favoris
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="text-center px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    12
                </th>
                <td class="px-6 py-4">
                    nabil@mail.com
                </td>
                <td class="px-6 py-4">
                    Admin
                </td>
                <td class="px-6 py-4">
                    santa marita, louurd
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>


        </tbody>
    </table>
    <table id="real" aria-labelledby="realtab" class="w-[80%] mx-auto text-sm text-left text-gray-500 dark:text-gray-300 hidden">
        <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-300 [&_th]:text-center">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> -->
                <th scope="col" class="px-6 py-3">
                    Photo
                </th>
                <th scope="col" class="px-6 py-3">
                    Nom du réalisateur
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Films
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/hampton.jpg" class="w-full objet-cover" alt="">
                </th>
                <td scope="row" class="text-center px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    Hampton Fancher
                </td>
                <td class="px-6 py-4">
                    12
                </td>
                <td class="px-6 py-4">
                    One Piece, Entre, Autres!!
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>


        </tbody>
    </table>
    <table id="scenario" aria-labelledby="scenariotab" class="w-[80%] mx-auto text-sm text-left text-gray-500 dark:text-gray-300 hidden">
        <thead class="text-xs text-gray-700 uppercase  dark:bg-gray-700 dark:text-gray-300 [&_th]:text-center">
            <tr>
                <!-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="[&_td]:text-center">
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 h-fit">
                <!-- <td class="w-4 py-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> -->
                <th scope="row" class="px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    <img src="img/denis.jpg" class="w-full objet-cover" alt="">
                </th>
                <td scope="row" class="text-center px-1 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white max-w-[8rem]">
                    Denis Villeneuve
                </td>
                <td class="px-6 py-4">
                    12
                </td>
                <td class="px-6 py-4">
                    One Piece, Entre, Autres!!
                </td>
                                <td class="">
                    <div class="space-x-3 justify-center my-auto h-full flex ">
                        <a href="#" class="font-medium p-4 border-blue-600 border rounded-lg  text-blue-600 dark:text-blue-500 hover:text-gray-50 hover:bg-blue-500">Modifier</a>
                        <a href="#" class="font-medium p-4 border-red-600 border rounded-lg text-red-600 dark:text-red-500 hover:text-gray-50 hover:bg-red-500">Remove</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>











<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->
<!-- SECTION CRUD SECTION CRUD SECTION CRUD -->



<?php include('../include/footer.php')?>
