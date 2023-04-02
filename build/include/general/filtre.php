<?php

// $unique_genre=$con->prepare("SELECT DISTINCT ID_genre from film_genre");$unique_genre->execute();
// $unique_genre_array=$unique_genre->fetchAll(PDO::FETCH_ASSOC);var_dump($unique_genre_array);
// $unique_genre_string=implode(", ",$unique_genre_array);
?>


<!-- FILTRES -->
<div id="filtres" class="mt-2 grow w-full md:max-w-[230px] hidden md:block">
        <div class="font-bold text-xl md:text-3xl w-fit notewe">Note IMDb</div>
        <div class="flex gap-x-2 font-bold w-fit  my-4 md:my-8 grade text-main-light z-50 text-2xl">
            <a href="<?=$url?>note=2"><button name="one_star"> <input type="text" class="hidden" value="one_star"><i class="fa-regular<?php if(isset($_GET['note'])){if($_GET['note']=="2" || $_GET['note']=="4" || $_GET['note']=="6" || $_GET['note']=="8" || $_GET['note']=="10"){echo " fa-solid ";}else{echo " fa-regular ";} }?> fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=4"><button name="two_star"> <input type="text" class="hidden" value="two_star"><i class="<?php if(isset($_GET['note'])){if($_GET['note']=="4" || $_GET['note']=="6" || $_GET['note']=="8" || $_GET['note']=="10"){echo " fa-solid ";}else{echo " fa-regular ";} }?> fa-regular fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=6"><button name="three_star"> <input type="text" class="hidden" value="three_star"><i class="<?php if(isset($_GET['note'])){if($_GET['note']=="6" || $_GET['note']=="8" || $_GET['note']=="10"){echo " fa-solid ";}else{echo " fa-regular ";} }?> fa-regular fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=8"><button name="four_star"> <input type="text" class="hidden" value="four_star"><i class="<?php if(isset($_GET['note'])){if($_GET['note']=="8" || $_GET['note']=="10"){echo " fa-solid ";}else{echo " fa-regular ";} }?>fa-regular fa-star cursor-pointer"></i></button></a>
            <a href="<?=$url?>note=10"><button name="five_star"> <input type="text" class="hidden" value="five_star"><i class="<?php if(isset($_GET['note'])){if($_GET['note']=="10"){echo " fa-solid ";}else{echo " fa-regular ";} }?>fa-regular fa-star cursor-pointer"></i></button></a>
        </div>
        <div class="font-bold text-xl md:text-3xl w-fit notewe">Trier par</div>
        <div class=" my-4 md:my-8 flex flex-wrap gap-1">
            <a href="<?=$url?>sort=a-z"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="a-z"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>A-Z</button></a>
            <a href="<?=$url?>sort=z-a"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="z-a"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>Z-A</button></a>
            <a href="<?=$url?>sort=rand"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="rand"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>Aléatoire</button></a>
            <a href="<?=$url?>sort=asc"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="asc"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>Ascendant</button></a>
            <a href="<?=$url?>sort=desc"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="desc"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>Descendant</button></a>
            <a href="<?=$url?>sort=grade"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="grade"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>Notes</button></a>
            <a href="<?=$url?>sort=fav"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="fav"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>Likes</button></a>
            <a href="<?=$url?>sort=date"><button class="p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black <?php if(isset($_GET['sort'])){if($_GET['sort']=="date"){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> " ><i class="fa-solid fa-plus"></i>Date</button></a>
        </div>
        <div class="font-bold text-xl md:text-3xl w-fit notewe">Genres</div>
        <form method="post" action="/portfolio/allosimplon/build/traitements/delete/delete_filter.php"><button type="submit" name="submit">Retirer les filtres</button></form>
        <div class=" my-4 md:my-8 flex flex-wrap gap-1">
            <?php
            // var_dump($_GET['genre']);
            // $genre_buttons="WHERE ID_genre IN(".implode(", ",$_GET['genre']).")";
            // $genre_request=$con->prepare("SELECT * FROM genre ".$genre_buttons." ORDER BY genre_name ASC");$genre_request->execute();
            $genre_request=$con->prepare("SELECT * FROM genre ORDER BY genre_name ASC");$genre_request->execute();
            while($genre=$genre_request->fetch()){ ?>
            <a href="<?=$url?>genre[]=<?=$genre['ID_genre']?>">
                <button id="<?=$genre['ID_genre']?>" class=" p-2 hover:border-main-light hover:bg-main-hover <?php if(isset($_GET['genre'])){if(in_array($genre['ID_genre'],$_GET['genre'])){echo" bg-main-hover pointer-events-none border-main-light hover:border-gray-700 ";}else{echo 'border-gray-700';}}else{echo' border-gray-700 ';}; ?> border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i><?=$genre['genre_name']?></button>
            </a>
            <?php } ?>
        </div>
    </div>

<?php


?>

