<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once '../config/connexion.php';
require_once '../config/functions.php';
?>

<?php include('../include/general/head.php')?>

<?php include('../include/general/nav.php')?>


<div class="flex justify-center mt-28 mb-6">
<h1 class="font-bold text-4xl">Vos films favoris</h1>
</div>



<!-- SECTION CATALOGUE -->

<section class="flex justify-center">
<div class="w-[1500px] mx-12 flex gap-4">
    <!-- FILTRES -->
    <?php include('../include/general/filtre.php')?>
    <!-- PAGE -->
    <div>
        <!-- pagination -->
<div class="flex justify-center my-4  ">
    <nav aria-label="Page navigation example">
        <ul class="inline-flex items-center -space-x-px">
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Previous</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">1</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">2</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-main-light font-bold">3</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">4</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">5</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Next</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- CATALOGUE -->
        <div class="grid gap-4 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:-grid-cols-5 [&_img]:w-full [&_img]:h-full object-cover ">
            <?php $ID_user=$_SESSION['ID_user'];

                $request = GetUserFilm($ID_user," ","LIMIT 16");
                while($film=$request->fetch()){
                    $photo=$film['film_photo'];
                    $name=$film['film_name'];
                    $ID=$film['ID_film'];
                    $time=$film['film_time'];
                    $date=$film['film_date'];
                    $note=$film['film_grade'];
                    $description=$film['film_description'];
                ?>
            <div class="group relative">
            <a href="/portfolio/allosimplon/build/content/film.php?page=<?=$ID?>"   class="cursor-pointer h-full">
                <div class="absolute w-full h-full bg-main-dark bg-opacity-80 opacity-0 group-hover:opacity-100 group p-4">
                    <div class="relative w-full h-full flex flex-col justify-between">
                        <p class="font-bold text-xl cursor-dark"><?=$date?></p>
                        <i class="fa-regular fa-heart cursor-pointer absolute text-main-light right-0 top-0 text-2xl group/fav">
                            <i class="fa-solid fa-heart cursor-pointer absolute right-0 top-0 text-2xl text-main-light hidden group-hover/fav:block "></i>
                        </i>
                        <div>
                            <div class="flex justify-start">
                                <h2 class="underline font-bold text-main-light text-2xl mb-2"><?=$name?></h2>
                            </div>
                            <div class="flex justify-start">
                                <p class="font-normal cursor-dark"><?php echo substr($description,0,200),'...' ?>
                                </p>
                            </div>
                            <div class="flex justify-between h-auto mt-4 text-center">
                                <div class="flex justify-start align-bottom">
                                    <?=$time?>min
                                </div>
                                <div class="flex justify-end">
                                    <?php Stars($note) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="" src="/portfolio/allosimplon/build/upload/film/<?=$photo?>" alt="<?=$name?>">
                </a>
            </div>
            <?php } ?>
        </div>
<!-- pagination -->
<div class="flex justify-center my-4  ">
    <nav aria-label="Page navigation example">
        <ul class="inline-flex items-center -space-x-px">
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="block px-3 py-2 ml-0 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
              <span class="sr-only">Previous</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
            </a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">1</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">2</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" aria-current="page" class="z-10 px-3 py-2 leading-tight text-main-light font-bold">3</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">4</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">5</a>
          </li>
          <li>
            <a href="/portfolio/allosimplon/build/content/#" class="block px-3 py-2 leading-tight text-gray-400 hover:text-main-light hover:font-bold ">
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



<?php include('../include/general/footer.php')?>
