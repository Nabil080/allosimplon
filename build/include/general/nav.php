<?php
?>

<nav id="navbar" class="text-main-light bg-main-dark fixed top-0 w-full z-40 ease-out duration-300">
<div id="nav-contain" class="flex p-4 gap-4  w-full h-20 md:px-[10%]">
    <img src="/portfolio/allosimplon/build/img/popcorn.png" class="basis-auto" alt="logo"><a class="self-center" href="/portfolio/allosimplon/build/index.php">
        <span class="text-gray-100 uppercase self-center text-xl ">SimplonFilm</span></a>
    <form action="" method="get" class="grow flex relative">
        <input type="search" name="search" class="bg-main-dark placeholder:italic pl-4 hidden md:block border border-solid  basis-full text-gray-100  focus:ring-0" placeholder="Cherchez un film!" >
        <button type="submit"><i class="fa fa-search absolute top-2 right-3 text-2xl"></i></button>
    </form>
    <div class="items-center flex basis-auto text-4xl gap-6">
        <!-- Modal toggle -->
        <?php if(isset($_SESSION['ID_user'])){ ?>
            <h2 class="text-gray-50 text-2xl">Bonjour,<button class="pl-2 text-main-light" data-modal-target="profil" data-modal-toggle="profil"><?=$_SESSION['user_pseudo']?></button></h2>
            <?php }else{?>
            <button class="rounded-lg hover:bg-main-hover" data-modal-target="login" data-modal-toggle="login" ><i class="fa fa-user w-full h-full p-2"></i></button>
        <?php }?>
        <button class="rounded-lg hover:bg-main-hover" onclick="toggleMobileMenu(burgermenu)"><i class="fa fa-bars w-full h-full p-2"></i></button>
    </div>
</div>
<div id="burgermenu" class="hidden text-gray-100 h-screen md:h-96 lg:h-56 flex p-4 text-3xl gap-8  font-bold px-[15%]">
<div id="leftmenu" class="basis-auto flex-col flex justify-between underline">
    <a href="/portfolio/allosimplon/build/index.php">Accueil</a>
    <a href="/portfolio/allosimplon/build/content/catalogue.php?page=1">Catalogue</a>
    <a href="/portfolio/allosimplon/build/content/actor.php">Acteurs</a>
</div>
    <ul class="text-lg grow font-normal text-main-light flex-wrap flex flex-col w-6">
            <a href="/portfolio/allosimplon/build/content/catalogue.php" class="underline text-3xl text-gray-100 font-bold">Genres</a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Action </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Amateur </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Animation </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Aventure </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Catastrophe </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Chevaliers </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Comédie </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Documentaires </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Drame </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Fantastique </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Guerre/histoire </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Horreur </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Héros </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Musical </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Opéra </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Policier </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Sciences-fiction </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Sketch </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Sport </li></a>
            <a href="" class=""><li class="hover:underline decoration-main-light "> Western </li></a>
    </ul>

<div id="rightmenu" class="">
    <a href="" class="underline">Profil</a>
    <ul class="text-lg font-normal text-main-light">
        <a href="/portfolio/allosimplon/build/content/favoris.php"><li>Favoris</li></a>
        <a data-modal-target="login" data-modal-toggle="login"><li>Informations</li></a>
        <a href="/portfolio/allosimplon/build/traitements/connexion/logout.php"><li>Se déconnecter</li></a>
    </ul>
</div>
</div>



</nav>
<!-- Login modal -->
<section id="login" data-modal-placement="center" tabindex="-1" aria-hidden="true" class="backdrop:brightness-50 fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
    <div class="relative w-full h-fit max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-main-dark border-main-light border-2 rounded-lg shadow text-gray-100">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-gray-100" data-modal-hide="authentication-modal">
                <svg data-modal-hide="login" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- CONNEXION -->
            <div id="co" class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium  dark:text-gray-100">Connectez vous</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/build/traitements/connexion/login.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  dark:text-gray-100">E-mail</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  dark:text-gray-100">Mot de passe</label>
                        <input type="password" name="password" id="password" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Se connecter</button>
                    <div class="text-sm font-bold text-gray-1000 dark:text-gray-300">
                        Pas encore inscrit ? <a onclick="switchDiv()" class="hover:underline text-main-light cursor-pointer">Créer un compte</a>
                    </div>
                </form>
            </div>
            <!-- INSCRIPTION -->
            <div id="paco" class="hidden px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium  dark:text-gray-100">Inscrivez vous</h3>
                <form class="space-y-6" action="/portfolio/allosimplon/build/traitements/connexion/sign.php" method="post">
                    <div>
                    <label for="pseudo" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Pseudo </label>
                        <input type="text" name="pseudo" maxlength="16" id="pseudo" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" placeholder="Pseudo" required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  dark:text-gray-100"> E-mail </label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="password_verif" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Vérifiez le mot de passe </label>
                        <input type="password" name="password_verif" id="password_verif" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> Se connecter </button>
                    <div class="text-sm font-bold text-gray-1000 dark:text-gray-300">
                        Déjà inscrit ? <a onclick="switchDiv()" class="hover:underline text-main-light cursor-pointer"> Se connecter </a>
                    </div>
                </form>
            </div>
          </div>
      </div>
