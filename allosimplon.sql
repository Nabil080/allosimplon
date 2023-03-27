-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 25 mars 2023 à 10:06
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
  PRIMARY KEY (`ID_actor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`ID_actor`, `actor_name`, `actor_photo`) VALUES
(1, 'Matthew McConaughey', 'matthew.jpg'),
(2, 'Anne Hathaway', 'anne.jpg'),
(3, 'Jessica Chastain', 'jessica.jpg'),
(4, 'Ryan Gosling', 'ryan.jpg'),
(5, 'Harrison Ford', 'harrison.jpg'),
(6, 'Ana de Armas', 'ana.jpg'),
(7, 'Robin Wright', 'robin.jpg'),
(8, 'Sylvia Hoeks', 'sylvia.jpg');

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
  `film_description` varchar(510) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `film_time` int NOT NULL,
  `film_background` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_film`),
  UNIQUE KEY `film_name_2` (`film_name`),
  KEY `film_name` (`film_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`ID_film`, `film_name`, `film_date`, `film_photo`, `film_video`, `film_grade`, `film_description`, `film_time`, `film_background`) VALUES
(1, 'Blade runner', 2017, '4.jpg', 'https://www.youtube.com/embed/FfRPKYwsFNg', 8, 'Blade Runner 2049 est un film de science-fiction américain réalisé par Denis Villeneuve et sorti en 2017. Il fait suite au film Blade Runner, réalisé par Ridley Scott (producteur de cette suite), sorti en 1982 et adapté du roman Les androïdes rêvent-ils de moutons électriques ? de Philip K. Dick.\r\n\r\nL\'histoire de Blade Runner 2049 se situe trente ans après les aventures de Rick Deckard et raconte les aventures d\'un « blade runner » (policier chargé de traquer les réplicants, des androïdes créés à l\'image ', 163, '4-bg.jpg'),
(2, 'Interstellar', 2014, '8.jpg', 'https://www.youtube.com/embed/VaOijhK3CRU', 10, 'Interstellar, ou Interstellaire1 au Québec et au Nouveau-Brunswick, est un film de science-fiction britannico-américain produit, écrit et réalisé par Christopher Nolan, sorti en 2014.\r\n\r\nIl met en scène Matthew McConaughey, Anne Hathaway, Jessica Chastain, Michael Caine, Casey Affleck et Matt Damon.\r\n\r\nAlors que la Terre se meurt, une équipe d\'astronautes franchit un trou de ver apparu près de Saturne et conduisant à une autre galaxie, afin d\'explorer un nouveau système stellaire dans l\'espoir de trouver ', 169, '8-bg.jpg');

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
(1, 8);

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
(2, 2);

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
(1, 2);

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
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `ID_genre` int NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`ID_genre`, `genre_name`) VALUES
(1, 'science-fiction'),
(2, 'drame');

-- --------------------------------------------------------

--
-- Structure de la table `realisator`
--

DROP TABLE IF EXISTS `realisator`;
CREATE TABLE IF NOT EXISTS `realisator` (
  `ID_realisator` int NOT NULL AUTO_INCREMENT,
  `realisator_name` varchar(255) NOT NULL,
  `realisator_photo` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_realisator`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `realisator`
--

INSERT INTO `realisator` (`ID_realisator`, `realisator_name`, `realisator_photo`) VALUES
(1, 'Christopher Nolan', 'christopher.jpg'),
(2, 'Denis Villeneuve', 'denis.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `ID_role` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_role`)
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
  PRIMARY KEY (`ID_scenarist`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `scenarist`
--

INSERT INTO `scenarist` (`ID_scenarist`, `scenarist_name`, `scenarist_photo`) VALUES
(1, 'Jonathan Nolan', 'jonathan.jpg'),
(2, 'Hampton Fancher', 'hampton.jpg'),
(3, 'Ridley Scott', 'ridley.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_user`, `user_pseudo`, `user_email`, `user_password`, `ID_role`) VALUES
(7, 'admin', 'admin@admin.admin', '$2y$10$0732yQAZPdqvlF5oN25FTuFSknQcACKCSH.0tcYu/i.CKCisO5eYm', 1),
(8, 'user', 'user@user.user', '$2y$10$fHloGo1Gz1xh2cm5m1hDi.DPlUgdvc0zIbtPJ/4PK8tJqIsDCrtVO', 2),
(9, 'test', 'test@test.test', '$2y$10$shqhZSHjV0qzi5yL0/Yk2uFSK.a/Lvm/KDf3uPeaTAcLpKfKlv8Aa', 2),
(10, 'Nabil', 'nabil@nabil.nabil', '$2y$10$H3.GZRp8SqL2c59v2IIbu.7V0aDlGP0my3yTMq40b8ff78sNwck2K', 1),
(12, 'Pseudo', 'pseudo@pseudo.pseudo', '$2y$10$jX91c05/rxa3q3w4zkulEe9vq3n9sJAJIcJemWfIq1mOyKfuzGaM2', 2),
(13, 'moche', 'moche@moche.moche', '$2y$10$1sSyd7jzVGKRNs1NLYemleVadGabhYG.5KfjgrF1Fkykni7vm4h9m', 2);

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
(7, 2),
(10, 2),
(13, 2);

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
