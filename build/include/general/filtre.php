<?php

  if(empty($_SESSION['filters'])){
    $url = "/portfolio/allosimplon/build/content/catalogue.php?";
  }else{
    $url = "/portfolio/allosimplon/build/content/catalogue.php?" . $_SESSION['filters']  . "&";
  }
//   var_dump($url);
?>


<!-- FILTRES -->
<div class="grow w-full max-w-[230px] hidden md:block">
        <div class="font-bold text-3xl w-fit notewe">Note IMDb</div>
        <div class="flex gap-x-2 font-bold w-fit my-8 grade text-main-light z-50 text-2xl">
            <a href="<?=$url?>note=2"><button name="one_star"> <input type="text" class="hidden" value="one_star"><i class="fa-regular fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=4"><button name="two_star"> <input type="text" class="hidden" value="two_star"><i class="fa-regular fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=6"><button name="three_star"> <input type="text" class="hidden" value="three_star"><i class="fa-regular fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=8"><button name="four_star"> <input type="text" class="hidden" value="four_star"><i class="fa-regular fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=10"><button name="five_star"> <input type="text" class="hidden" value="five_star"><i class="fa-regular fa-star cursor-pointer"></i></button></a>
        </div>
        <div class="font-bold text-3xl w-fit notewe">Trier par</div>
        <div class="my-8 flex flex-wrap gap-1">
            <a href="<?=$url?>sort=a-z"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>A-Z</button></a>
            <a href="<?=$url?>sort=z-a"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Z-A</button></a>
            <a href="<?=$url?>sort=rand"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Aléatoire</button></a>
            <a href="<?=$url?>sort=asc"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Ascendant</button></a>
            <a href="<?=$url?>sort=desc"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Descendant</button></a>
            <a href="<?=$url?>sort=grade"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Notes</button></a>
            <a href="<?=$url?>sort=a-z"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Vues</button></a>
            <a href="<?=$url?>sort=a-z"><button class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i>Publication</button></a>
        </div>
        <div class="font-bold text-3xl w-fit notewe">Genres</div>
        <div class="my-8 flex flex-wrap gap-1">
            <?php $genre_request=$con->prepare("SELECT * FROM genre");$genre_request->execute();
            while($genre=$genre_request->fetch()){ ?>
            <a href="<?=$url?>genre=<?=$genre['ID_genre']?>">
                <button id="<?=$genre['ID_genre']?>" class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i><?=$genre['genre_name']?></button>
            </a>
            <?php } ?>
        </div>
    </div>