</section>
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
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-gray-100" data-modal-hide="authentication-modal">
                <svg data-modal-hide="profil" aria-hidden="true" class="w-5 h-5 text-main-light" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"> <animate attributeName="stroke-dashoffset" values="360;0" dur="2s" repeatCount="indefinite"></animate>
 </path>
</svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- CONTENU PROFIL -->
            <div id="profil_card" class="px-6 py-6 lg:px-8">
                <h3 class="text-2xl font-medium dark:text-gray-100">Bonjour,<span class="pl-1 decoration-main-light underline font-bold"><?=$_SESSION['user_pseudo']?></span></h3>
                <a class="mb-4 text-main-light cursor-pointer" onclick="switchPseudo()">Modifier le pseudo</a>
                <div class="flex text-main-light justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-48 h-48">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="mb-3">
                    <p class="text-lg font-bold">Votre E-mail: <span class="font-normal">bellilanabil@gmail.com</span> </p>
                    <a class="text-main-light cursor-pointer" onclick="switchMail()">Modifier l'E-mail</a>
                </div>
                <div class="mb-3">
                    <p class="text-lg font-bold">Votre Mot de passe: <span class="font-normal">********</span></p>
                    <a class="text-main-light cursor-pointer" onclick="switchPass()">Modifier le mot de passe</a>
                </div>
                <div class="flex justify-center">
                    <button type="button" class=" text-gray-100 bg-main-light hover:bg-main-hover focus:ring-main-light focus:ring-offset-main-light font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 focus:outline-none"><a href="/portfolio/allosimplon/build/content/favoris.php">Voir vos favoris</a></button>
                    <?php if($_SESSION['ID_role']==1){?><button type="button" class=" text-gray-100 bg-main-light hover:bg-main-hover focus:ring-main-light focus:ring-offset-main-light font-medium rounded-lg  px-5 py-2.5 mr-2 mb-2 focus:outline-none"><a href="/portfolio/allosimplon/build/content/crud.php">Interface admin</a></button><?php }?>
                </div>
                <div class="flex justify-end w-full">
                    <a class="text-sm text-main-light ml-4" href="/portfolio/allosimplon/build/traitements/connexion/logout.php">Se déconnecter</a>
                </div>
            </div>
            <!-- CONTENU MODIFIER PSEUDO -->
            <div id="pseudo_form" class="px-6 py-6 lg:px-8 hidden">
                <h3 class="mb-4 text-2xl font-medium dark:text-gray-100">Modifier votre<span class="pl-1 decoration-main-light underline font-bold">pseudo</span></h3>
                <form class="space-y-6" action="/portfolio/allosimplon/build/traitements/modify/modify_pseudo.php" method="post">
                    <div>
                        <label for="pseudo" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Pseudo </label>
                        <input value="<?=$_SESSION['user_pseudo']?>" type="pseudo" name="pseudo" id="pseudo" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" placeholder="Pseudonyme" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> Se connecter </button>
                    <div class="text-sm font-bold text-gray-1000 dark:text-gray-300">
                        Vous avez changé d'avis ? <a onclick="switchPseudo()" class="hover:underline text-main-light cursor-pointer"> Retour au profil </a>
                    </div>
                </form>
            </div>
            <!-- CONTENU MODIFIER EMAIL -->
            <div id="mail_form" class="px-6 py-6 lg:px-8 hidden">
                <h3 class="mb-4 text-2xl font-medium dark:text-gray-100">Modifier votre<span class="pl-1 decoration-main-light underline font-bold">E-mail</span></h3>
                <form class="space-y-6" action="/portfolio/allosimplon/build/traitements/modify/modify_mail.php" method="post">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium  dark:text-gray-100"> E-mail </label>
                        <input value="<?=$_SESSION['user_email']?>" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="email_verif" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Vérifiez l'E-mail </label>
                        <input type="email" name="email_verif" id="email_verif" placeholder="E-mail" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> Se connecter </button>
                    <div class="text-sm font-bold text-gray-1000 dark:text-gray-300">
                        Vous avez changé d'avis ? <a onclick="switchMail()" class="hover:underline text-main-light cursor-pointer"> Retour au profil </a>
                    </div>
                </form>
            </div>
            <!-- CONTENU MODIFIER PASSWORD -->
            <div id="pass_form" class="px-6 py-6 lg:px-8 hidden">
                <h3 class="mb-4 text-2xl font-medium dark:text-gray-100">Modifier votre<span class="pl-1 decoration-main-light underline font-bold">mot de passe</span></h3>
                <form class="space-y-6" action="/portfolio/allosimplon/build/traitements/modify/modify_password.php" method="post">
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Ancien mot de passe </label>
                        <input type="password" name="password" id="password" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="new_password" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Nouveau mot de passe </label>
                        <input type="password" name="new_password" id="new_password" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <div>
                        <label for="password_verif" class="block mb-2 text-sm font-medium  dark:text-gray-100"> Vérifiez le mot de passe </label>
                        <input type="password" name="password_verif" id="password_verif" placeholder="*********" class="bg-gray-50 border border-gray-300  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-100" required>
                    </div>
                    <button type="submit" class="w-full text-gray-100 bg-main-light hover:bg-main-hover focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center "> Se connecter </button>
                    <div class="text-sm font-bold text-gray-1000 dark:text-gray-300">
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