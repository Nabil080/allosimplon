<div class="flex justify-center mt-20 lg:mt-28 mb-6">
<h1 class="font-bold text-2xl lg:text-4xl">Les plus appréciés</h1>
</div>


<!-- CAROUSEL -->
<section id="five car" class="hidden sm:block">
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
        <div class="relative h-96 w-full md:w-[80%] mx-auto overflow-hidden rounded-lg md:h-[400px]  2xl:max-h-[80vh] ">

            <!-- Item 1 -->
<?php $request = GetFilm("ORDER BY likes DESC ","LIMIT 0,5");// var_dump($film);?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                <div class="absolute block md:gap-2 sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php while($film=$request->fetch()){ ?>
                        <div class="h-full relative group reveal">
                            <a href="/content/film.php?page=<?=$film['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <!-- OVERLAY!!! -->
                            <div class="hidden lg:block z-50 absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film['film_date']?></p>
                                    <?php
                                        if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
                                    ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-xl mb-2"><?=substr($film['film_name'],0,40)?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film['film_description'],0,150),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film['film_grade'],$film['ID_film']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="h-96 md:h-[400px]  xl:max-h-[80vh]  mx-auto w-fit relative">
                                    <div class="block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden bg-main-light "><?=$film['film_date']?></div>
                                    <div class="block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}?></div>
                                    <div class="block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto lg:group-hover:hidden"><?php Stars($film['film_grade'],$film['ID_film']);?></div>
                                    <img src="/upload/film/<?=$film['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Item 2 -->
<?php $request = GetFilm("ORDER BY likes DESC ","LIMIT 5,10");// var_dump($film);?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php while($film=$request->fetch()){ ?>
                        <div class="h-full relative group">
                            <a href="/content/film.php?page=<?=$film['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <!-- OVERLAY!!! -->
                            <div class="hidden lg:block z-50 absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-xl mb-2"><?=substr($film['film_name'],0,30)?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film['film_description'],0,150),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film['film_grade'],$film['ID_film']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="h-96 md:h-[400px]  xl:max-h-[80vh]  mx-auto w-fit relative">
                                    <div class="block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden bg-main-light "><?=$film['film_date']?></div>
                                    <div class="block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}?></div>
                                    <div class="block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto lg:group-hover:hidden"><?php Stars($film['film_grade'],$film['ID_film']);?></div>
                                    <img src="/upload/film/<?=$film['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Item 3 -->
<?php $request = GetFilm("ORDER BY likes DESC ","LIMIT 10,15");// var_dump($film);?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php while($film=$request->fetch()){ ?>
                        <div class="h-full relative group">
                            <a href="/content/film.php?page=<?=$film['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <!-- OVERLAY!!! -->
                            <div class="hidden lg:block z-50 absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-xl mb-2"><?=substr($film['film_name'],0,30)?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film['film_description'],0,150),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film['film_grade'],$film['ID_film']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="h-96 md:h-[400px]  xl:max-h-[80vh]  mx-auto w-fit relative">
                                    <div class="block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden bg-main-light "><?=$film['film_date']?></div>
                                    <div class="block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}?></div>
                                    <div class="block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto lg:group-hover:hidden"><?php Stars($film['film_grade'],$film['ID_film']);?></div>
                                    <img src="/upload/film/<?=$film['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Item 4 -->
<?php $request = GetFilm("ORDER BY likes DESC ","LIMIT 15,20");// var_dump($film);?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php while($film=$request->fetch()){ ?>
                        <div class="h-full relative group">
                            <a href="/content/film.php?page=<?=$film['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <!-- OVERLAY!!! -->
                            <div class="hidden lg:block z-50 absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-xl mb-2"><?=substr($film['film_name'],0,30)?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film['film_description'],0,150),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film['film_grade'],$film['ID_film']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="h-96 md:h-[400px]  xl:max-h-[80vh]  mx-auto w-fit relative">
                                    <div class="block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden bg-main-light "><?=$film['film_date']?></div>
                                    <div class="block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}?></div>
                                    <div class="block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto lg:group-hover:hidden"><?php Stars($film['film_grade'],$film['ID_film']);?></div>
                                    <img src="/upload/film/<?=$film['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Item 5 -->
