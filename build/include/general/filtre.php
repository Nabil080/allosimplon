<!-- FILTRES -->
<div class="grow w-full max-w-[230px] hidden md:block">
        <div class="font-bold text-3xl w-fit notewe">Note IMDb</div>
        <div class="flex gap-x-2 font-bold w-fit my-8 grade text-main-light z-50 text-2xl">
            <form method="get" action="get_note.php"><button type="submit" name="one_star"> <input type="text" class="hidden" value="one_star"><i class="fa-regular fa-star cursor-pointer"></i></button></form>
            <form method="get" action="get_note.php"><button type="submit" name="two_star"> <input type="text" class="hidden" value="two_star"><i class="fa-regular fa-star cursor-pointer"></i></button></form>
            <form method="get" action="get_note.php"><button type="submit" name="three_star"> <input type="text" class="hidden" value="three_star"><i class="fa-regular fa-star cursor-pointer"></i></button></form>
            <form method="get" action="get_note.php"><button type="submit" name="four_star"> <input type="text" class="hidden" value="four_star"><i class="fa-regular fa-star cursor-pointer"></i></button></form>
            <form method="get" action="get_note.php"><button type="submit" name="five_star"> <input type="text" class="hidden" value="five_star"><i class="fa-regular fa-star cursor-pointer"></i></button></form>
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
            <?php $genre_request=$con->prepare("SELECT * FROM genre");$genre_request->execute();
            while($genre=$genre_request->fetch()){ ?>
            <form method="get" action="get_genre.php">
                <button type="submit" id="<?=$genre['ID_genre']?>" class="border-gray-700 p-2 hover:border-main-light hover:bg-main-hover border-2 rounded-md active:text-black" ><i class="fa-solid fa-plus"></i><?=$genre['genre_name']?></button>
            </form>
            <?php } ?>
        </div>
    </div>