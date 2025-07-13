<!-- FOOTER -->

<footer class="w-full mt-auto">

<div id="footer" class="bg-main-dark h-24 mt-12 flex justify-center">
    <div class="sm:flex justify-center items-center">
        <div class="mr-4 text-base md:text-xl text-center"> Rejoignez nous sur les réseaux !</div>
        <div class=" text-main-light mt-2">
            <a href="https://instagram.com" target="_blank"><i class="fa-brands fa-instagram fari"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fa-brands fa-twitter fari"></i></a>
            <a href="https://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f fari"></i></a>
            <a href="https://youtube.com" target="_blank"><i class="fa-brands fa-youtube fari"></i></a>
            <a href="/content/contact.php" target="_blank"><i class="fa-solid fa-envelope fari"></i></a>
        </div>
    </div>
</div>

<div class="w-full h-8 bg-main-default flex justify-evenly italic pt-2 text-gray-300    ">
<a href="/content/contact.php">contact</a>
<a>mentions légales</a>
<a>plus d'infos</a>

</div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script>
/* SCRIPT REVEAL ELEMENTS */
function reveal() {
  var reveals = document.querySelectorAll(".reveal") /* Prends tous les éléments class=reveal */


for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight; /*Donne la taille du VH comme taille de fenetre*/
    var elementTop = reveals[i].getBoundingClientRect().top; /* Distance du reveal à partir du haut du VH */
    var elementVisible = 90; /*Hauteur à laquelle l'élément est révélé */
  /*Si la distance de l'élément par rapport au haut de l'écran est  */
    if (elementTop < windowHeight - elementVisible) {
    reveals[i].classList.add("active");
    } else {
    reveals[i].classList.remove("active");
    }
}
}
// Actovateurs du script reveal

// window.addEventListener("scroll", reveal);
onscroll = (reveal)/*version abrégée*/
// window.addEventListener("load", reveal);
onload = (reveal) /*version abrégée*/

onclick(cardmode) = (reveal)


</script>
</body>
</html>
