http://nabil.serveur-mw.fr/portfolio/allosimplon

# AlloSimplon
salutation voyageurs

Pour rendre les chemins fonctionnels : 
>Mettre le dossier "allosimplon" dans un dossier "portfolio" a la racine de votre serveur

Pour l'accès à la base de données : 
>Importer allosimplon.sql dans une table "allosimplon" dans phpmyadmin (potentiellement obsolète)

Pour récupérer le css tailwind compilé :
> éxécutez cette commande dans le terminal a la racine du dossier (requiert nodejs)
> npx tailwindcss -i ./src/input.css -o ./build/css/output.css --watch

Pour un accès au crud : 
> force à vous localhost/portfolio/allosimplon/build/content/crud.php



<table class="xdebug-error xe-warning" dir="ltr" cellspacing="0" cellpadding="1" border="1">
<tbody><tr><th colspan="5" bgcolor="#f57900" align="left"><span style="background-color: #cc0000; color: #fce94f; font-size: x-large;">( ! )</span> Warning: file_get_contents(covid_2023.jsn): Failed to open stream: No such file or directory in C:\wamp64\www\covid-tracker\include\header.php on line <i>2</i></th></tr>
<tr><th colspan="5" bgcolor="#e9b96e" align="left">Call Stack</th></tr>
<tr><th bgcolor="#eeeeec" align="center">#</th><th bgcolor="#eeeeec" align="left">Time</th><th bgcolor="#eeeeec" align="left">Memory</th><th bgcolor="#eeeeec" align="left">Function</th><th bgcolor="#eeeeec" align="left">Location</th></tr>
<tr><td bgcolor="#eeeeec" align="center">1</td><td bgcolor="#eeeeec" align="center">0.0006</td><td bgcolor="#eeeeec" align="right">362008</td><td bgcolor="#eeeeec">{main}(  )</td><td title="C:\wamp64\www\covid-tracker\index.php" bgcolor="#eeeeec">...\index.php<b>:</b>0</td></tr>
<tr><td bgcolor="#eeeeec" align="center">2</td><td bgcolor="#eeeeec" align="center">0.0007</td><td bgcolor="#eeeeec" align="right">362064</td><td bgcolor="#eeeeec">dashboard(  )</td><td title="C:\wamp64\www\covid-tracker\index.php" bgcolor="#eeeeec">...\index.php<b>:</b>20</td></tr>
<tr><td bgcolor="#eeeeec" align="center">3</td><td bgcolor="#eeeeec" align="center">0.0012</td><td bgcolor="#eeeeec" align="right">362384</td><td bgcolor="#eeeeec">require( <font color="#00bb00">'C:\wamp64\www\covid-tracker\view\dashboard.php</font> )</td><td title="C:\wamp64\www\covid-tracker\controller\indexController.php" bgcolor="#eeeeec">...\indexController.php<b>:</b>5</td></tr>
<tr><td bgcolor="#eeeeec" align="center">4</td><td bgcolor="#eeeeec" align="center">0.0026</td><td bgcolor="#eeeeec" align="right">364088</td><td bgcolor="#eeeeec">include( <font color="#00bb00">'C:\wamp64\www\covid-tracker\include\header.php</font> )</td><td title="C:\wamp64\www\covid-tracker\view\dashboard.php" bgcolor="#eeeeec">...\dashboard.php<b>:</b>1</td></tr>
<tr><td bgcolor="#eeeeec" align="center">5</td><td bgcolor="#eeeeec" align="center">0.0026</td><td bgcolor="#eeeeec" align="right">364088</td><td bgcolor="#eeeeec"><a href="http://www.php.net/function.file-get-contents" target="_new">file_get_contents</a>( <span>$filename = </span><span>'covid_2023.jsn'</span> )</td><td title="C:\wamp64\www\covid-tracker\include\header.php" bgcolor="#eeeeec">...\header.php<b>:</b>2</td></tr>
</tbody></table>
