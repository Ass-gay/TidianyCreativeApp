-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 juil. 2026 à 00:25
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tidianycreativeapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sujet` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `email`, `sujet`, `message`, `created_at`) VALUES
(1, 'Abdou Lo', 'Abdou@gmail.com', 'Un Site Wrb', 'C\'est un site vitrine', '2026-04-05 23:52:36');

-- --------------------------------------------------------

--
-- Structure de la table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(900) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`) VALUES
(1, 'modou@gmail.com', '2026-04-06 02:19:26'),
(2, 'doudou@gmail.com', '2026-04-06 11:02:07');

-- --------------------------------------------------------

--
-- Structure de la table `servicereas`
--

CREATE TABLE `servicereas` (
  `id` int(11) NOT NULL,
  `nom` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(500) NOT NULL,
  `etat` int(11) DEFAULT 1,
  `type` varchar(1) NOT NULL DEFAULT 'R',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `servicereas`
--

INSERT INTO `servicereas` (`id`, `nom`, `description`, `photo`, `etat`, `type`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(8, 'Affiche Anniversaire', 'Conception d une affiche anniversaire moderne et attrayante mettant en valeur l evenement avec des couleurs vives et une mise en page festive adaptee à tous types de célébrations', '69ccfc8489b19_annif.jpg', 1, 'R', '2026-04-01 11:07:48', NULL, NULL, 1, NULL, NULL),
(9, 'Affiche Mariage', 'Création d un visuel elegant pour mariage  avec un design raffine des couleurs harmonieuses et une presentation parfaite pour annoncer un evenement inoubliable', '69ccff0cd89e0_Mariage2.jpg', 1, 'R', '2026-04-01 11:18:36', NULL, NULL, 1, NULL, NULL),
(10, 'Affiche Vente en ligne', 'Design publicitaire conçu pour promouvoir des produits en ligne avec un style moderne et accrocheur visant à attirer l attention et augmenter les ventes', '69cd0087f1d06_vente_Ligne2.jpg', 1, 'R', '2026-04-01 11:24:56', NULL, NULL, 1, NULL, NULL),
(11, 'Affiche Fast-Food', 'Réalisation d une affiche gourmande et dynamique pour restaurant mettant en avant les produits avec des visuels appétissants et un design impactant', '69cd00d832bea_pizaa.jpg', 1, 'R', '2026-04-01 11:26:16', NULL, NULL, 1, NULL, NULL),
(12, 'Affiche Religieuse', 'Conception d un visuel respectueux et inspirant pour evenements religieux avec une présentation sobre et adaptée au contexte spirituel', '69cd0120bb52a_conf instutut.jpg', 1, 'R', '2026-04-01 11:27:28', NULL, NULL, 1, NULL, NULL),
(13, 'Affiche Publicitaire', 'Création d un support visuel professionnel destine à promouvoir une activité un service ou un événement avec un design moderne et efficace', '69cd016215842_makeup.jpg', 1, 'R', '2026-04-01 11:28:34', NULL, NULL, 1, NULL, NULL),
(14, 'Affiches de sensibilisation Sét-Sétal', 'Création d affiches pour la sensibilisation à la proprete et à l hygiene dans les quartiers écoles et evenements communautaires  Des designs clairs attractifs et adaptés au contexte local sénégalais', '69cd02ce38658_set_setal.jpg', 1, 'R', '2026-04-01 11:34:38', NULL, NULL, 1, NULL, NULL),
(15, 'Affiche publicitaire pour service de livraison', 'Création d affiches modernes pour promouvoir les services de livraison rapide et fiable Des visuels attractif  conçus pour les commerces restaurants et entreprises afin de faciliter la communication et attirer plus de client', '69cd03767d941_affiche Moto.jpg', 1, 'R', '2026-04-01 11:37:26', NULL, NULL, 1, NULL, NULL),
(16, 'Développement de site web', 'Nous créons des sites web modernes  rapides et adaptés à tous les écrans mobile tablette ordinateur Sites vitrines blogs ou sites professionnels pour améliorer votre presence en ligne', '69cd1ee08ff9b_developpement-web (1).png', 1, 'S', '2026-04-01 13:21:57', '2026-04-01 13:34:24', NULL, 1, 1, NULL),
(17, 'Dév application mobile', 'Conception et développement dapplications mobiles performantes et intuitives Android  iOS pour répondre aux besoins de votre entreprise et de vos utilisateurs', '69cd37b982db6_interface-utilisateur-mobile.png', 1, 'S', '2026-04-01 13:23:16', '2026-04-09 01:30:52', '2026-04-09 01:30:38', 1, 1, 1),
(18, 'Dév application web', 'Création applications web dynamiques et sécurisées pour la gestion de vos activités  tableaux de bord systèmes de gestion plateformes en ligne', '69cd37e6933b0_www.png', 1, 'S', '2026-04-01 13:24:15', '2026-04-01 15:21:10', NULL, 1, 1, NULL),
(19, 'Design et art graphique', 'Réalisation de designs professionnels  affiches logos identité visuelle et contenus graphiques modernes pour renforcer l image de votre marque', '69cd1f574df05_outil-plume.png', 1, 'S', '2026-04-01 13:36:23', NULL, NULL, 1, NULL, NULL),
(20, 'Accompagnement digital', 'Nous accompagnons les entreprises dans leur transformation digitale stratégie présence en ligne gestion de contenus et optimisation des outils numériques', '69cd1f87da6e3_digital-transformation.png', 1, 'S', '2026-04-01 13:37:11', NULL, NULL, 1, NULL, NULL),
(21, 'Data science', 'Analyse et exploitation des données pour aider les entreprises à prendre de meilleures décisions grâce à des rapports statistiques et visualisations intelligentes', '69cd1fb1578a7_data-science.png', 1, 'S', '2026-04-01 13:37:53', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL,
  `adresse` text NOT NULL,
  `telephone` varchar(900) NOT NULL,
  `photo` varchar(900) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(8) NOT NULL DEFAULT 'Admin',
  `etat` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `adresse`, `telephone`, `photo`, `email`, `password`, `role`, `etat`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`) VALUES
(1, 'Ass Gaye', 'Nayobe', '765337247', 'default.jpg', 'ass@gmail.com', '@ass1234', 'Admin', 1, '2026-03-25 21:54:58', NULL, NULL, 0, NULL, NULL),
(2, 'Ass Gaye', 'Louga', '7654332333', '69d1988757227_ass.jpg', 'gayeass425@gmail.com', '$2y$10$OROMgbfaq9BO9ZQx.kLyEuppjB0iB59kpu4eC8SNAAC9ByVzRMWhC', 'Admin', 1, '2026-04-04 23:02:31', '2026-04-06 15:50:47', NULL, 1, 2, 2),
(3, 'Abdou Loum', 'Dakar', '765443234', '69d19a5033b2d_malick.jpg', 'loum@gmail.com', '$2y$10$2vOtgUvu/4yLiVkal9nmfOsP3YdJPZR.B3qwSWVphMlwImFAjAnaG', 'Admin', 0, '2026-04-04 23:10:08', NULL, '2026-04-05 15:09:08', 1, NULL, 2),
(4, 'Maty Fall', 'Touba', '765554433', '69d1a5651f6d6_IMG-20260126-WA0132.jpg', 'maty@gmail.com', 'iaiXvmWz', 'Admin', 0, '2026-04-04 23:57:25', NULL, '2026-04-05 15:09:03', 2, NULL, 2),
(5, 'Talla Sarr', 'Lamdou', '789877765', '69d1a6820a521_me.jpg', 'talla@gmail.com', '$2y$10$fHApHf35ynWa1qBysQGMiunxkBemQF.F5wkxX3Hw8FDEdAZhB.AXO', 'Admin', 1, '2026-04-05 00:02:10', '2026-04-09 01:10:25', '2026-04-05 21:57:40', 2, 1, 1),
(6, 'Modou', 'Louga', '7654332333', '69d1aa694b224_IMG-20260126-WA0134.jpg', 'modou@gmail.com', 'ml0Z3uFM', 'Admin', 0, '2026-04-05 00:18:49', '2026-04-05 15:04:23', '2026-04-05 15:08:50', 3, 2, 2),
(7, 'Dame Kante', 'Pikin', '786543323', '69d27e69a13c3_malick.jpg', 'dame@gmail.com', '$2y$10$pelK3F76tMT.cQc6ktn3ce7TlRuOGnIEKqChIVbwCBmy6d0cU7pvS', 'Admin', 0, '2026-04-05 15:23:21', NULL, '2026-04-05 15:23:53', 2, NULL, 2),
(8, 'Pape Fall Par', 'Parcel', '789999999', '69d288070a80d_ass.jpg', 'pape@gmail.com', '$2y$10$Tbe7p6tEoTqiu0E85Gm2P.HxbO/F6ewbw6sGYPHWL8SZWq8Iw7I5a', 'Admin', 0, '2026-04-05 15:24:40', '2026-04-05 16:04:23', '2026-04-05 21:57:33', 2, 2, 1),
(9, 'aswww', 'kiiio', '786666666', '69d27ef6ac157_IMG-20260126-WA0132.jpg', 'as@gmail.com', '$2y$10$12qctBVFH28GP0Ghj8OTp.YwEPLdqorORSD4XtZkqcwo2uQtOZLDW', 'Admin', 0, '2026-04-05 15:25:42', NULL, '2026-04-05 15:46:46', 2, NULL, 2),
(10, 'nnnnnnnnnnn', 'nnnnnnnnnnnnnnnn', '8888888888888', '69d281a7914df_97e55bd7-20bf-430e-a4f8-d0b2316f7d5c.jpg', 'jj@gmail.com', '$2y$10$sKu31gjRMhijegJRLs9RvuSIdltDy7PYHk06eE4gFUkB8kAsQOfoq', '', 0, '2026-04-05 15:37:11', NULL, '2026-04-05 15:46:39', 2, NULL, 2),
(11, 'Falou Lo T', 'Niomre', '786543323', '69d2881d6109d_FB_IMG_1769375122773.jpg', 'falou@gmail.com', '$2y$10$SGk5Z.SmvD67sEVeDtBXT..K2Sy9UVo0YQ/gCr6lWpwqtoDi88Jre', 'Equipe', 0, '2026-04-05 15:47:31', '2026-04-05 16:04:45', '2026-04-05 21:57:27', 2, 2, 1),
(12, 'Ass Gaye', 'Nayobe', '765337247', '69d2db2309dd9_equipe2.png', 'elzogaye234@gmail.com', '$2y$10$hOhDGIKjBPR06VumHf1EZePirYEik1MDjLGyUjNI1Qphlx2o.D6Wi', 'Equipe', 1, '2026-04-05 21:58:59', NULL, NULL, 1, NULL, NULL),
(13, 'Djiby Seck', 'Mbour', '765554325', '69d2db572766e_equipe1.png', 'seck@gmail.com', '$2y$10$aF6XoAp.VUeAP6ID67WPRuEs/w2i00GQc5CTDE.DfPzd7stVGI8ja', 'Equipe', 1, '2026-04-05 21:59:51', NULL, NULL, 1, NULL, NULL),
(14, 'Talla Sarr', 'Louga', '765554390', '69d2db7d33f7f_equipe3.png', 'sarr@gmail.com', '$2y$10$MXCGZpv0SiLhMFGmvZAsbuAGKLiDA0AptGeaqnBF.dIr3em0XpT4.', 'Equipe', 0, '2026-04-05 22:00:29', NULL, '2026-04-09 01:10:34', 1, NULL, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `servicereas`
--
ALTER TABLE `servicereas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `deleted_by` (`deleted_by`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deleted_by` (`deleted_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `servicereas`
--
ALTER TABLE `servicereas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `servicereas`
--
ALTER TABLE `servicereas`
  ADD CONSTRAINT `servicereas_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `servicereas_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `servicereas_ibfk_3` FOREIGN KEY (`deleted_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
