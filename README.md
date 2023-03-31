http://nabil.serveur-mw.fr/portfolio/allosimplon/build/index.php

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