<?php $request = GetFilm("ORDER BY likes DESC ","LIMIT 20,25");// var_dump($film);?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                <div class="absolute block md:gap-2 md:grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <?php while($film=$request->fetch()){ ?>
                        <div class="h-full relative group">
                            <a href="/content/film.php?page=<?=$film['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <!-- OVERLAY!!! -->
                            <div class="hidden lg:block z-50 absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film['film_date']?></p>
                            <?php
                                if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
                            ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-xl mb-2"><?=substr($film['film_name'],0,30)?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film['film_description'],0,150),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film['film_grade'],$film['ID_film']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="h-96 md:h-[400px]  xl:max-h-[80vh]  mx-auto w-fit relative">
                                    <div class="block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden bg-main-light "><?=$film['film_date']?></div>
                                    <div class="block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}?></div>
                                    <div class="block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto lg:group-hover:hidden"><?php Stars($film['film_grade'],$film['ID_film']);?></div>
                                    <img src="/upload/film/<?=$film['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div>
                    <?php } ?>
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

<!-- CAROUSEL MOBILE -->
<section id="five car" class="block sm:hidden">
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
        <div class="relative h-96 w-full md:w-[80%] mx-auto overflow-hidden rounded-lg md:h-[400px]  xl:max-h-[80vh]">

            <!-- Item 1 -->
                <?php $request = GetFilm("ORDER BY film_grade DESC ","LIMIT 25");// var_dump($film);?>
                <?php while($film=$request->fetch()){ ?>
            <div class="hidden duration-3000 ease-in-out h-full" data-carousel-item>
                <div class="absolute block md:gap-2 sm:grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 justify-items-center  h-full w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        <div class="h-full relative group">
                            <a href="/content/film.php?page=<?=$film['ID_film']?>" class="h-full cursor-pointer overflow-hidden">
                            <!-- OVERLAY!!! -->
                            <div class="hidden lg:block z-50 absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                                <div class="relative w-full h-full flex flex-col justify-between">
                                    <p class="font-bold text-xl cursor-dark"><?=$film['film_date']?></p>
                                    <?php
                                        if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}
                                    ?>
                                    <div>
                                        <div class="flex justify-start">
                                            <h2 class="underline font-bold text-main-light text-xl mb-2"><?=$film['film_name']?></h2>
                                        </div>
                                        <div class="flex justify-start">
                                            <p class="font-normal"><?=substr($film['film_description'],0,150),'...';?></p>
                                        </div>
                                        <div class="flex flex-wrap justify-between h-auto mt-4 text-center">
                                            <div class="flex justify-start align-bottom">
                                                <?=$film['film_time']?>min
                                            </div>
                                            <div class="flex justify-end">
                                                <?php Stars($film['film_grade'],$film['ID_film']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    <!-- IMAGE -->
                                <div class="h-96 md:h-[400px]  xl:max-h-[80vh] mx-auto w-fit relative">
                                    <div class="block absolute top-1 left-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden bg-main-light "><?=$film['film_date']?></div>
                                    <div class="block absolute top-1 right-1 text-md p-1 rounded-lg font-bold text-gray-50 lg:group-hover:hidden"><?php if(isset($_SESSION['ID_user'])){isFilmFav($film['ID_film'],$_SESSION['ID_user'],$film['likes']);}else{ShowFakeFav($film['likes']);}?></div>
                                    <div class="block absolute bottom-2 text-md p-1 rounded-lg font-bold text-gray-50 w-full mx-auto lg:group-hover:hidden"><?php Stars($film['film_grade'],$film['ID_film']);?></div>
                                    <img src="/upload/film/<?=$film['film_photo']?>" class="h-full">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Item 2 -->
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