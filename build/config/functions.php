

<?php

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



?>