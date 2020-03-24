-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 mars 2020 à 16:58
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gbaf`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id`, `name`, `description`, `logo`) VALUES
(1, 'Formation&co', 'Formation&co est une association française présente sur tout le territoire.<br/>\r\nNous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.<br/>Notre proposition :<br/>\r\n<ul> \r\n<li>- un financement jusqu’à 30 000€</li>\r\n<li>- un suivi personnalisé et gratuit</li>\r\n<li>- une lutte acharnée contre les freins sociétaux et les stéréotypes.</li>\r\n</ul>\r\nLe financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres...<br/> Nous collaborons avec des personnes talentueuses et motivées.\r\nVous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.\r\n', 'formation_co.png'),
(2, 'Protectpeople', 'Protectpeople finance la solidarité nationale.<br/>\r\nNous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.<br/><br/>\r\nChez Protectpeople, chacun cotise selon ses moyens et reçoit selon ses besoins.\r\nProectecpeople est ouvert à tous, sans considération d’âge ou d’état de santé.\r\nNous garantissons un accès aux soins et une retraite.<br/><br/>\r\nChaque année, nous collectons et répartissons 300 milliards d’euros.\r\nNotre mission est double :<br/>\r\nsociale : nous garantissons la fiabilité des données sociales ; <br/>\r\néconomique : nous apportons une contribution aux activités économiques.', 'protectpeople.png'),
(3, 'Dsa France', 'Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales.<br/><br/>\r\nNous accompagnons les entreprises dans les étapes clés de leur évolution.<br/>\r\nNotre philosophie : s’adapter à chaque entreprise.<br/><br/>\r\nNous les accompagnons pour voir plus grand et plus loin et proposons des solutions de financement adaptées à chaque étape de la vie des entreprises.\r\n', 'Dsa_france.png'),
(4, 'Cde', 'La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation.<br/><br/>\r\nSon président est élu pour 3 ans par ses pairs, chefs d’entreprises et présidents des CDE.\r\n', 'CDE.png');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `date_add` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_user`, `id_actor`, `date_add`, `content`) VALUES
(18, 11, 1, '2020-03-24 14:55:33', 'Ceci est mon commentaire à propos de Formation &amp; Co. Je ne sais pas si les autres utilisateurs aurons le même avis que moi.'),
(19, 11, 2, '2020-03-24 14:56:27', 'Je n\'aime pas beaucoup le politique de confidentialité'),
(20, 11, 3, '2020-03-24 14:56:47', 'Ceci est mon commnetaire'),
(21, 11, 4, '2020-03-24 14:57:03', 'Pas grand choses à dire a propos de CDE'),
(22, 12, 1, '2020-03-24 14:58:04', 'Je suis tout à fait d’accords avec le commentaire précédent. '),
(23, 12, 2, '2020-03-24 14:58:39', 'En ce qui me concerne je ne trouve rien a redire à  ce sujet. '),
(24, 12, 3, '2020-03-24 14:59:19', 'Je poste également un commentaire au sujet de DSA France'),
(25, 12, 4, '2020-03-24 15:00:05', 'Il n\'y a rien a dire. Un travail formidable.'),
(26, 13, 1, '2020-03-24 15:00:42', 'Voici mon avis sur Formation &amp; Co'),
(27, 13, 2, '2020-03-24 15:01:12', 'J\'aurais aimé pouvoir mettre plusieurs avis positif au sujet de Protectpeople'),
(28, 13, 3, '2020-03-24 15:01:58', 'Voici un avis constructif et extrêmement bien formulé de ma part au sujet de DSA France. '),
(29, 13, 4, '2020-03-24 15:02:47', 'Ceci est un commentaire beaucoup plus bref, mais qui n\'en dit pas moins '),
(30, 15, 1, '2020-03-24 15:03:54', 'Un commentaire de plus au sujet de Formation &amp; co. Avec toutefois quelques mot de plus afin de donner une sensation de contenu.'),
(31, 15, 2, '2020-03-24 15:05:25', 'Visiblement Protectpeople est un acteur qui fait débat. Pour ma part je ne pense pas que les choses soient aussi manichéennes. Il faut tenir compte du contexte et ainsi pouvoir nuancer son point de vue.  '),
(32, 15, 3, '2020-03-24 15:06:04', 'Une structure qui fait aujourd\'hui référence dans le métier.'),
(33, 14, 1, '2020-03-24 15:07:34', 'Ceci est mon commentaire. J\'espère de pas en avoir trop dit.'),
(34, 14, 2, '2020-03-24 15:08:30', 'Je ne saurais être plus constructif que les précédents commentaire, toutefois je garde un avis bien tranché au sujet de cet acteur.'),
(35, 14, 3, '2020-03-24 15:09:59', 'Je souhaites également donner mon avis au sujet de DSA France mais les mots me manque alors je me contenterais d\'aligner des mots sans pour autant être constructif. L\'important n\'est-il pas de participer?'),
(36, 17, 1, '2020-03-24 15:12:29', 'Ceci est un commentaire de plus à ce sujet'),
(37, 17, 2, '2020-03-24 15:13:41', 'Voici mon commentaire à sujet.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(150) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `username`, `pwd`, `question`, `answer`) VALUES
(11, 'Dupont', 'Pierre', 'usertest1', '$2y$10$RYfbtvTZtxwYP75Q8nYYJekrS84eirjRVENp8wDCXi0gN6ftA2mse', 'Quel est le nom de votre premier animal de compagnie ?', 'chien'),
(12, 'Faure', 'Paul', 'usertest2', '$2y$10$Wi1k8XS2jqF.7nHL2F8z0.MBRWRLgxUT4n/sw6mFS77GQObJizOJy', 'Quel est le nom de votre premier animal de compagnie ?', 'chien'),
(13, 'Pinault', 'François', 'usertest3', '$2y$10$gToUrBVV98Qf51gDDG9hieHqnhuKlUDLdEvwSSPzEGUolJtCK0Or6', 'Quel est le nom de votre premier animal de compagnie ?', 'chien'),
(14, 'Favre', 'Martine', 'usertest4', '$2y$10$jl.6Pzv57amH6vv2Vmaz/uSW8XmowKl9P7RCYbQt7zdP.zKfe/7JK', 'Quel est le nom de votre premier animal de compagnie ?', 'chien'),
(15, 'Dantons', 'Nicoles', 'usertest5', '$2y$10$CmPvCQkx/x7/TYRr0CTOmufgb.KsZILVio8uxJIKRLRe5qu3ouHsa', 'Quel est le nom de votre premier animal de compagnie ?', 'chien'),
(17, 'Klein', 'Jeanne', 'jeanne', '$2y$10$wxIym8YspwV7kkXclwdy2O8P5oz06EERpCuhXLLOw7XMkT/mmEyUm', 'Quel est le nom de votre premier animal de compagnie ?', 'chien'),
(36, 'Test', 'User', 'test', '$2y$10$etRwM8HXJA9DzfP8YdwhVe313tXqO2sTyoOV.EohOgoVm0zWsUZLi', 'Quel est la marque de votre première voiture ?', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `votes`
--

DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `dolike` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `votes`
--

INSERT INTO `votes` (`id`, `id_user`, `id_actor`, `dolike`) VALUES
(66, 11, 1, 1),
(67, 11, 2, 0),
(68, 11, 3, 1),
(69, 11, 4, 1),
(70, 12, 1, 1),
(71, 12, 2, 1),
(72, 12, 3, 1),
(73, 12, 4, 1),
(74, 13, 1, 0),
(75, 13, 2, 1),
(76, 13, 3, 0),
(77, 13, 4, 1),
(78, 15, 1, 1),
(79, 15, 2, 0),
(80, 15, 3, 1),
(81, 15, 4, 1),
(82, 14, 1, 1),
(83, 14, 2, 1),
(84, 14, 3, 1),
(85, 14, 4, 1),
(86, 17, 1, 1),
(87, 17, 2, 1),
(88, 17, 3, 1),
(89, 17, 4, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
