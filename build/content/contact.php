<?php session_start();
require_once '../config/connexion.php';
?>

<?php include('../include/general/head.php')?>

<?php include('../include/general/nav.php')?>

<!-- SECTION CONTACT -->
<section class=" block lg:flex lg:mx-[5%] xl:mx-[15%] 2xl:mx-[18%]  border-main-default mt-24 p-4">
    <!-- INFO CONTACT -->
    <div class="basis-[25%] px-2 py-6">
        <h2 class="font-bold text-xl">Dites nous bonjour </h2>
        <p class="mt-2 text-base text-gray-400">Complétez le formulaire de contact, ou écrivez nous sur ce mail : <a href="mailto:allosimplon@contact.com" class="text-main-light">allosimplon@contact.com</a></p>
        <p class="mt-2 text-gray-400">ou contactez nous par téléphone :</p>
        <p class="text-main-light">06 38 05 89 97</p>
        <h2 class="my-4 font-bold text-x hidden lg:block">Adresse</h2>
        <p class="text-gray-400 hidden lg:block">12 Rue des potiers</p>
        <p class="text-gray-400 hidden lg:block">Charlevilles-Mézières</p>
        <p class="text-gray-400 hidden lg:block">08000 France</p>
        <a href="#map" class=""><button class="py-4 px-6 xl:px-7 text-xl border-main-light border my-4 hover:bg-main-light hover:translate-x-[3px] hover:-translate-y-[3px] transition-all duration-75 hidden lg:block">Où me trouver ?</button></a>
        <h2 class="font-bold text-xl hidden lg:block">Ou contactez nous sur l'un de nos réseaux</h2>
        <div class="text-main-light text-xl gap-2 mt-4 [&_i]:rounded-full [&_i]:p-2 hidden lg:flex">
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-instagram border hover:bg-main-hover "></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook border hover:bg-main-hover "></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-twitter border hover:bg-main-hover "></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-youtube border hover:bg-main-hover "></i></a>
        </div>
    </div>

    <!-- FORMULAIRE CONTACT -->
    <form action="/portfolio/allosimplon/build/traitements/mailto.php" method="post" class="grow p-4 border-main-default border-4 lg:flex flex-col">
    <div class="space-y-6 lg:flex flex-col grow">
        <!-- TOP FORM -->
        <div class="lg:flex gap-8 space-y-6">
            <div class="flex items-center lg:text-end">
                <label class="hidden lg:block lg:pr-4 lg:w-24" for="name">Nom :</label>
                <input class="bg-transparent grow border lg:border-2 p-2  border-main-default" type="text" id="name" name="name" placeholder="Votre nom" required>
            </div>
            <div class="grow flex items-center">
                <label class="hidden lg:block lg:pr-4" for="mail">E-mail :</label>
                <input class="bg-transparent border lg:border-2 p-2 border-main-default grow" type="mail" id="mail" name="mail" placeholder="Votre e-mail" required>
            </div>
        </div>
        <!-- MID FORM -->
         <div class="flex items-center lg:text-end relative">
            <label class="hidden lg:block lg:pr-4 md:basis-20 lg:basis-24" for="objet">Objet :</label>
            <select required class="outline-none focus:outline-none focus:border-transparent bg-transparent relative border lg:border-2 p-2 grow border-main-default [&>*]:bg-main-dark cursor-pointer" name="objet" id="objet" size="1">
                <option value="Contact professionnel">Contact professionnel</option>
                <option value="Contact particulier">Contact particulier</option>
                <option value="Problème avec le site">Problème avec le site</option>
            <div class="hidden lg:block absolute right-2 text-main-light pointer-events-none"><i class="fa fa-chevron-down"></i></div></select>
        </div>
        <!-- MESSAGE -->
        <div class="flex lg:text-end grow h-full">
            <label class="hidden lg:block lg:pr-4 md:basis-20 lg:basis-24" for="message">Message :</label>
            <textarea class="bg-transparent border lg:border-2 border-main-default grow p-2" name="message" id="message"  placeholder="Votre message" required></textarea>
        </div>
    </div>
    <div>
        <!-- BOT FORM -->
        <div class="hidden lg:flex justify-end w-full self-end">
            <button type="submit" class="py-4 px-8 text-xl border-main-light border my-4 hover:bg-main-light hover:translate-x-[3px] hover:-translate-y-[3px] transition-all duration-75">Envoi du message</button>
        </div>
        <div class="lg:hidden flex justify-center w-full self-end">
            <button type="submit" class="py-4 px-8 w-full text-xl border-main-light border my-4 hover:bg-main-light hover:translate-x-[3px] hover:-translate-y-[3px] transition-all duration-75">Envoi du message</button>
        </div>
    </div>
    </form>
    <div class="block lg:hidden basis-[25%] px-2 py-2">
        <h2 class="my-4 font-bold text-xl">Adresse</h2>
        <p class="text-gray-400 ">3 Rue des potiers, Charlevilles-Mézières, 08000 France</p>
    </div>
</section>






<section id="map" class="flex justify-center mt-2 lg:mt-12 mx-4">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20617.970947342787!2d4.700518678544041!3d49.76262248071373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ea0e10c43397fb%3A0xf911f4b0899adcec!2sP%C3%B4le%20Formation%20UIMM%20Champagne-Ardenne%20-%20Charleville-M%C3%A9zi%C3%A8res!5e0!3m2!1sfr!2sfr!4v1679391863996!5m2!1sfr!2sfr" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>


<?php include('../include/general/footer.php')?>