-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 27 mars 2023 à 17:22
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
  `actor_name` varchar(255) NOT NULL,
  `actor_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_actor`),
  UNIQUE KEY `actor_name` (`actor_name`),
  KEY `actor_name_2` (`actor_name`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(43, 'Kate Winslet', '6421a68b9ac53.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `ID_film` int NOT NULL AUTO_INCREMENT,
  `film_name` varchar(255) NOT NULL,
  `film_date` int NOT NULL,
  `film_photo` varchar(255) NOT NULL,
  `film_video` varchar(255) NOT NULL,
  `film_grade` int NOT NULL,
  `film_description` varchar(999) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `film_time` int NOT NULL,
  `film_background` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_film`),
  UNIQUE KEY `film_name_2` (`film_name`),
  UNIQUE KEY `film_name_3` (`film_name`),
  UNIQUE KEY `film_name_4` (`film_name`),
  KEY `film_name` (`film_name`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`ID_film`, `film_name`, `film_date`, `film_photo`, `film_video`, `film_grade`, `film_description`, `film_time`, `film_background`) VALUES
(1, 'Blade runner', 2017, '642151d0ac6c2.jpg', 'https://www.youtube.com/embed/FfRPKYwsFNg', 8, 'L&#039;action du film se situe à Los Angeles en 2019 et met en scène Rick Deckard (interprété par Harrison Ford), un ancien policier qui reprend du service pour traquer un groupe de réplicants, des androïdes créés à l&#039;image de l&#039;Homme, menés par l&#039;énigmatique Roy Batty (interprété par Rutger Hauer).', 163, '642151d0ad388.jpg'),
(2, 'Interstellar', 2014, '642166c90aaee.jpg', 'https://www.youtube.com/embed/VaOijhK3CRU', 10, 'Dans un proche futur, la Terre est devenue hostile pour l&#039;homme. Les tempêtes de sable sont fréquentes et il n&#039;y a plus que le maïs qui peut être cultivé, en raison d&#039;un sol trop aride. Cooper est un pilote, recyclé en agriculteur, qui vit avec son fils et sa fille dans la ferme familiale. Lorsqu&#039;une force qu&#039;il ne peut expliquer lui indique les coordonnées d&#039;une division secrète de la NASA, il est alors embarqué dans une expédition pour sauver l&#039;humanité.', 169, '642151dcebc26.jpg'),
(39, 'The Dark Knight', 2008, '64215744b7d9e.jpg', 'https://www.youtube.com/embed/EXeTwQWrcwY', 9, 'Batman est plus que jamais déterminé à éradiquer le crime organisé qui sème la terreur en ville. Epaulé par le lieutenant Jim Gordon et par le procureur de Gotham City, Harvey Dent, Batman voit son champ d&#039;action s&#039;élargir. La collaboration des trois hommes s&#039;avère très efficace et ne tarde pas à porter ses fruits jusqu&#039;à ce qu&#039;un criminel redoutable vienne plonger la ville de Gotham City dans le chaos.', 152, '64215744b7fed.jpg'),
(40, 'Avengers: Endgame', 2019, '64215a62c8bb8.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c', 8, 'Le Titan Thanos, ayant réussi à s&#039;approprier les six Pierres d&#039;Infinité et à les réunir sur le Gantelet doré, a pu réaliser son objectif de pulvériser la moitié de la population de l&#039;Univers. Cinq ans plus tard, Scott Lang, alias Ant-Man, parvient à s&#039;échapper de la dimension subatomique où il était coincé. Il propose aux Avengers une solution pour faire revenir à la vie tous les êtres disparus, dont leurs alliés et coéquipiers : récupérer les Pierres d&#039;Infinité dans le passé.', 181, '6421926e8a7c8.jpg'),
(41, 'Titanic', 1997, '64215ce7a9f98.jpg', 'https://www.youtube.com/embed/cIJ8ma0kKtY', 8, 'En 1997, l&#039;épave du Titanic est l&#039;objet d&#039;une exploration fiévreuse, menée par des chercheurs de trésor en quête d&#039;un diamant bleu qui se trouvait à bord. Frappée par un reportage télévisé, l&#039;une des rescapées du naufrage, âgée de 102 ans, Rose DeWitt, se rend sur place et évoque ses souvenirs. 1912. Fiancée à un industriel arrogant, Rose croise sur le bateau un artiste sans le sou.', 195, '64215ce7aa53e.jpg'),
(42, 'Avatar', 2009, '64219f6300cae.jpg', 'https://www.youtube.com/embed/5PSNL1qE6VY', 8, 'Sur le monde extraterrestre luxuriant de Pandora vivent les Na&#039;vi, des êtres qui semblent primitifs, mais qui sont très évolués. Jake Sully, un ancien Marine paralysé, redevient mobile grâce à un tel Avatar et tombe amoureux d&#039;une femme Na&#039;vi. Alors qu&#039;un lien avec elle grandit, il est entraîné dans une bataille pour la survie de son monde.', 162, '64219f630106d.jpg'),
(43, 'Harry Potter à l&#039;école des sorcieres', 2001, '6421a3051cfb8.jpg', 'https://www.youtube.com/embed/P1BGgqhVGAI', 7, 'Harry Potter, un jeune orphelin, est élevé par son oncle et sa tante qui le détestent. Alors qu&#039;il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture. Le jour de son onzième anniversaire, Harry reçoit la visite inattendue d&#039;un homme gigantesque se nommant Rubeus Hagrid, et celui-ci lui révèle qu&#039;il est en fait le fils de deux puissants magiciens et qu&#039;il possède lui aussi d&#039;extraordinaires pouvoirs', 152, '6421a3051d3c4.jpg'),
(44, 'Harry Potter et la Chambre des Secrets', 2002, '6421a5290671b.jpg', 'https://www.youtube.com/embed/Z3T8PuWuoL0', 7, 'Alors que l&#039;oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d&#039;importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition. Il lui annonce que de terribles dangers menacent l&#039;école de Poudlard et qu&#039;il ne doit pas y retourner en septembre. Harry refuse de le croire. Mais sitôt la rentrée des classes effectuée, ce dernier entend une voix malveillante.', 161, '6421a52906ae6.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(39, 14),
(39, 15),
(39, 16),
(39, 17),
(40, 18),
(40, 19),
(40, 20),
(40, 21),
(40, 22),
(42, 27),
(42, 28),
(42, 29),
(42, 30),
(42, 31),
(42, 32),
(43, 33),
(44, 33),
(43, 34),
(44, 34),
(43, 35),
(44, 35),
(43, 36),
(43, 37),
(44, 37),
(44, 40);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film_genre`
--

INSERT INTO `film_genre` (`ID_genre`, `ID_film`) VALUES
(1, 1),
(1, 2),
(7, 2),
(4, 39),
(5, 39),
(5, 40),
(7, 41),
(8, 41),
(1, 42),
(9, 43),
(9, 44);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film_realisator`
--

INSERT INTO `film_realisator` (`ID_film`, `ID_realisator`) VALUES
(2, 1),
(39, 1),
(1, 2),
(40, 6),
(41, 7),
(42, 7),
(43, 9),
(44, 9);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film_scenarist`
--

INSERT INTO `film_scenarist` (`ID_film`, `ID_scenarist`) VALUES
(2, 1),
(39, 1),
(1, 2),
(1, 3),
(39, 5),
(40, 6),
(40, 7),
(41, 8),
(42, 8),
(43, 9),
(44, 9);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `ID_genre` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_genre`),
  UNIQUE KEY `genre_name` (`genre_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID_genre`, `genre_name`) VALUES
(4, 'Action'),
(7, 'Drame'),
(9, 'Fantaisie'),
(8, 'Romantique'),
(1, 'Science-fiction'),
(5, 'Super-Héros');

-- --------------------------------------------------------

--
-- Structure de la table `realisator`
--

DROP TABLE IF EXISTS `realisator`;
CREATE TABLE IF NOT EXISTS `realisator` (
  `ID_realisator` int NOT NULL AUTO_INCREMENT,
  `realisator_name` varchar(255) NOT NULL,
  `realisator_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_realisator`),
  UNIQUE KEY `realisator_name` (`realisator_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `realisator`
--

INSERT INTO `realisator` (`ID_realisator`, `realisator_name`, `realisator_photo`) VALUES
(1, 'Christopher Nolan', '642153ac50a58.jpg'),
(2, 'Denis Villeneuve', '642153b5279fe.jpg'),
(4, 'Zoro', '64215432c2840.jpg'),
(6, 'Anthony Russo et Joe Russo', '6421590ecbf0d.jpg'),
(7, 'James Cameron', '64215c26d3867.jpg'),
(9, 'Chris Columbus', '6421a0e660f1e.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_role` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_role`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `scenarist_name` varchar(255) NOT NULL,
  `scenarist_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_scenarist`),
  UNIQUE KEY `scenarist_name` (`scenarist_name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(9, 'Steve Kloves', '6421a0fdeb318.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_user` int NOT NULL AUTO_INCREMENT,
  `user_pseudo` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_role` int NOT NULL,
  PRIMARY KEY (`ID_user`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `user_role_FK` (`ID_role`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `user_pseudo`, `user_email`, `user_password`, `ID_role`) VALUES
(7, 'admino', 'admin@admin.admin', '$2y$10$wXaaQohBokaNdxsJBq6Ag.Tj/Akd4CaCNwsedG/ZnM6k1kJK1T/by', 1),
(8, 'user', 'user@user.user', '$2y$10$fHloGo1Gz1xh2cm5m1hDi.DPlUgdvc0zIbtPJ/4PK8tJqIsDCrtVO', 2),
(9, 'test', 'test@test.test', '$2y$10$shqhZSHjV0qzi5yL0/Yk2uFSK.a/Lvm/KDf3uPeaTAcLpKfKlv8Aa', 2),
(10, 'Nabil', 'nabil@nabil.nabil', '$2y$10$H3.GZRp8SqL2c59v2IIbu.7V0aDlGP0my3yTMq40b8ff78sNwck2K', 1),
(12, 'Pseudo', 'pseudo@pseudo.pseudo', '$2y$10$jX91c05/rxa3q3w4zkulEe9vq3n9sJAJIcJemWfIq1mOyKfuzGaM2', 2),
(14, 'Zoro', 'zoro@zoro.zoro', '$2y$10$OXRFCqvqtWDTUOaQ4HB3BeVzVd3GorqL82dLaxYeNrGXlNpglYO/O', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_fav`
--

INSERT INTO `user_fav` (`ID_user`, `ID_film`) VALUES
(10, 1),
(14, 1),
(7, 2),
(10, 2);

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
