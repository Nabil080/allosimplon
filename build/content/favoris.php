<?php include('../include/nav.php')?>

<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Favoris</h1>
</div>



<!-- SECTION CATALOGUE -->

<section class="flex justify-center">
<div class="w-[1500px] mx-12 flex gap-4">
    <!-- FILTRES -->
    <div class="grow w-full hidden md:block">
        <div class="font-bold text-3xl w-fit notewe">Note IMDb</div>
        <div class=" my-8 grade text-main-light z-50 text-2xl">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
            <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
        </div>
        <div class="font-bold text-3xl w-fit notewe">Trier par</div>
        <div class="my-8 flex flex-wrap gap-1">
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>A-Z</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Z-A</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Aléatoire</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Ascendant</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Descendant</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Notes</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Vues</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Publication</button>
        </div>
        <div class="font-bold text-3xl w-fit notewe">Genres</div>
        <div class="my-8 flex flex-wrap gap-1">
            <button id="slt" class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Action</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Amateur</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Animation</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Aventure</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Catastrophe</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Comédie</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Documentaire</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Drame</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Fantastique</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Guerre</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Histoire</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Médiéval</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Musical</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Opéra</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Crime</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Sciences-fiction</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Sketchs</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Sport</button>
            <button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Western</button>
        </div>
    </div>
    <!-- PAGE -->
    <div>
        <!-- pagination -->
<div class="flex justify-center my-4  ">
    <nav aria-label="Page navigation example">
        <ul class="inline-flex items-center -space-x-px">
          <li>
            <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Previous</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">1</a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">2</a>
          </li>
          <li>
            <a href="#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-main-light font-bold">3</a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">4</a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">5</a>
          </li>
          <li>
            <a href="#" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Next</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- CATALOGUE -->
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:-grid-cols-5 [&>*]:w-full [&>*]:h-full object-cover ">
            <div class="group relative">
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark">2022</p>
                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                        </i>
                        <div>
                            <div class="flex justify-start">
                                <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                </p>
                            </div>
                            <div class="flex justify-center mt-6 mb-2">
                                <div class="grade text-main-light z-50 text-2xl">
                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                    <i class="fa-solid fa-star cursor-pointer"></i>
                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                    <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="" src="img/1.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav ">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/2.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/3.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/4.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/5.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/6.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/7.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/8.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/9.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/10.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/1.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/2.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/3.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/4.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/5.jpg" alt="">
            </div>
            <div class="group relative">
                                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark">2022</p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="film.html" class="cursor-pointer"><h2 class="underline font-bold text-main-light text-2xl mb-2">Le Joker</h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal cursor-dark">Arthur  Fleck, comédien raté, rencontre des voyous violents en errant dans les  rues de Gotham City déguisé en clown. Méprisé par la société, Fleck  s'enfonce peu à peu dans la démence...
                                            </p>
                                        </div>
                                        <div class="flex justify-center mt-6 mb-2">
                                            <div class="grade text-main-light z-50 text-2xl">
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-solid fa-star cursor-pointer"></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                                <i class="fa-regular fa-star cursor-pointer relative group/star"><i class="fa-solid fa-star cursor-pointer absolute top-0 left-0 hidden group-hover/star:block"></i></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <img class="object-cover w-full h-full" src="img/6.jpg" alt="">
            </div>
        </div>
<!-- pagination -->
<div class="flex justify-center my-4  ">
    <nav aria-label="Page navigation example">
        <ul class="inline-flex items-center -space-x-px">
          <li>
            <a href="#" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Previous</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">1</a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">2</a>
          </li>
          <li>
            <a href="#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-main-light font-bold">3</a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">4</a>
          </li>
          <li>
            <a href="#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">5</a>
          </li>
          <li>
            <a href="#" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Next</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    </div>
</div>
</section>

<!-- FOOTER -->

<section id="footer" class="bg-main-dark h-24 mt-12 flex justify-center">
    <div class="flex justify-center items-center">
        <div class="mr-4 text-xl"> Rejoignez nous sur les réseaux !</div>
        <div class="  text-main-light">
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-instagram far"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-twitter far"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f far"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-youtube far"></i></a>
            <a href="contact.html" target="_blank"><i class="fa-solid fa-envelope far"></i></a>
        </div>
    </div>

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>