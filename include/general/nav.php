<nav id="navbar" class="text-main-light bg-main-dark fixed top-0 w-full z-40 ease-out duration-300">
    <div id="nav-contain" class="flex p-4 md:gap-4  w-full h-20 md:px-[10%]">
        <img src="/portfolio/allosimplon/upload/site/popcorn.png" class="basis-auto" alt="logo"><a class="self-center" href="/portfolio/allosimplon/index.php">
            <span class="text-gray-100 uppercase self-center text-base md:text-xl ">SimplonFilm</span></a>
        <form action="/portfolio/allosimplon/traitements/search.php" method="get" class="grow flex relative">
            <input id="searchBar" onkeyup="filterFunction()" onfocusout="clearSearchBar()" minlength="2" <?php if(isset($_GET['search'])){echo 'value="'.$_GET['search'].'"';} ?> type="text" name="search" class="bg-main-dark placeholder:italic pl-4 hidden md:block border border-solid  basis-full text-gray-100  focus:ring-0" placeholder="Cherchez un film!" >
            <button type="submit"><i class="fa fa-search absolute top-2 right-3 text-2xl hidden md:block"></i></button>
            <div id="searchResult" style="display:none;"  class="absolute top-12 flex flex-col w-full bg-main-dark gap-2 [&>*]:px-4 [&>*]:py-2 border border-t-transparent ">
                <?php
                $film_req = getFilm("","");
                $all_film = $film_req->fetchAll(PDO::FETCH_ASSOC);
                foreach($all_film as $film_search){
                    $url = "/portfolio/allosimplon/content/catalogue.php?page=1&search=".$film_search['film_name'];?>
                    <a href="<?=$url?>" class="hover:text-gray-300 text-lg w-full hover:bg-gray-100 hover:bg-opacity-20 "><?=$film_search['film_name']?></a>
                <?php }?>
            </div>
        </form>
        <div class="items-center flex basis-auto text-4xl gap-6">
            <!-- Modal toggle -->
            <?php if(isset($_SESSION['ID_user'])){ ?>
                <h2 class="text-gray-50 text-base sm:text-2xl block ml-2">Bonjour,<button class="pl-2 text-main-light underline hover:text-main-hover" data-modal-target="profil" data-modal-toggle="profil"><?=$_SESSION['user_pseudo']?></button></h2>
                <?php }else{?>
                <button class="rounded-lg hover:bg-main-hover" data-modal-target="login" data-modal-toggle="login" ><i class="fa fa-user w-full h-full p-2"></i></button>
            <?php }?>
            <button class="rounded-lg hover:bg-main-hover" onclick="toggleMobileMenu(burgermenu)"><i class="fa fa-bars w-full h-full p-2"></i></button>
        </div>
    </div>
    <div id="burgermenu" class="hidden text-gray-100 flex flex-col md:flex-row justify-center mb-4 text-xl gap-8 [&>a]:underline [&>button]:underline [&>button]:text-gray-50 [&>a]:text-gray-50 font-bold px-[10%]">
    <form action="/portfolio/allosimplon/traitements/search.php" method="get" class="grow flex relative md:hidden">
        <input minlength="2" <?php if(isset($_GET['search'])){echo 'value="'.$_GET['search'].'"';} ?> type="search" name="search" class="bg-main-dark placeholder:italic pl-4 border border-solid  basis-full text-gray-100  focus:ring-0" placeholder="Cherchez un film!" >
        <button type="submit"><i class="fa fa-search absolute top-2 right-3 text-2xl"></i></button>
    </form>
    <button><a class="hover:text-gray-300" href="/portfolio/allosimplon/index.php">Accueil</a>
        <button data-dropdown-delay="100" data-dropdown-trigger="hover" data-dropdown-toggle="CatalogueDropdown" class="hidden md:block"><a class="hover:text-gray-300 no-underline" href="/portfolio/allosimplon/content/catalogue.php?page=1">Catalogue<i class="fa-solid fa-chevron-down pl-1 text-lg"></i></a></button>
        <button class="block md:hidden"><a class="hover:text-gray-300 no-underline" href="/portfolio/allosimplon/content/catalogue.php?page=1">Catalogue</a></button>
            <div id="CatalogueDropdown" class="hidden bg-main-dark border-t-main-default px-[10%]"><ul class="flex gap-4 flex-wrap mb-4 justify-center [&_li]:text-xl [&_li]:text-main-light [&_li]:underline">
                <a href="/portfolio/allosimplon/content/catalogue?page=1&sort=a-z"><li class="hover:text-main-hover">Par ordre alphabétique</li></a>
                <a href="/portfolio/allosimplon/content/catalogue?page=1&sort=fav"><li class="hover:text-main-hover">Par nombre de likes</li></a>
                <a href="/portfolio/allosimplon/content/catalogue?page=1&sort=grade"><li class="hover:text-main-hover">Par note IMDb</li></a>
                <a href="/portfolio/allosimplon/content/catalogue?page=1&sort=date"><li class="hover:text-main-hover">Par ordre de sortie</li></a>
                <a href="/portfolio/allosimplon/content/catalogue?page=1&sort=asc"><li class="hover:text-main-hover">Par ordre d'ajout</li></a>
                <a href="/portfolio/allosimplon/content/catalogue?page=1&sort=rand"><li class="hover:text-main-hover">Par ordre aléatoire</li></a>
            </ul></div>
        <button><a class="hover:text-gray-300" href="/portfolio/allosimplon/content/actor.php">Acteurs</a></button>
        <button class=" no-underline"  data-dropdown-delay="100" data-dropdown-trigger="hover" data-dropdown-toggle="GenresDropdown">Genres<i class="fa-solid fa-chevron-down pl-1 text-lg"> </i></button>
            <div id="GenresDropdown" class="hidden bg-main-dark border-t-main-default px-[10%]"><ul class=" flex gap-4 flex-wrap mb-4 justify-center">
            <?php $genre_list_request=$con->prepare("SELECT * FROM genre");$genre_list_request->execute();while($genre_list=$genre_list_request->fetch()){?>
                <a href="/portfolio/allosimplon/content/catalogue.php?page=1&genre[]=<?=$genre_list['ID_genre']?>"class=""><li class="text-xl text-main-light hover:text-main-hover  underline "> <?=$genre_list['genre_name']?> </li></a>
            <?php } ?>
            </ul></div>
        <button <?php if(isset($_SESSION['ID_user'])){ ?>data-modal-target="profil" data-modal-toggle="profil"<?php }else{ ?> data-modal-target="login" data-modal-toggle="login" <?php } ?> class="underline text-main-light " >Profil</button>
    </div>
    </div>
