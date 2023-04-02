-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 02 avr. 2023 à 14:24
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `allosimplon`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

DROP TABLE IF EXISTS `actor`;
CREATE TABLE IF NOT EXISTS `actor` (
  `ID_actor` int NOT NULL AUTO_INCREMENT,
  `actor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actor_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_actor`),
  UNIQUE KEY `actor_name` (`actor_name`),
  KEY `actor_name_2` (`actor_name`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`ID_actor`, `actor_name`, `actor_photo`) VALUES
(1, 'Matthew McConaughey', '6421535ca5f7b.jpg'),
(2, 'Anne Hathaway', '6421536595b47.jpg'),
(3, 'Jessica Chastain', '6421536d2f929.jpg'),
(4, 'Ryan Gosling', '6421537699018.jpg'),
(5, 'Harisson Ford', '64215380af0c5.jpg'),
(6, 'Ana de Armas', '64215389c35ce.jpg'),
(7, 'Robin Wright', '6421539521897.jpg'),
(8, 'Sylvia Hoeks', '6421539f929b0.jpg'),
(10, 'Christian Bale', '64215581da4b7.jpg'),
(11, 'Heath Ledger', '6421559651a4a.jpg'),
(12, 'Michael Caine', '642155ab121c3.jpg'),
(13, 'Gary Oldman', '642155c6cfe26.jpg'),
(14, 'Aaron Eckhart', '642155d6d8907.jpg'),
(15, 'Maggie Gyllenhaal', '642155ecb430f.jpg'),
(16, 'Morgan Freeman', '6421560283b07.jpg'),
(17, 'Eric Roberts', '642156132cd8b.jpg'),
(18, 'Robert Downey Jr.', '642157d33fbb2.jpg'),
(19, 'Chris Evans', '642157f14be76.jpg'),
(20, 'Mark Ruffalo', '6421584b5c709.jpg'),
(21, 'Chris Hemsworth', '642158d29da8b.jpg'),
(22, 'Scarlett Johansson', '642158dbe4f6b.jpg'),
(26, 'azdazd', '64219a672d699.jpg'),
(27, 'Sam Worthington', '64219e3d56141.jpg'),
(28, 'Zoe Saldaña', '64219e4dda108.jpg'),
(29, 'Sigourney Weaver', '64219e5dc9c60.jpg'),
(30, 'Stephen Lang', '64219e685da48.jpg'),
(31, 'Giovanni Ribisi', '64219e7409e8d.jpg'),
(32, 'Michelle Rodriguez', '64219e88bfc00.jpg'),
(33, 'Daniel Radcliffe', '6421a0945a0fc.jpg'),
(34, 'Rupert Grint', '6421a09e695d2.jpg'),
(35, 'Emma Watson', '6421a0a75ff45.jpg'),
(36, 'Robbie Coltrane', '6421a0b5bf5ec.jpg'),
(37, 'Richard Harris', '6421a0ccb1799.jpg'),
(40, 'Kenneth Branagh', '6421a42049e2e.jpg'),
(41, 'David Thewlis', '6421a57a06935.jpg'),
(42, 'Leonardo DiCaprio', '6421a681aca26.jpg'),
(43, 'Kate Winslet', '6421a68b9ac53.jpg'),
(44, 'Brendan Gleeson', '64228c2fcb766.jpg'),
(45, 'Ralph Fiennes', '64228c3ce0a0b.jpg'),
(46, 'Will Ferrell', '64228e94b8ade.jpg'),
(47, 'Tina Fey', '64228eb573f23.jpg'),
(48, 'Jonah Hill', '64228ec0eb3c6.jpg'),
(49, 'David Cross', '64228eca539ea.jpg'),
(50, 'Brad Pitt', '64228ed43e3af.jpg'),
(51, 'Ewan McGregor', '6422904187958.jpg'),
(52, 'Natalie Portman', '6422904e90bda.jpg'),
(53, 'Hayden Christensen', '6422906019417.jpg'),
(54, 'Ian McDiarmid', '6422906a4c5c4.jpg'),
(55, 'Samuel L. Jackson', '6422907300bbb.jpg'),
(56, 'Marion Cotillard', '642291b4b4f10.jpg'),
(57, 'Ken Watanabe', '642291c390f79.jpg'),
(58, 'Tom Hardy', '642291cba4319.jpg'),
(59, 'Elliot Page', '642291d8cbbd5.png'),
(60, 'Joseph Gordon-Levitt', '642291ed9e1b8.jpg'),
(61, 'Ben Kingsley', '642292f6cf5e0.jpg'),
(62, 'Gwyneth Paltrow', '642293dd719f6.jpg'),
(63, 'Terrence Howard', '642293e6417b4.jpg'),
(64, 'Jeff Bridges', '642293f8cddda.jpg'),
(65, 'Shaun Toub', '642294028a8e8.jpg'),
(66, 'Jon Favreau', '64229429918e8.jpeg'),
(67, 'Don Cheadle', '6422965a17f04.jpg'),
(68, 'Mickey Rourke', '64229664094ab.jpg'),
(69, 'Guy Pearce', '642297231fdf7.jpg'),
(70, 'Jeremy Renner', '642298913e0de.jpg'),
(71, 'John Michael Higgins', '642299bf9969d.jpg'),
(72, 'Bradley Cooper', '642299c576868.jpg'),
(73, 'Jim Carrey', '642299cea56c9.jpg'),
(74, 'Zooey Deschanel', '642299d829abb.png'),
(75, 'Christopher Lee', '64229aef174f3.jpg'),
(76, 'Idris Elba', '64229f74136ab.jpg'),
(77, 'Sharlto Copley', '64229f836d284.jpg'),
(78, 'Tyrese Gibson', '6422a08684b5f.jpg'),
(79, 'Jordana Brewster', '6422a09180606.jpg'),
(80, 'John Cena', '6422a09cc52f0.jpg'),
(81, 'Vin Diesel', '6422a0a6aed2a.png'),
(85, 'ziadz', '6427eacf2c683.jpg'),
(86, 'zd', '6427eb037392d.jpg'),
(88, 'ziadzzzzz', '6427ebcdc2518.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `ID_comment` int NOT NULL AUTO_INCREMENT,
  `comment_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_user` int NOT NULL,
  `comment_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_film` int NOT NULL,
  `comment_pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_reports` int DEFAULT '0',
  PRIMARY KEY (`ID_comment`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`ID_comment`, `comment_message`, `ID_user`, `comment_date`, `ID_film`, `comment_pseudo`, `comment_reports`) VALUES
(1, 'Salut c&#039;est mon commentaire\r\n', 7, '2023-04-02 13:47:14', 1, '', 0),
(3, 'amdin\r\n', 7, '2023-04-02 13:56:11', 42, 'nabilnabil', 0),
(4, 'Inception c&#039;est sympa\r\n', 7, '2023-04-02 14:00:45', 49, 'nabilnabil', 1),
(5, 'en vrai ouais\r\n', 7, '2023-04-02 14:01:00', 49, 'nabilnabil', 0),
(6, 'miam commentaire', 7, '2023-04-02 14:01:49', 49, 'nabilnabil', 0),
(7, 'cool avatar!\r\n', 7, '2023-04-02 14:23:02', 42, 'nabilnabil', 0);

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `ID_film` int NOT NULL AUTO_INCREMENT,
  `film_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `film_date` int NOT NULL,
  `film_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `film_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `film_grade` decimal(3,1) NOT NULL,
  `film_description` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `film_time` int NOT NULL,
  `film_background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int NOT NULL,
  `admin_pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int DEFAULT '0',
  PRIMARY KEY (`ID_film`),
  UNIQUE KEY `film_name_2` (`film_name`),
  UNIQUE KEY `film_name_3` (`film_name`),
  UNIQUE KEY `film_name_4` (`film_name`),
  KEY `film_name` (`film_name`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`ID_film`, `film_name`, `film_date`, `film_photo`, `film_video`, `film_grade`, `film_description`, `film_time`, `film_background`, `admin_id`, `admin_pseudo`, `likes`) VALUES
(1, 'Blade runner', 2017, '642151d0ac6c2.jpg', 'https://www.youtube.com/embed/FfRPKYwsFNg', '8.1', 'L&#039;action du film se situe à Los Angeles en 2019 et met en scène Rick Deckard (interprété par Harrison Ford), un ancien policier qui reprend du service pour traquer un groupe de réplicants, des androïdes créés à l&#039;image de l&#039;Homme, menés par l&#039;énigmatique Roy Batty (interprété par Rutger Hauer).', 163, '642151d0ad388.jpg', 0, '', 2),
(2, 'Interstellar', 2014, '642166c90aaee.jpg', 'https://www.youtube.com/embed/VaOijhK3CRU', '8.6', 'Dans un proche futur, la Terre est devenue hostile pour l&#039;homme. Les tempêtes de sable sont fréquentes et il n&#039;y a plus que le maïs qui peut être cultivé, en raison d&#039;un sol trop aride. Cooper est un pilote, recyclé en agriculteur, qui vit avec son fils et sa fille dans la ferme familiale. Lorsqu&#039;une force qu&#039;il ne peut expliquer lui indique les coordonnées d&#039;une division secrète de la NASA, il est alors embarqué dans une expédition pour sauver l&#039;humanité.', 169, '642151dcebc26.jpg', 0, '', 3),
(39, 'The Dark Knight', 2008, '64215744b7d9e.jpg', 'https://www.youtube.com/embed/EXeTwQWrcwY', '9.0', 'Batman est plus que jamais déterminé à éradiquer le crime organisé qui sème la terreur en ville. Epaulé par le lieutenant Jim Gordon et par le procureur de Gotham City, Harvey Dent, Batman voit son champ d&#039;action s&#039;élargir. La collaboration des trois hommes s&#039;avère très efficace et ne tarde pas à porter ses fruits jusqu&#039;à ce qu&#039;un criminel redoutable vienne plonger la ville de Gotham City dans le chaos.', 152, '64215744b7fed.jpg', 0, '', 3),
(40, 'Avengers: Endgame', 2019, '64215a62c8bb8.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c', '8.4', 'Le Titan Thanos, ayant réussi à s&#039;approprier les six Pierres d&#039;Infinité et à les réunir sur le Gantelet doré, a pu réaliser son objectif de pulvériser la moitié de la population de l&#039;Univers. Cinq ans plus tard, Scott Lang, alias Ant-Man, parvient à s&#039;échapper de la dimension subatomique où il était coincé. Il propose aux Avengers une solution pour faire revenir à la vie tous les êtres disparus, dont leurs alliés et coéquipiers : récupérer les Pierres d&#039;Infinité dans le passé.', 181, '6421926e8a7c8.jpg', 0, '', 1),
(41, 'Titanic', 1997, '64215ce7a9f98.jpg', 'https://www.youtube.com/embed/cIJ8ma0kKtY', '7.9', 'En 1997, l&#039;épave du Titanic est l&#039;objet d&#039;une exploration fiévreuse, menée par des chercheurs de trésor en quête d&#039;un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l&#039;une des rescapées du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912. Fiancée à un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.', 195, '64215ce7aa53e.jpg', 0, '', 1),
(42, 'Avatar', 2009, '64219f6300cae.jpg', 'https://www.youtube.com/embed/5PSNL1qE6VY', '7.9', 'Sur le monde extraterrestre luxuriant de Pandora vivent les Na&#039;vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d&#039;une femme Na&#039;vi. Alors qu&#039;un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.', 162, '64219f630106d.jpg', 0, '', 1),
(43, 'Harry Potter à l&#039;école des sorcieres', 2001, '6421a3051cfb8.jpg', 'https://www.youtube.com/embed/P1BGgqhVGAI', '7.0', 'Harry Potter, un jeune orphelin, est élevé par son oncle et sa tante qui le détestent. Alors qu&#039;il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture. Le jour de son onzième anniversaire, Harry reçoit la visite inattendue d&#039;un homme gigantesque se nommant Rubeus Hagrid, et celui-ci lui révèle qu&#039;il est en fait le fils de deux puissants magiciens et qu&#039;il possède lui aussi d&#039;extraordinaires pouvoirs', 152, '6421a3051d3c4.jpg', 0, '', 2),
(44, 'Harry Potter et la Chambre des Secrets', 2002, '6421a5290671b.jpg', 'https://www.youtube.com/embed/Z3T8PuWuoL0', '7.4', 'Alors que l&#039;oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d&#039;importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition. Il lui annonce que de terribles dangers menacent l&#039;école de Poudlard et qu&#039;il ne doit pas y retourner en septembre. Harry refuse de le croire. Mais sitôt la rentrée des classes effectuée, ce dernier entend une voix malveillante.', 161, '6421a52906ae6.jpg', 0, '', 2),
(45, 'Harry Potter et le Prisonnier d&#039;Azkaban', 2004, '64228bbac0bfa.jpg', 'https://www.youtube.com/embed/CLncEeVf4ks', '7.9', 'Sirius Black, un dangereux sorcier criminel, s&#039;échappe de la sombre prison d&#039;Azkaban avec un seul et unique but : se venger d&#039;Harry Potter, entré avec ses amis Ron et Hermione en troisième année à l&#039;école de sorcellerie de Poudlard, où ils auront aussi à faire avec les terrifiants Détraqueurs.', 142, '64228bbac0ef0.jpg', 0, '', 1),
(46, 'Harry Potter et la Coupe de feu', 2005, '64228d83b593e.jpg', 'https://www.youtube.com/embed/XO9rqIgzDL0', '7.7', 'La quatrième année à l&#039;école de Poudlard est marquée par le Tournoi des trois sorciers. Les participants sont choisis par la fameuse coupe de feu, qui est à l&#039;origine d&#039;un scandale. Elle sélectionne Harry Potter tandis qu&#039;il n&#039;a pas l&#039;âge légal requis. Après avoir surmonté une série d&#039;épreuves physiques de plus en plus difficiles, il est enfin confronté à Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom.', 157, '64228d83b5c33.jpg', 0, '', 1),
(47, 'Megamind', 2010, '64228f99bb7aa.jpg', 'https://www.youtube.com/embed/ead9HCX9fe4', '10.0', 'Megamind est le plus grand adversaire de Metroman, le superhéros chargé de protéger les citoyens de Metro City. Megamind réussit un jour, à sa plus grande surprise, à tuer Metroman. Après avoir terrorisé la ville entière, il réalise bien vite qu&#039;un méchant sans héros pour le combattre, c&#039;est risible et inutile. Il décide donc d&#039;insuffler les dons de Metroman à un jeune garçon ordinaire afin qu&#039;il devienne le nouveau défenseur de Metro City.', 96, '64228f99bbbd3.jpg', 0, '', 2),
(48, 'Star Wars: Episode III - La revanche des Sith', 2005, '64229181e5789.jpg', 'https://www.youtube.com/embed/t1qtvKYwTV0', '7.6', 'La Guerre des Clones fait rage. Une franche hostilité oppose désormais le Chancelier Palpatine au Conseil Jedi. Anakin Skywalker, jeune Chevalier Jedi pris entre deux feux, hésite sur la conduite à tenir. Séduit par la promesse d&#039;un pouvoir sans précédent, tenté par le côté obscur de la Force, il prête allégeance au maléfique Darth Sidious et devient Dark Vador.Les Seigneurs Sith s&#039;unissent alors pour préparer leur revanche, qui commence par l&#039;extermination des Jedi.', 140, '64229181e5e5f.jpg', 0, '', 1),
(49, 'Inception', 2010, '6422929e43c79.jpg', 'https://www.youtube.com/embed/CPTIgILtna8', '8.6', 'Dom Cobb est un voleur expérimenté dans l&#039;art périlleux de `l&#039;extraction&#039; : sa spécialité consiste à s&#039;approprier les secrets les plus précieux d&#039;un individu, enfouis au plus profond de son subconscient, pendant qu&#039;il rêve et que son esprit est particulièrement vulnérable. Très recherché pour ses talents dans l&#039;univers trouble de l&#039;espionnage industriel, Cobb est aussi devenu un fugitif traqué dans le monde entier. Cependant, une ultime mission pourrait lui permettre de retrouver sa vie d&#039;avant.', 148, '6422929e44200.jpg', 0, '', 1),
(50, 'Shutter Island', 2010, '64229382c3cbf.jpg', 'https://www.youtube.com/embed/v8yrZSkKxTA', '8.2', 'En 1954, une meurtrière, extrêmement dangereuse, placée en centre de détention psychiatrique disparaît sur l&#039;île de Shutter Island. Deux officiers du corps fédéral des marshals, Teddy Daniels et Chuck Aule, sont envoyés sur place pour enquêter. Très vite, Teddy Daniels comprend que le personnel de l&#039;établissement cache quelque chose. Seul indice dont il dispose : un bout de papier sur lequel est griffonnée une suite de chiffres entrecoupée de lettres.', 130, '64229382c414d.jpg', 0, '', 0),
(51, 'Iron Man', 2008, '642295ada3029.jpg', 'https://www.youtube.com/embed/8ugaeA-nMTc', '7.9', 'Alors qu&#039;il fait l&#039;essai d&#039;une arme de son invention en Afghanistan, le milliardaire Tony Stark est capturé par des insurgés qui le forcent à travailler pour eux. Mais à leur insu, le scientifique crée pour lui-même une armure superpuissante au moyen de laquelle il s&#039;évade et rentre aux États-Unis. Transformé par son aventure, il décide de mettre son génie et sa fortune au service du Bien.', 126, '642295ada32e7.jpg', 0, '', 1),
(53, 'Iron Man 2', 2010, '642296e41cd82.jpg', 'https://www.youtube.com/embed/BoohRoVA9WQ', '6.9', 'Le monde sait désormais que l&#039;inventeur milliardaire Tony Stark et le super-héros Iron Man ne font qu&#039;un. Cependant, malgré les pressions, Tony n&#039;est pas disposé à divulguer les secrets de son armure, redoutant que l&#039;information atterrisse dans de mauvaises mains. Avec Pepper Potts et James Rhodey Rhodes à ses côtés, Tony va forger de nouvelles alliances et affronter de nouvelles forces toutes-puissantes.', 124, '642296e41d205.jpg', 0, '', 2),
(54, 'Iron Man 3', 2013, '642297ad303e0.jpg', 'https://www.youtube.com/embed/Ke1Y3P9D0Bc', '7.1', 'Tony Stark, alias Iron Man, mène une vie confortable aux côtés de sa compagne, Pepper. Cependant, il se retrouve confronté à Mandarin, chef d&#039;une organisation terroriste, qui détruit sa maison et tout son univers. Tony Stark part alors à la recherche de Pepper, disparue, et cherche à se venger. Démuni, il ne peut compter que sur son ingéniosité, ses multiples inventions et son instinct de survie pour protéger ses proches.', 130, '642297ad30879.jpg', 0, '', 0),
(55, 'Avengers', 2012, '64229876d2cf2.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c', '8.0', 'Quand un ennemi inattendu fait surface pour menacer la sécurité et l&#039;équilibre mondial, Nick Fury, directeur de l&#039;agence internationale pour le maintien de la paix, connue sous le nom du S.H.I.E.L.D., doit former une équipe pour éviter une catastrophe mondiale imminente. Un effort de recrutement à l&#039;échelle mondiale est mis en place, pour finalement réunir l&#039;équipe de super héros de rêve, dont Iron Man, l&#039;incroyable Hulk, Thor, Captain America, Hawkeye et Black Widow.', 143, '64229876d30e8.jpeg', 0, '', 0),
(56, 'Avengers: L&#039;ère d&#039;ultron', 2015, '642298fca7081.jpg', 'https://www.youtube.com/embed/tmeOjFno6Do', '7.3', 'Alors qu&#039;il tente de récupérer le sceptre de Loki avec l&#039;aide de ses camarades Avengers, Tony Stark découvre que Strucker avait mis au point une intelligence artificielle révolutionnaire, plus puissante encore que Jarvis. Strucker, mis hors d&#039;état de nuire, et le sceptre récupéré, Stark conçoit bientôt un projet insensé : relancer son programme de maintien de la paix, jusque-là en sommeil, grâce à cette conscience robotisée ultra-puissante.', 141, '642298fca7308.jpg', 0, '', 1),
(57, 'Yes Man', 2008, '64229a38b1b1a.jpg', 'https://www.youtube.com/embed/dDh1l3qVNoY', '6.8', 'Après avoir assisté à un séminaire d&#039;auto-assistance, un homme négatif apporte un changement étonnant dans sa vie en disant oui à tout.', 104, '64229a38b2181.jpg', 0, '', 1),
(58, 'Star Wars, épisode II : L&#039;Attaque des clones', 2002, '64229bb342f8d.jpg', 'https://www.youtube.com/embed/arGWLDOeoOw', '6.6', 'Depuis le blocus de la planète Naboo, la République, gouvernée par le Chancelier Palpatine, connaît une crise. Un groupe de dissidents, mené par le sombre Jedi comte Dooku, manifeste son mécontentement. Le Sénat et la population intergalactique se montrent pour leur part inquiets. Certains sénateurs demandent à ce que la République soit dotée d&#039;une armée pour empêcher que la situation ne se détériore. Padmé Amidala, devenue sénatrice, est menacée par les séparatistes et échappe à un attentat.', 142, '64229bb3433d4.jpg', 0, '', 1),
(59, 'Avengers: Infinity War', 2018, '64229c4730e33.jpg', 'https://www.youtube.com/embed/6ZfuNTqbHE8', '8.4', 'Alors que les Avengers et leurs alliés ont continué de protéger le monde face à des menaces bien trop grandes pour être combattues par un héros seul, un nouveau danger est venu de l&#039;espace : Thanos. Despote craint dans tout l&#039;univers, Thanos a pour objectif de recueillir les six Pierres d&#039;Infinité, des artefacts parmi les plus puissants de l&#039;univers, et de les utiliser afin d&#039;imposer sa volonté sur toute la réalité. Tous les combats que les Avengers ont menés culminent dans cette bataille.', 149, '64229c473135a.jpg', 0, '', 2),
(60, 'Avatar: La Voie de l&#039;eau', 2022, '64229ef91aed1.jpg', 'https://www.youtube.com/embed/d9MyW72ELq0', '7.8', 'Jake Sully et Ney&#039;tiri ont formé une famille et font tout pour rester aussi soudés que possible. Ils sont cependant contraints de quitter leur foyer et d&#039;explorer les différentes régions encore mystérieuses de Pandora. Lorsqu&#039;une ancienne menace refait surface, Jake va devoir mener une guerre difficile contre les humains.', 192, '64229ef91b3f5.jpg', 0, '', 1),
(61, 'Beast', 2022, '6422a05c44e64.jpg', 'https://www.youtube.com/embed/oQMc7Sq36mI', '5.6', 'Le docteur Nate Samuels voyage avec ses deux filles adolescentes en Afrique du Sud. C&#039;est dans ce pays qu&#039;il avait autrefois rencontré sa femme, décédée il y a peu de temps. Nate, Meredith et Norah se rendent dans une réserve naturelle gérée par Martin Battles. La famille Samuels va alors être la cible d&#039;un lion. Cet animal, attaqué par des braconniers, qui a vu toute sa troupe tuée par ces derniers considère alors tous les humains comme une menace. Il va prendre en chasse Nate et les siens. ', 93, '6422a05c4528a.jpg', 0, '', 0),
(62, 'Fast and Furious ', 2021, '6422a69004959.jpg', 'https://www.youtube.com/embed/hCPXYelJteM', '5.2', 'Dom Toretto mène une vie tranquille avec Letty et son fils, mais ils savent que le danger est toujours présent. Son équipe et lui tentent de mettre fin à un complot mondial ourdi par l&#039;assassin le plus doué et le pilote le plus performant qu&#039;ils aient jamais rencontré: le frère délaissé de Dom.', 143, '6422a15bebee9.jpg', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `film_actor`
--

DROP TABLE IF EXISTS `film_actor`;
CREATE TABLE IF NOT EXISTS `film_actor` (
  `ID_film` int NOT NULL,
  `ID_actor` int NOT NULL,
  PRIMARY KEY (`ID_film`,`ID_actor`),
  KEY `film_actor_actor0_FK` (`ID_actor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film_actor`
--

INSERT INTO `film_actor` (`ID_film`, `ID_actor`) VALUES
(2, 1),
(2, 2),
(2, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(39, 10),
(39, 11),
(39, 12),
(39, 13),
(45, 13),
(39, 14),
(39, 15),
(39, 16),
(39, 17),
(40, 18),
(51, 18),
(53, 18),
(54, 18),
(55, 18),
(56, 18),
(59, 18),
(40, 19),
(55, 19),
(56, 19),
(59, 19),
(40, 20),
(50, 20),
(55, 20),
(56, 20),
(59, 20),
(40, 21),
(55, 21),
(56, 21),
(59, 21),
(40, 22),
(55, 22),
(56, 22),
(59, 22),
(42, 27),
(60, 27),
(42, 28),
(60, 28),
(42, 29),
(60, 29),
(42, 30),
(60, 30),
(42, 31),
(42, 32),
(62, 32),
(43, 33),
(44, 33),
(45, 33),
(46, 33),
(43, 34),
(44, 34),
(45, 34),
(46, 34),
(43, 35),
(44, 35),
(45, 35),
(46, 35),
(43, 36),
(43, 37),
(44, 37),
(44, 40),
(45, 41),
(41, 42),
(49, 42),
(50, 42),
(41, 43),
(60, 43),
(46, 44),
(46, 45),
(47, 46),
(47, 47),
(47, 48),
(47, 49),
(47, 50),
(48, 51),
(58, 51),
(48, 52),
(58, 52),
(48, 53),
(58, 53),
(48, 54),
(48, 55),
(53, 55),
(58, 55),
(49, 56),
(49, 57),
(49, 58),
(49, 59),
(49, 60),
(50, 61),
(54, 61),
(51, 62),
(53, 62),
(54, 62),
(51, 63),
(51, 64),
(51, 65),
(53, 67),
(54, 67),
(53, 68),
(54, 69),
(56, 70),
(57, 71),
(57, 72),
(57, 73),
(57, 74),
(58, 75),
(61, 76),
(61, 77),
(62, 78),
(62, 79),
(62, 80),
(62, 81);

-- --------------------------------------------------------

--
-- Structure de la table `film_genre`
--

DROP TABLE IF EXISTS `film_genre`;
CREATE TABLE IF NOT EXISTS `film_genre` (
  `ID_genre` int NOT NULL,
  `ID_film` int NOT NULL,
  PRIMARY KEY (`ID_genre`,`ID_film`),
  KEY `film_genre_film0_FK` (`ID_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film_genre`
--

INSERT INTO `film_genre` (`ID_genre`, `ID_film`) VALUES
(1, 1),
(1, 2),
(7, 2),
(5, 39),
(5, 40),
(7, 41),
(8, 41),
(1, 42),
(9, 42),
(9, 43),
(9, 44),
(9, 45),
(9, 46),
(10, 47),
(11, 47),
(1, 48),
(1, 49),
(12, 49),
(12, 50),
(13, 50),
(5, 51),
(5, 53),
(4, 54),
(5, 54),
(4, 55),
(5, 55),
(4, 56),
(5, 56),
(1, 57),
(11, 57),
(1, 58),
(4, 59),
(5, 59),
(7, 59),
(1, 60),
(12, 61),
(4, 62);

-- --------------------------------------------------------

--
-- Structure de la table `film_realisator`
--

DROP TABLE IF EXISTS `film_realisator`;
CREATE TABLE IF NOT EXISTS `film_realisator` (
  `ID_film` int NOT NULL,
  `ID_realisator` int NOT NULL,
  PRIMARY KEY (`ID_film`,`ID_realisator`),
  KEY `film_realisator_realisator0_FK` (`ID_realisator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film_realisator`
--

INSERT INTO `film_realisator` (`ID_film`, `ID_realisator`) VALUES
(2, 1),
(39, 1),
(49, 1),
(1, 2),
(62, 4),
(40, 6),
(59, 6),
(41, 7),
(42, 7),
(60, 7),
(43, 9),
(44, 9),
(45, 10),
(46, 11),
(47, 12),
(54, 12),
(48, 14),
(58, 14),
(50, 15),
(51, 16),
(53, 16),
(55, 18),
(56, 18),
(57, 19),
(61, 20);

-- --------------------------------------------------------

--
-- Structure de la table `film_scenarist`
--

DROP TABLE IF EXISTS `film_scenarist`;
CREATE TABLE IF NOT EXISTS `film_scenarist` (
  `ID_film` int NOT NULL,
  `ID_scenarist` int NOT NULL,
  PRIMARY KEY (`ID_film`,`ID_scenarist`),
  KEY `film_scenarist_scenarist0_FK` (`ID_scenarist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `film_scenarist`
--

INSERT INTO `film_scenarist` (`ID_film`, `ID_scenarist`) VALUES
(2, 1),
(39, 1),
(1, 2),
(1, 3),
(39, 5),
(49, 5),
(40, 6),
(59, 6),
(40, 7),
(59, 7),
(41, 8),
(42, 8),
(60, 8),
(43, 9),
(44, 9),
(45, 9),
(46, 9),
(47, 10),
(48, 11),
(58, 11),
(50, 12),
(51, 13),
(51, 14),
(51, 15),
(53, 16),
(54, 17),
(55, 18),
(56, 18),
(57, 19),
(57, 20),
(60, 21),
(61, 23),
(62, 24);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `ID_genre` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_genre`),
  UNIQUE KEY `genre_name` (`genre_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID_genre`, `genre_name`) VALUES
(4, 'Action'),
(10, 'Animation'),
(14, 'Aventure'),
(11, 'Comédie'),
(17, 'Crime'),
(15, 'Documentaire'),
(7, 'Drame'),
(9, 'Fantastique'),
(16, 'Médiéval'),
(18, 'Opéra'),
(13, 'Psychologique'),
(8, 'Romance'),
(1, 'Science-fiction'),
(5, 'Super-Héros'),
(12, 'Thriller'),
(19, 'Western');

-- --------------------------------------------------------

--
-- Structure de la table `realisator`
--

DROP TABLE IF EXISTS `realisator`;
CREATE TABLE IF NOT EXISTS `realisator` (
  `ID_realisator` int NOT NULL AUTO_INCREMENT,
  `realisator_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realisator_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_realisator`),
  UNIQUE KEY `realisator_name` (`realisator_name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `realisator`
--

INSERT INTO `realisator` (`ID_realisator`, `realisator_name`, `realisator_photo`) VALUES
(1, 'Christopher Nolan', '642153ac50a58.jpg'),
(2, 'Denis Villeneuve', '642153b5279fe.jpg'),
(4, 'Zoro', '64215432c2840.jpg'),
(6, 'Anthony Russo et Joe Russo', '6421590ecbf0d.jpg'),
(7, 'James Cameron', '64215c26d3867.jpg'),
(9, 'Chris Columbus', '6421a0e660f1e.jpg'),
(10, 'Alfonso Cuarón', '64228bc993c75.jpg'),
(11, 'Mike Newell', '64228c1ec9b7a.jpg'),
(12, 'Tom McGrath', '64228e30811c4.jpg'),
(13, 'Brent Simons', '64228e4913539.jpg'),
(14, 'George Lucas', '6422902433549.jpg'),
(15, 'Martin Scorsese', '642292c64c04a.jpg'),
(16, 'Jon Favreau', '642294303d496.jpeg'),
(17, 'Matt Holloway', '6422945d9dce5.jpg'),
(18, 'Joss Whedon', '642298116776f.jpg'),
(19, 'Peyton Reed', '6422998196e1a.jpg'),
(20, 'Baltasar Kormákur', '64229fccc88a2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_role` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_role`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`ID_role`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `scenarist`
--

DROP TABLE IF EXISTS `scenarist`;
CREATE TABLE IF NOT EXISTS `scenarist` (
  `ID_scenarist` int NOT NULL AUTO_INCREMENT,
  `scenarist_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scenarist_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_scenarist`),
  UNIQUE KEY `scenarist_name` (`scenarist_name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `scenarist`
--

INSERT INTO `scenarist` (`ID_scenarist`, `scenarist_name`, `scenarist_photo`) VALUES
(1, 'Jonathan Nolan', '6421545f90c4c.jpg'),
(2, 'Hampton Fancher', '6421546999bbd.jpg'),
(3, 'Ridley Scott', '6421547288d57.jpg'),
(5, 'Christopher Nolan', '64215512e61ec.jpg'),
(6, 'Christopher Markus', '64215948e5779.jpg'),
(7, 'Stephen McFeely', '6421595c27961.jpg'),
(8, 'James Cameron', '64215c310a5b4.jpg'),
(9, 'Steve Kloves', '6421a0fdeb318.jpg'),
(10, 'Brent Simons', '64228fafd2b24.jpg'),
(11, 'George Lucas', '6422902aafa24.jpg'),
(12, 'Laeta Kalogridis', '642292e123a4c.jpg'),
(13, 'Matt Holloway', '642294784b46c.jpg'),
(14, 'Art Marcum', '6422948db32e1.jpg'),
(15, 'Ramin Djawadi', '642294aae864d.jpg'),
(16, 'Justin Theroux', '64229642d80f5.jpg'),
(17, 'Drew Pearce', '64229712b0aa3.jpg'),
(18, 'Joss Whedon', '6422990d79258.jpg'),
(19, 'Nicholas Stoller', '6422999bc0cc1.jpg'),
(20, 'Jarrad Paul', '642299ae15f08.jpg'),
(21, 'Josh Friedman', '64229e5e48036.jpg'),
(22, 'Baltasar Kormákur', '64229f95c9830.jpg'),
(23, 'Ryan Engle', '64229fc094b88.jpg'),
(24, 'Daniel Casey', '6422a0d7c2d64.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` int NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_role` int NOT NULL,
  PRIMARY KEY (`ID_user`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_role_FK` (`ID_role`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `user_pseudo`, `user_email`, `user_password`, `ID_role`) VALUES
(7, 'admin', 'admin@admin.admin', '$2y$10$QPODPiXHEDI0RNq6UEDjqOgZ2xMwVVZis0K0luXrF4oRNG4zR2Pdy', 1),
(9, 'test', 'test@test.test', '$2y$10$shqhZSHjV0qzi5yL0/Yk2uFSK.a/Lvm/KDf3uPeaTAcLpKfKlv8Aa', 2),
(10, 'Nabil', 'nabil@nabil.nabil', '$2y$10$H3.GZRp8SqL2c59v2IIbu.7V0aDlGP0my3yTMq40b8ff78sNwck2K', 1),
(14, 'Zoro', 'zoro@zoro.zoro', '$2y$10$OXRFCqvqtWDTUOaQ4HB3BeVzVd3GorqL82dLaxYeNrGXlNpglYO/O', 2),
(15, 'ayoub', 'ayoub@ayoub.ayoub', '$2y$10$kdy46I9gIgkYA9/tnGIKXenp8Csdo2jlfktyWxZlxejHxR0D.dcJy', 2),
(16, 'shaula', 'shaula@shaula.shaula', '$2y$10$R5KzV9XQ8fvjTaHjlbxQAeo.c589i.EzBpJ8133WD8W1f/vlnSp7W', 2),
(17, 'nabil@nabil.com', 'nabil@nabil.com', '$2y$10$cozQWFEnPMNv1s0DYjAaWuxAzaLOPU/XalEtbzLBvqOQ9ao9KVJnm', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_fav`
--

DROP TABLE IF EXISTS `user_fav`;
CREATE TABLE IF NOT EXISTS `user_fav` (
  `ID_user` int NOT NULL,
  `ID_film` int NOT NULL,
  PRIMARY KEY (`ID_user`,`ID_film`),
  KEY `user_fav_film0_FK` (`ID_film`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_fav`
--

INSERT INTO `user_fav` (`ID_user`, `ID_film`) VALUES
(7, 1),
(9, 1),
(7, 2),
(9, 2),
(10, 2),
(7, 39),
(9, 39),
(14, 39),
(14, 40),
(14, 41),
(9, 42),
(7, 43),
(10, 43),
(7, 44),
(10, 44),
(10, 45),
(10, 46),
(7, 47),
(14, 47),
(14, 48),
(10, 51),
(10, 53),
(14, 53),
(9, 56),
(7, 57),
(7, 58),
(7, 59),
(14, 59),
(7, 60);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `film_actor`
--
ALTER TABLE `film_actor`
  ADD CONSTRAINT `film_actor_actor0_FK` FOREIGN KEY (`ID_actor`) REFERENCES `actor` (`ID_actor`),
  ADD CONSTRAINT `film_actor_film_FK` FOREIGN KEY (`ID_film`) REFERENCES `film` (`ID_film`);

--
-- Contraintes pour la table `film_genre`
--
ALTER TABLE `film_genre`
  ADD CONSTRAINT `film_genre_film0_FK` FOREIGN KEY (`ID_film`) REFERENCES `film` (`ID_film`),
  ADD CONSTRAINT `film_genre_genre_FK` FOREIGN KEY (`ID_genre`) REFERENCES `genre` (`ID_genre`);

--
-- Contraintes pour la table `film_realisator`
--
ALTER TABLE `film_realisator`
  ADD CONSTRAINT `film_realisator_film_FK` FOREIGN KEY (`ID_film`) REFERENCES `film` (`ID_film`),
  ADD CONSTRAINT `film_realisator_realisator0_FK` FOREIGN KEY (`ID_realisator`) REFERENCES `realisator` (`ID_realisator`);

--
-- Contraintes pour la table `film_scenarist`
--
ALTER TABLE `film_scenarist`
  ADD CONSTRAINT `film_scenarist_film_FK` FOREIGN KEY (`ID_film`) REFERENCES `film` (`ID_film`),
  ADD CONSTRAINT `film_scenarist_scenarist0_FK` FOREIGN KEY (`ID_scenarist`) REFERENCES `scenarist` (`ID_scenarist`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_FK` FOREIGN KEY (`ID_role`) REFERENCES `role` (`ID_role`);

--
-- Contraintes pour la table `user_fav`
--
ALTER TABLE `user_fav`
  ADD CONSTRAINT `user_fav_film0_FK` FOREIGN KEY (`ID_film`) REFERENCES `film` (`ID_film`),
  ADD CONSTRAINT `user_fav_user_FK` FOREIGN KEY (`ID_user`) REFERENCES `user` (`ID_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
