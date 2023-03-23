<?php include('../include/nav.php')?>

<!-- SECTION CONTACT -->
<section class="flex w-2/3 lg:mx-auto border-main-default mt-24 p-4">
    <!-- INFO CONTACT -->
    <div class="basis-[25%] px-2 py-6">
        <h2 class="font-bold text-xl">Dites nous bonjour </h2>
        <p class="mt-2 text-base text-gray-400">Complétez le formulaire de contact, ou écrivez nous sur ce mail : <a href="mailto:allosimplon@contact.com" class="text-main-light">allosimplon@contact.com</a></p>
        <p class="mt-2 text-gray-400">ou contactez nous par téléphone :</p>
        <p class="text-main-light">06 38 05 89 97</p>
        <h2 class="my-4 font-bold text-xl">Adresse</h2>
        <p class="text-gray-400">12 Rue des potiers</p>
        <p class="text-gray-400">Charlevilles-Mézières</p>
        <p class="text-gray-400">08000 France</p>
        <a href="#map" class=""><button class="py-4 px-8 text-xl border-main-light border my-4 mx-auto hover:bg-main-light hover:translate-x-[3px] hover:-translate-y-[3px] transition-all duration-75">Où me trouver ?</button></a>
        <h2 class="font-bold text-xl">Ou contactez nous sur l'un de nos réseaux</h2>
        <div class="flex text-main-light text-xl gap-2 mt-4 [&_i]:rounded-full [&_i]:p-2">
            <a href="" target="_blank"><i class="fa-brands fa-instagram border hover:bg-main-hover "></i></a>
            <a href="" target="_blank"><i class="fa-brands fa-facebook border hover:bg-main-hover "></i></a>
            <a href="" target="_blank"><i class="fa-brands fa-twitter border hover:bg-main-hover "></i></a>
            <a href="" target="_blank"><i class="fa-brands fa-youtube border hover:bg-main-hover "></i></a>
        </div>
    </div>

    <!-- FORMULAIRE CONTACT -->
    <form action="" method="post" class="grow p-4 border-main-default border-4 flex flex-col">
    <div class="space-y-6 flex flex-col grow">
        <!-- TOP FORM -->
        <div class="flex gap-8">
            <div class="flex items-center text-end">
                <label class="pr-4 w-24" for="name">Nom :</label>
                <input class="bg-transparent border-2 p-2  border-main-default" type="text" id="name" name="name" placeholder="Votre nom" required>
            </div>
            <div class="grow flex items-center">
                <label class="pr-4" for="mail">E-mail :</label>
                <input class="bg-transparent border-2 p-2 border-main-default grow" type="mail" id="mail" name="mail" placeholder="Votre e-mail" required>
            </div>
        </div>
        <!-- MID FORM -->
         <div class="flex items-center text-end relative">
            <label class="pr-4 basis-24" for="objet">Objet :</label>
            <select required class="bg-transparent relative border-2 p-2 grow border-main-default [&>*]:bg-main-dark cursor-pointer" name="objet" id="objet" size="1">
                <option value="pro">Contact professionnel</option><option value="particulier">Contact particulier</option><option value="bug">Problème avec le site</option></select>
            <div class="absolute right-2 text-main-light pointer-events-none"><i class="fa fa-chevron-down"></i></div>
        </div>
        <!-- MESSAGE -->
        <div class="flex text-end grow h-full">
            <label class="pr-4 basis-24" for="message">Message :</label>
            <textarea class="bg-transparent border-2 border-main-default grow p-2" name="message" id="message"  placeholder="Votre message" required></textarea>
        </div>
    </div>
    <div>
        <!-- BOT FORM -->
        <div class="flex justify-end w-full self-end">
            <button type="submit" class="py-4 px-8 text-xl border-main-light border my-4 hover:bg-main-light hover:translate-x-[3px] hover:-translate-y-[3px] transition-all duration-75">Envoi du message</button>
        </div>
    </div>
    </form>


</section>

<section id="map" class="flex justify-center mt-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20617.970947342787!2d4.700518678544041!3d49.76262248071373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ea0e10c43397fb%3A0xf911f4b0899adcec!2sP%C3%B4le%20Formation%20UIMM%20Champagne-Ardenne%20-%20Charleville-M%C3%A9zi%C3%A8res!5e0!3m2!1sfr!2sfr!4v1679391863996!5m2!1sfr!2sfr" width="600" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>





<footer class="w-full">

<div id="footer" class="bg-main-dark h-24 mt-12 flex justify-center">
    <div class="flex justify-center items-center">
        <div class="mr-4 text-xl"> Rejoignez nous sur les réseaux !</div>
        <div class=" text-main-light">
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-instagram far"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-twitter far"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f far"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-youtube far"></i></a>
            <a href="contact.html" target="_blank"><i class="fa-solid fa-envelope far"></i></a>
        </div>
    </div>
</div>

<div class="w-full h-8 bg-main-default flex justify-evenly italic text-gray-300">
<a href="contact.html">contact</a>
<a>mentions légales</a>
<a>plus d'infos</a>

</div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>