</nav>

<?php
if(!empty($_GET['message'])){?>
<button id="message_box" class="duration-500 ease-linear fixed top-[10%] right-16 px-5 py-2 md:px-10 md:py-5 bg-main-light bg-opacity-80 z-50 animate-bounce rounded-lg hover:bg-main-hover">
    <?php
    if($_GET['message']=="no_form"){echo'Venez depuis un formulaire !';}
    if($_GET['message']=="missing_element"){echo'Un élément est manquant !';}

    if($_GET['message']=="mail_invalid"){echo'E-mail invalide!';}
    if($_GET['message']=="mail_existing"){echo'E-mail déjà existant!';}
    if($_GET['message']=="size_verif_password"){echo'Les mots de passes ne correspondent pas ou sont trop longs !';}
    if($_GET['message']=="size_pseudo"){echo'Le pseudo est trop long ou invalide !';}
    if($_GET['message']=="inscrit"){echo'Inscrit avec succès !';}

    if($_GET['message']=="wrong_mail"){echo'E-mail incorrect !';}
    if($_GET['message']=="wrong_password"){echo'Mot-de-passe incorrect !';}
    if($_GET['message']=="connected"){echo'Connecté avec succès !';}
    if($_GET['message']=="not_connected"){echo'Vous n\'êtes pas connecté !';}

    if($_GET['message']=="update_password"){echo'Mot-de-passe modifié !';}
    if($_GET['message']=="update_mail"){echo'E-mail modifié !';}
    if($_GET['message']=="mail_verif_error"){echo'Les e-mails ne correspondent pas !';}
    if($_GET['message']=="update_pseudo"){echo'Pseudo modifié !';}

    if($_GET['message']=="add_comment"){echo'Commentaire ajouté !';}
    if($_GET['message']=="update_comment"){echo'Commentaire modifié !';}
    if($_GET['message']=="delete_comment"){echo'Commentaire supprimé !';}
    if($_GET['message']=="report_comment"){echo'Commentaire signalé !';}

    if($_GET['message']=="add_note"){echo'Note ajouté !';}
    if($_GET['message']=="update_note"){echo'Note modifié !';}

    if($_GET['message']=="add_fav"){echo'Ajouté aux favoris !';}
    if($_GET['message']=="delete_fav"){echo'Supprimé des favoris !';}

    if($_GET['message']=="add_film"){echo'Film ajouté !';}
    if($_GET['message']=="update_film"){echo'Film modifié !';}
    if($_GET['message']=="delete_film"){echo'Film supprimé !';}

    if($_GET['message']=="add_user"){echo'Utilisateur ajouté !';}
    if($_GET['message']=="update_user"){echo'Utilisateur modifié !';}
    if($_GET['message']=="delete_user"){echo'Utilisateur supprimé !';}

    if($_GET['message']=="add_actor"){echo'Acteur ajouté !';}
    if($_GET['message']=="update_actor"){echo'Acteur modifié !';}
    if($_GET['message']=="delete_actor"){echo'Acteur supprimé !';}

    if($_GET['message']=="add_realisator"){echo'Réalisateur ajouté !';}
    if($_GET['message']=="update_realisator"){echo'Réalisateur modifié !';}
    if($_GET['message']=="delete_realisator"){echo'Réalisateur supprimé !';}

    if($_GET['message']=="add_scenarist"){echo'Scénariste ajouté !';}
    if($_GET['message']=="update_scenarist"){echo'Scénariste modifié !';}
    if($_GET['message']=="delete_scenarist"){echo'Scénariste supprimé !';}

    if($_GET['message']=="add_genre"){echo'Genre ajouté !';}
    if($_GET['message']=="update_genre"){echo'Genre modifié !';}
    if($_GET['message']=="delete_genre"){echo'Genre supprimé !';}

    if($_GET['message']=="size_error"){echo'Fichier trop volumnieux !';}
    if($_GET['message']=="format_error"){echo'Format du fichier incorrect !';}
    if($_GET['message']=="move_file"){echo'Le fichier a été déplace dans le serveur !';}
    if($_GET['message']=="move_file_error"){echo'Le fichier n\'a pas été déplacé dans le serveur !';}
    if($_GET['message']=="file_error"){echo'Erreur avec le fichier !';}
}

    ?>
