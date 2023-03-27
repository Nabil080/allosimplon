<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Films aléatoires</h1>
</div>

<?php $request = GetFilm("ORDER BY rand() ","LIMIT 25");
$film=$request->fetchAll();
// var_dump($film);
?>

<!-- CAROUSEL -->
<section id="five car" class="">
    <div id="dark-carousel" class="relative flex" data-carousel="static">

        <!-- BOUTON PREV -->
        <div class="grow flex justify-end">
            <button type="button" class="z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                <svg aria-hidden="true" class="w-5 h-5 text-main-light sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7"></path></svg>
                <span class="sr-only">Previous</span>
            </span>
            </button>

        </div>
        <!-- Carousel wrapper -->
        <div class="relative h-[40vh] w-[80%] mx-auto overflow-hidden rounded-lg  md:h-96">

            <!-- Item 1 -->
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[0]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[0]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[0]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[0]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[0]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[0]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[0]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[1]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[1]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[1]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[1]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[1]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[1]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[1]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[2]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[2]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[2]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[2]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[2]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[2]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[2]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[3]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[3]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[3]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[3]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[3]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[3]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[3]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[4]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[4]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[4]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[4]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[4]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[4]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[4]['film_photo']?>" class="h-full mx-auto">
                        </div>
                    </div>
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[5]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[5]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[5]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[5]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[5]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[5]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[5]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[6]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[6]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[6]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[6]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[6]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[6]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[6]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[7]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[7]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[7]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[7]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[7]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[7]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[7]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[8]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[8]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[8]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[8]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[8]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[8]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[8]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[9]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[9]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[9]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[9]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[9]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[9]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[9]['film_photo']?>" class="h-full mx-auto">
                        </div>

                    </div>
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[10]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[10]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[10]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[10]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[10]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[10]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[10]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[11]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[11]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[11]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[11]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[11]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[11]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[11]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[12]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[12]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[12]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[12]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[12]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[12]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[12]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[13]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[13]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[13]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[13]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[13]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[13]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[13]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[14]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[14]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[14]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[14]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[14]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[14]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[14]['film_photo']?>" class="h-full mx-auto">
                        </div>
                    </div>
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[15]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[15]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[15]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[15]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[15]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[15]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[15]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[16]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[16]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[16]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[16]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[16]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[16]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[16]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[17]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[17]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[17]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[17]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[17]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[17]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[17]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[18]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[18]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[18]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[18]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[18]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[18]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[18]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[19]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[19]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[19]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[19]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[19]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[19]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[19]['film_photo']?>" class="h-full mx-auto">
                        </div>
                    </div>
            </div>
            <!-- Item 5 -->
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                    <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[20]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[20]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[20]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[20]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[20]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[20]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[20]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[21]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[21]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[21]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[21]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[21]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[21]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[21]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[22]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[22]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[22]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[22]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[22]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[22]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[22]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[23]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[23]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[23]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[23]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[23]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[23]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[23]['film_photo']?>" class="h-full mx-auto">
                        </div>
                        <div class="h-full relative group">
                            <!-- OVERLAY!!! -->
                            <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film[24]['film_date']?></p>
                                    <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                                        <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                                    </i>
                                    <div>
                                        <div class="flex justify-start">
                                            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$film[24]['ID_film']?>"><h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$film[24]['film_name']?></h2></a>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film[24]['film_description'],0,200),'...';?></p>
                                        </div>
                                        <div class="flex justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film[24]['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film[24]['film_grade']) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- IMAGE -->
                            <img src="/portfolio/allosimplon/build/upload/film/<?=$film[24]['film_photo']?>" class="h-full mx-auto">
                        </div>
                    </div>
            </div>




        </div>

        <!-- BOUTON NEXT -->
        <div class="grow flex justify-start">
            <button type="button" class="z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-sand group-hover:bg-sand dark:group-hover:bg-sand group-focus:ring-sand dark:group-focus:ring-sand">
                    <svg aria-hidden="true" class="w-5 h-5 text-main-light sm:w-64 sm:h-64" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" stroke-height="20" d="M9 5l7 7-7 7"></path></svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

</div>
</section>