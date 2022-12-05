-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 déc. 2022 à 01:23
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hotels`
--

-- --------------------------------------------------------

--
-- Structure de la table `slideimage`
--

CREATE TABLE `slideimage` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tohostel_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `slideimage`
--

INSERT INTO `slideimage` (`id`, `room_id`, `url`, `caption`, `tohostel_id`) VALUES
(1, 1, 'https://cdn.pixabay.com/photo/2016/11/19/13/06/bed-1839184_960_720.jpg', 'lorem lorem', NULL),
(2, 1, 'https://cdn.pixabay.com/photo/2016/11/19/13/06/bed-1839183_960_720.jpg', 'Lorem ipsum lorem lorem', NULL),
(3, 1, 'https://cdn.pixabay.com/photo/2020/11/24/11/36/bedroom-5772286_960_720.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra sit amet aliquam id diam maecenas ultricies mi.', NULL),
(4, 1, 'https://cdn.pixabay.com/photo/2016/11/18/13/02/bed-1834327_960_720.jpg', 'Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec.', NULL),
(5, 1, 'https://cdn.pixabay.com/photo/2016/11/30/08/48/bedroom-1872196_960_720.jpg', 'Enim lobortis scelerisque fermentum dui. Parturient montes nascetur ridiculus mus mauris vitae. Sed enim ut sem viverra aliquet. Elementum tempus egestas sed sed risus pretium quam vulputate dignissim.', NULL),
(6, 8, 'https://cdn.pixabay.com/photo/2021/11/08/00/30/bedroom-6778193_960_720.jpg', 'Etiam massa sapien, posuere bibendum pharetra et, blandit in ligula. Suspendisse ut tincidunt nulla, vel facilisis neque. Suspendisse consectetur accumsan felis, id tristique ante semper nec.', NULL),
(7, 2, 'https://cdn.pixabay.com/photo/2016/11/30/08/48/bedroom-1872196__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(8, 2, 'https://static.vecteezy.com/system/resources/previews/000/731/908/non_2x/bedroom-art-deco-style-photo.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(9, 2, 'https://cdn.pixabay.com/photo/2014/08/11/21/40/bedroom-416062__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(10, 3, 'https://cdn.pixabay.com/photo/2016/03/27/20/00/coffee-1284041__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(11, 3, 'https://cdn.pixabay.com/photo/2016/11/19/13/06/bed-1839184__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(12, 3, 'https://cdn.pixabay.com/photo/2016/11/19/13/06/bed-1839183__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(13, 4, 'https://cdn.pixabay.com/photo/2017/08/08/00/27/home-2609600__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(14, 4, 'https://cdn.pixabay.com/photo/2016/03/28/09/34/bedroom-1285156__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(15, 4, 'https://cdn.pixabay.com/photo/2020/11/24/11/36/bedroom-5772286__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(16, 24, 'https://cdn.pixabay.com/photo/2016/11/18/13/02/bed-1834327__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(17, 24, 'https://cdn.pixabay.com/photo/2021/12/23/03/58/da-guojing-6888603__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1),
(18, 24, 'https://cdn.pixabay.com/photo/2018/06/14/21/15/bedroom-3475656__340.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `slideimage`
--
ALTER TABLE `slideimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AFD89A9054177093` (`room_id`),
  ADD KEY `IDX_AFD89A901FF1770E` (`tohostel_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `slideimage`
--
ALTER TABLE `slideimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `slideimage`
--
ALTER TABLE `slideimage`
  ADD CONSTRAINT `FK_AFD89A901FF1770E` FOREIGN KEY (`tohostel_id`) REFERENCES `hostel` (`id`),
  ADD CONSTRAINT `FK_AFD89A9054177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