</button>
<script>
setTimeout(function() {
    var message_box = document.getElementById("message_box");
    message_box.classList.add("opacity-0");
    setTimeout(function() {
    message_box.remove();
    }, 500);
}, 3000);


function filterFunction() {
    var input, filter, a, i;
    input = document.getElementById("searchBar");
    filter = input.value.toUpperCase();
    div = document.getElementById("searchResult");
    div.style.display = "block";
    a = div.getElementsByTagName("a");
    for (i = 0; i < a.length; i++) {
        txtValue = a[i].textContent || a[i].innerText;

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            a[i].style.display = "block";
            console.log(txtValue);
        } else {
            a[i].style.display = "none";
        }
    }
}

function clearSearchBar(){
    let div = document.getElementById("searchResult");
    if (!div.contains(event.relatedTarget)) {
        div.style.display = "none";
    }
}

</script>

<?php if(!isset($_SESSION['ID_user'])){ ?>
<!-- Login modal -->
<section id="login" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-main-dark border-main-light border-2 rounded-lg shadow text-gray-100">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-gray-100" data-modal-hide="login">
                <svg data-modal-hide="login" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- CONNEXION -->
            <div id="co" class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium  text-gray-100">Connectez vous</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/connexion/login.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-gray-100">E-mail</label>
                        <input type="email" name="email" id="email" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-gray-100">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Se connecter</button>
                    <div class="text-sm font-bold text-gray-1000 text-gray-300">
                        Pas encore inscrit ? <a onclick="switchDiv()" class="hover:underline text-main-light cursor-pointer">Créer un compte</a>
                    </div>
                </form>
            </div>
            <!-- INSCRIPTION -->
            <div id="paco" class="hidden px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium  text-gray-100">Inscrivez vous</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/connexion/sign.php" method="post">
                    <div>
                    <label for="pseudo" class="block mb-2 text-sm font-medium  text-gray-100"> Pseudo </label>
                        <input type="text" name="pseudo" maxlength="16" id="pseudo" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" placeholder="Pseudo" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-gray-100"> E-mail </label>
                        <input type="email" name="email" id="email" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-gray-100"> Mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <div>
                        <label for="password_verif" class="block mb-2 text-sm font-medium  text-gray-100"> Vérifiez le mot de passe </label>
                        <input type="password" name="password_verif" id="password_verif" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> S'inscrire </button>
                    <div class="text-sm font-bold text-gray-1000 text-gray-300">
                        Déjà inscrit ? <a onclick="switchDiv()" class="hover:underline text-main-light cursor-pointer"> Se connecter </a>
                    </div>
                </form>
            </div>
          </div>
      </div>
</section>

<?php } ?>

