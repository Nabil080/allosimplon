<?php

function GetFilm($LIMIT){
    if(require("connexion.php")){
        $request=$con->prepare("SELECT * FROM film $LIMIT");
            $request->execute();
            return $request;
    }
}

function GetFilmActor($ID_film, $show_ID, $show_photo, $show_name){
if(require("connexion.php")){

// selectionne ID_actor dans film_actor là où film.ID_film = film_actor.ID_film
$ID_actor_request=$con->prepare(
    "SELECT
        ID_actor
    FROM film_actor
    WHERE ID_film = $ID_film");
$ID_actor_request->execute();
while($ID_actor=$ID_actor_request->fetch()){

    // selectionne * dans actor là où film_actor.ID_actor = actor.ID_actor
    $actor_request=$con->prepare(
        "SELECT
            *
        FROM actor
        WHERE ID_actor =  $ID_actor[0]"
        );
    $actor_request->execute();
    while($actor=$actor_request->fetch()){

        $actor_ID = $actor['ID_actor'];
        $actor_photo = $actor['actor_photo'];
        $actor_name = $actor['actor_name'];

        if($show_ID=="true"){
            echo $actor_ID, '<br>';
        }
        if($show_photo=="true"){
            echo $actor_photo, '<br>';
        }
        if($show_name=="true"){
            echo $actor_name, '<br>';
        }

    }
}
}
}


function GetFilmRealisator($ID_film, $show_ID, $show_photo, $show_name){
    if(require("connexion.php")){
    
    // selectionne ID_realisator dans film_realisator là où film.ID_film = film_realisator.ID_film
    $ID_realisator_request=$con->prepare(
        "SELECT
            ID_realisator
        FROM film_realisator
        WHERE ID_film = $ID_film");
    $ID_realisator_request->execute();
    while($ID_realisator=$ID_realisator_request->fetch()){
    
        // selectionne * dans realisator là où film_realisator.ID_realisator = realisator.ID_realisator
        $realisator_request=$con->prepare(
            "SELECT
                *
            FROM realisator
            WHERE ID_realisator =  $ID_realisator[0]"
            );
        $realisator_request->execute();
        while($realisator=$realisator_request->fetch()){
    
            $realisator_ID = $realisator['ID_realisator'];
            $realisator_photo = $realisator['realisator_photo'];
            $realisator_name = $realisator['realisator_name'];
    
            if($show_ID=="true"){
                echo $realisator_ID, '<br>';
            }
            if($show_photo=="true"){
                echo $realisator_photo, '<br>';
            }
            if($show_name=="true"){
                echo $realisator_name, '<br>';
            }
    
        }
    }
    }
    }

function GetFilmGenre($ID_film, $show_ID, $show_name){
    if(require("connexion.php")){

    // selectionne ID_genre dans film_genre là où film.ID_film = film_genre.ID_film
    $ID_genre_request=$con->prepare(
        "SELECT
            ID_genre
        FROM film_genre
        WHERE ID_film = $ID_film");
    $ID_genre_request->execute();
    while($ID_genre=$ID_genre_request->fetch()){

        // selectionne * dans genre là où film_genre.ID_genre = genre.ID_genre
        $genre_request=$con->prepare(
            "SELECT
                *
            FROM genre
            WHERE ID_genre =  $ID_genre[0]"
            );
        $genre_request->execute();
        while($genre=$genre_request->fetch()){

            $genre_ID = $genre['ID_genre'];
            $genre_name = $genre['genre_name'];

            if($show_ID=="true"){
                echo $genre_ID, '<br>';
            }
            if($show_name=="true"){
                echo $genre_name, '<br>';
            }

        }
    }
    }
    }

function GetFilmScenarist($ID_film, $show_ID, $show_photo, $show_name){
    if(require("connexion.php")){
    
    // selectionne ID_scenarist dans film_scenarist là où film.ID_film = film_scenarist.ID_film
    $ID_scenarist_request=$con->prepare(
        "SELECT
            ID_scenarist
        FROM film_scenarist
        WHERE ID_film = $ID_film");
    $ID_scenarist_request->execute();
    while($ID_scenarist=$ID_scenarist_request->fetch()){
    
        // selectionne * dans scenarist là où film_scenarist.ID_scenarist = scenarist.ID_scenarist
        $scenarist_request=$con->prepare(
            "SELECT
                *
            FROM scenarist
            WHERE ID_scenarist =  $ID_scenarist[0]"
            );
        $scenarist_request->execute();
        while($scenarist=$scenarist_request->fetch()){
    
            $scenarist_ID = $scenarist['ID_scenarist'];
            $scenarist_photo = $scenarist['scenarist_photo'];
            $scenarist_name = $scenarist['scenarist_name'];
    
            if($show_ID=="true"){
                echo $scenarist_ID, '<br>';
            }
            if($show_photo=="true"){
                echo $scenarist_photo, '<br>';
            }
            if($show_name=="true"){
                echo $scenarist_name, '<br>';
            }
    
        }
    }
    }
    }

function GetActorFilm($ID_actor){
    if(require("connexion.php")){

    // selectionne ID_actor dans actor_filmlà où actor.ID_actor = actor_actor.ID_actor
    $ID_film_request=$con->prepare(
        "SELECT
            ID_film
        FROM film_actor
        WHERE ID_actor = $ID_actor");
    $ID_film_request->execute();
    while($ID_film=$ID_film_request->fetch()){

        // selectionne * dans filmlà où actor_actor.ID_film= actor.ID_actor
        $film_request=$con->prepare(
            "SELECT
                *
            FROM film
            WHERE ID_film =  $ID_film[0]"
            );
        $film_request->execute();
        while($film=$film_request->fetch()){

            $film_name = $film['film_name'];
            echo $film_name, '<br>';
        }
    }
    }
    }

function GetGenreFilm($ID_genre){
    if(require("connexion.php")){

    // selectionne ID_genre dans genre_filmlà où genre.ID_genre = genre_genre.ID_genre
    $ID_film_request=$con->prepare(
        "SELECT
            ID_film
        FROM film_genre
        WHERE ID_genre = $ID_genre");
    $ID_film_request->execute();
    while($ID_film=$ID_film_request->fetch()){

        // selectionne * dans filmlà où genre_genre.ID_film= genre.ID_genre
        $film_request=$con->prepare(
            "SELECT
                *
            FROM film
            WHERE ID_film =  $ID_film[0]"
            );
        $film_request->execute();
        while($film=$film_request->fetch()){

            $film_name = $film['film_name'];
            echo $film_name, '<br>';
        }
    }
    }
    }

function GetScenaristFilm($ID_scenarist){
    if(require("connexion.php")){

    // selectionne ID_scenarist dans scenarist_filmlà où scenarist.ID_scenarist = scenarist_scenarist.ID_scenarist
    $ID_film_request=$con->prepare(
        "SELECT
            ID_film
        FROM film_scenarist
        WHERE ID_scenarist = $ID_scenarist");
    $ID_film_request->execute();
    while($ID_film=$ID_film_request->fetch()){

        // selectionne * dans filmlà où scenarist_scenarist.ID_film= scenarist.ID_scenarist
        $film_request=$con->prepare(
            "SELECT
                *
            FROM film
            WHERE ID_film =  $ID_film[0]"
            );
        $film_request->execute();
        while($film=$film_request->fetch()){

            $film_name = $film['film_name'];
            echo $film_name, '<br>';
        }
    }
    }
    }

function GetRealisatorFilm($ID_realisator){
    if(require("connexion.php")){

    // selectionne ID_realisator dans realisator_filmlà où realisator.ID_realisator = realisator_realisator.ID_realisator
    $ID_film_request=$con->prepare(
        "SELECT
            ID_film
        FROM film_realisator
        WHERE ID_realisator = $ID_realisator");
    $ID_film_request->execute();
    while($ID_film=$ID_film_request->fetch()){

        // selectionne * dans filmlà où realisator_realisator.ID_film= realisator.ID_realisator
        $film_request=$con->prepare(
            "SELECT
                *
            FROM film
            WHERE ID_film =  $ID_film[0]"
            );
        $film_request->execute();
        while($film=$film_request->fetch()){

            $film_name = $film['film_name'];
            echo $film_name, '<br>';
        }
    }
    }
    }

function GetUserFav($ID_user){
    if(require("connexion.php")){
        // selectionne ID_user dans user_fav là où user.ID_user = user_film.ID_user
    $ID_film_request=$con->prepare(
        "SELECT
            ID_film
        FROM user_fav
        WHERE ID_user = $ID_user");
    $ID_film_request->execute();
    while($ID_film=$ID_film_request->fetch()){

        $film_request=$con->prepare(
            "SELECT
                *
            FROM film
            WHERE ID_film = $ID_film[0]"
        );
        $film_request->execute();
        while($film=$film_request->fetch()){

            $film_name = $film['film_name'];
            echo $film_name, '<br>';
        }

    }
    }
}

function SelectFilm(){
    if(require("connexion.php")){
        $select_film_request=$con->prepare(
            "SELECT ID_film, film_name FROM film");
        $select_film_request->execute();
        while($select_film=$select_film_request->fetch()){?>
            <option value=<?=$select_film['ID_film']?>>
                <?=$select_film['film_name']?>
            </option>
        <?php }
    }
};

function SelectActor(){
    if(require("connexion.php")){
        $select_actor_request=$con->prepare(
            "SELECT ID_actor, actor_name FROM actor");
        $select_actor_request->execute();
        while($select_actor=$select_actor_request->fetch()){?>
            <option value=<?=$select_actor['ID_actor']?>>
                <?=$select_actor['actor_name']?>
            </option>
        <?php }
    }
};
function SelectGenre(){
    if(require("connexion.php")){
        $select_genre_request=$con->prepare(
            "SELECT ID_genre, genre_name FROM genre");
        $select_genre_request->execute();
        while($select_genre=$select_genre_request->fetch()){?>
            <option value=<?=$select_genre['ID_genre']?>>
                <?=$select_genre['genre_name']?>
            </option>
        <?php }
    }
};

function SelectRealisator(){
    if(require("connexion.php")){
        $select_realisator_request=$con->prepare(
            "SELECT ID_realisator, realisator_name FROM realisator");
        $select_realisator_request->execute();
        while($select_realisator=$select_realisator_request->fetch()){?>
            <option value=<?=$select_realisator['ID_realisator']?>>
                <?=$select_realisator['realisator_name']?>
            </option>
        <?php }
    }
};
function SelectScenarist(){
    if(require("connexion.php")){
        $select_scenarist_request=$con->prepare(
            "SELECT ID_scenarist, scenarist_name FROM scenarist");
        $select_scenarist_request->execute();
        while($select_scenarist=$select_scenarist_request->fetch()){?>
            <option 
            value=<?=$select_scenarist['ID_scenarist']?>>
                <?=$select_scenarist['scenarist_name']?>
            </option>
        <?php }
    }
};

function SelectedRealisator($ID_film){
    if(require("connexion.php")){
        $select_realisator_request=$con->prepare(
            "SELECT ID_realisator, realisator_name FROM realisator");
            $select_realisator_request->execute();
            while($select_realisator=$select_realisator_request->fetch()){
            $selected_realisator_request=$con->prepare(
                "SELECT ID_film FROM film_realisator WHERE ID_realisator = ? AND ID_film = ? ");
            $selected_realisator_request->execute([$select_realisator['ID_realisator'],$ID_film]);
            $is_realisator_selected=$selected_realisator_request->fetch();
            if($is_realisator_selected){?>
                <option selected
                value=<?=$select_realisator['ID_realisator']?>>
                    <?=$select_realisator['realisator_name']?>
                </option>
            <?php }else{?>
            
                <option
                value=<?=$select_realisator['ID_realisator']?>>
                    <?=$select_realisator['realisator_name']?>
                </option>
            <?php }
    }
}
}

function SelectedActor($ID_film){
    if(require("connexion.php")){
        $select_actor_request=$con->prepare(
            "SELECT ID_actor, actor_name FROM actor");
            $select_actor_request->execute();
            while($select_actor=$select_actor_request->fetch()){
            $selected_actor_request=$con->prepare(
                "SELECT ID_film FROM film_actor WHERE ID_actor = ? AND ID_film = ? ");
            $selected_actor_request->execute([$select_actor['ID_actor'],$ID_film]);
            $is_actor_selected=$selected_actor_request->fetch();
            if($is_actor_selected){?>
                <option selected
                value=<?=$select_actor['ID_actor']?>>
                    <?=$select_actor['actor_name']?>
                </option>
            <?php }else{?>
                <option
                value=<?=$select_actor['ID_actor']?>>
                    <?=$select_actor['actor_name']?>
                </option>
            <?php }
    }
}
}

function SelectedGenre($ID_film){
    if(require("connexion.php")){
        $select_genre_request=$con->prepare(
            "SELECT ID_genre, genre_name FROM genre");
            $select_genre_request->execute();
            while($select_genre=$select_genre_request->fetch()){
            $selected_genre_request=$con->prepare(
                "SELECT ID_film FROM film_genre WHERE ID_genre = ? AND ID_film = ? ");
            $selected_genre_request->execute([$select_genre['ID_genre'],$ID_film]);
            $is_genre_selected=$selected_genre_request->fetch();
            if($is_genre_selected){?>
                <option selected
                value=<?=$select_genre['ID_genre']?>>
                    <?=$select_genre['genre_name']?>
                </option>
            <?php }else{?>
            
                <option
                value=<?=$select_genre['ID_genre']?>>
                    <?=$select_genre['genre_name']?>
                </option>
            <?php }
    }
}
}

function SelectedScenarist($ID_film){
    if(require("connexion.php")){
        $select_scenarist_request=$con->prepare(
            "SELECT ID_scenarist, scenarist_name FROM scenarist");
            $select_scenarist_request->execute();
            while($select_scenarist=$select_scenarist_request->fetch()){
            $selected_scenarist_request=$con->prepare(
                "SELECT ID_film FROM film_scenarist WHERE ID_scenarist = ? AND ID_film = ? ");
            $selected_scenarist_request->execute([$select_scenarist['ID_scenarist'],$ID_film]);
            $is_scenarist_selected=$selected_scenarist_request->fetch();
            if($is_scenarist_selected){?>
                <option selected
                value=<?=$select_scenarist['ID_scenarist']?>>
                    <?=$select_scenarist['scenarist_name']?>
                </option>
            <?php }else{?>
            
                <option
                value=<?=$select_scenarist['ID_scenarist']?>>
                    <?=$select_scenarist['scenarist_name']?>
                </option>
            <?php }
    }
}
}

function SelectedFilm($ID, $ID_select, $table){
    if(require("connexion.php")){
        $select_film_request=$con->prepare(
            "SELECT ID_film, film_name FROM film");
        $select_film_request->execute();
        while($select_film=$select_film_request->fetch()){
            $selected_film_request=$con->prepare(
                "SELECT $ID_select from $table WHERE ID_film = ? AND $ID_select = ?");
            $selected_film_request->execute([$select_film['ID_film'], $ID]);
            $is_film_selected=$selected_film_request->fetch();

            if($is_film_selected){?>
                <option selected
                value=<?=$select_film['ID_film']?>>
                    <?=$select_film['film_name']?>
                </option>
        <?php }else{?>
                <option
                value=<?=$select_film['ID_film']?>>
                    <?=$select_film['film_name']?>
                </option>
        <?php }
        }
    }
}

function Stars($note){

    if($note==0){
    echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==1){
    echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==2){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==3){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==4){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==5){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==6){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==7){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==8){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==9){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-regular fa-star cursor-pointer"></i>
        </div>
    '; }
    if($note==10){
        echo'
        <div class="grade text-main-light z-50 text-2xl text-center">
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
            <i class="fa-solid fa-star cursor-pointer"></i>
        </div>
    '; }
}
?>