<script>
function switchDiv() {
    var div1 = document.getElementById("co");
    var div2 = document.getElementById("paco");
    if (div1.style.display === "none") {
        div1.style.display = "block";
        div2.style.display = "none";
    } else {
        div1.style.display = "none";
        div2.style.display = "block";
    }
}
</script>
<script>
    function toggleMobileMenu(menu) {
    menu.classList.toggle('hidden')
    }
    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos){
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-80px";
    }
    prevScrollpos = currentScrollPos;
    } 
</script>

<?php if(isset($_SESSION['ID_user'])){?>
<!-- Profil modal -->
<button class="z-10 fixed bottom-8 right-8 bg-main-light rounded-full hover:bg-main-hover" data-modal-target="profil" data-modal-toggle="profil" ><i class="fa fa-user w-full h-full p-2"></i></button>
<section id="profil" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-main-dark border-main-light border-2 rounded-lg shadow text-gray-100">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent   rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-gray-100" data-modal-hide="profil">
                <svg data-modal-hide="profil" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"> <animate attributeName="stroke-dashoffset" values="360;0" dur="2s" repeatCount="indefinite"></animate>
 </path>
</svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- CONTENU PROFIL -->
            <div id="profil_card" class="px-6 py-6 lg:px-8">
                <h3 class="text-2xl font-medium text-gray-100">Bonjour,<span class="pl-1 decoration-main-light underline font-bold "><?=$_SESSION['user_pseudo']?></span></h3>
                <a class="mb-4 text-main-light cursor-pointer" onclick="switchPseudo()">Modifier le pseudo</a>
                <div class="flex text-main-light justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-48 h-48">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="mb-3">
                    <p class="text-lg font-bold">Votre E-mail: <span class="font-normal"><?=$_SESSION['user_email']?></span> </p>
                    <a class="text-main-light cursor-pointer" onclick="switchMail()">Modifier l'E-mail</a>
                </div>
                <div class="mb-3">
                    <p class="text-lg font-bold">Votre Mot de passe: <span class="font-normal">********</span></p>
                    <a class="text-main-light cursor-pointer" onclick="switchPass()">Modifier le mot de passe</a>
                </div>
                <div class="flex justify-center">
                    <button type="button" class=" text-gray-100 bg-main-light hover:bg-main-hover focus:ring-main-light focus:ring-offset-main-light font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 focus:outline-none"><a href="/portfolio/allosimplon/content/favoris.php">Voir vos favoris</a></button>
                    <?php if($_SESSION['ID_role']==1){?><button type="button" class=" text-gray-100 bg-main-light hover:bg-main-hover focus:ring-main-light focus:ring-offset-main-light font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 focus:outline-none"><a href="/portfolio/allosimplon/content/crud.php">Interface admin</a></button><?php }?>
                </div>
                <div class="flex justify-end w-full">
                    <a class="text-sm text-main-light ml-4" href="/portfolio/allosimplon/traitements/connexion/logout.php">Se déconnecter</a>
                </div>
            </div>
            <!-- CONTENU MODIFIER PSEUDO -->
            <div id="pseudo_form" class="px-6 py-6 lg:px-8 hidden">
                <h3 class="mb-4 text-2xl font-medium text-gray-100">Modifier votre<span class="pl-1 decoration-main-light underline font-bold">pseudo</span></h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/modify/modify_pseudo.php" method="post">
                    <div>
                        <label for="pseudo" class="block mb-2 text-sm font-medium  text-gray-100"> Nouveau pseudo </label>
                        <input value="<?=$_SESSION['user_pseudo']?>" type="pseudo" name="pseudo" id="pseudo" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" placeholder="Pseudonyme" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-gray-100"> Mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> Se connecter </button>
                    <div class="text-sm font-bold text-gray-1000 text-gray-300">
                        Vous avez changé d'avis ? <a onclick="switchPseudo()" class="hover:underline text-main-light cursor-pointer"> Retour au profil </a>
                    </div>
                </form>
            </div>
            <!-- CONTENU MODIFIER EMAIL -->
            <div id="mail_form" class="px-6 py-6 lg:px-8 hidden">
                <h3 class="mb-4 text-2xl font-medium text-gray-100">Modifier votre<span class="pl-1 decoration-main-light underline font-bold">E-mail</span></h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/modify/modify_mail.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  text-gray-100"> Nouvel e-mail </label>
                        <input value="<?=$_SESSION['user_email']?>" type="email" name="email" id="email" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="email_verif" class="block mb-2 text-sm font-medium  text-gray-100"> Vérifiez l'E-mail </label>
                        <input type="email" name="email_verif" id="email_verif" placeholder="E-mail" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-gray-100"> Mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> Se connecter </button>
                    <div class="text-sm font-bold text-gray-1000 text-gray-300">
                        Vous avez changé d'avis ? <a onclick="switchMail()" class="hover:underline text-main-light cursor-pointer"> Retour au profil </a>
                    </div>
                </form>
            </div>
            <!-- CONTENU MODIFIER PASSWORD -->
            <div id="pass_form" class="px-6 py-6 lg:px-8 hidden">
                <h3 class="mb-4 text-2xl font-medium text-gray-100">Modifier votre<span class="pl-1 decoration-main-light underline font-bold">mot de passe</span></h3>
                <form class="space-y-6" action="/portfolio/allosimplon/traitements/modify/modify_password.php" method="post">
                    <div>
                        <label for="new_password" class="block mb-2 text-sm font-medium  text-gray-100"> Nouveau mot de passe </label>
                        <input type="password" name="new_password" id="new_password" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <div>
                        <label for="password_verif" class="block mb-2 text-sm font-medium  text-gray-100"> Vérifiez le mot de passe </label>
                        <input type="password" name="password_verif" id="password_verif" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  text-gray-100"> Ancien mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class=" border   text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> Se connecter </button>
                    <div class="text-sm font-bold text-gray-1000 text-gray-300">
                        Vous avez changé d'avis ? <a onclick="switchPass()" class="hover:underline text-main-light cursor-pointer"> Retour au profil </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php }?>
<script>
    function switchPseudo() {
        var profil = document.getElementById("profil_card");
        var mail = document.getElementById("pseudo_form");
        if (profil.style.display === "none") {
        profil.style.display = "block";
        mail.style.display = "none";
        } else {
        profil.style.display = "none";
        mail.style.display = "block";
        }
    }
    function switchMail() {
        var profil = document.getElementById("profil_card");
        var mail = document.getElementById("mail_form");
        if (profil.style.display === "none") {
        profil.style.display = "block";
        mail.style.display = "none";
        } else {
        profil.style.display = "none";
        mail.style.display = "block";
        }
    }
    function switchPass() {
        var profil = document.getElementById("profil_card");
        var pass = document.getElementById("pass_form");
        if (profil.style.display === "none") {
        profil.style.display = "block";
        pass.style.display = "none";
        } else {
        profil.style.display = "none";
        pass.style.display = "block";
        }
    }
</script>