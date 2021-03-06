-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 06 mars 2021 à 17:01
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gescom`
--

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

CREATE TABLE `caisse` (
  `id` int(11) NOT NULL,
  `typeEnregistrement` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `montant` decimal(65,0) NOT NULL,
  `dateEnregistrement` date NOT NULL,
  `heure` varchar(255) NOT NULL,
  `somEntree` decimal(65,0) NOT NULL,
  `SomSortie` decimal(65,0) NOT NULL,
  `total` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`id`, `typeEnregistrement`, `motif`, `montant`, `dateEnregistrement`, `heure`, `somEntree`, `SomSortie`, `total`) VALUES
(13, 'Entree', 'versement', '20000', '2020-12-21', '17:21:25', '0', '0', '0'),
(18, 'Entree', 'versement', '20000', '2020-12-21', '17:24:01', '0', '0', '0'),
(19, 'Sortie', 'depenses', '100000', '2020-12-21', '14:55:37', '0', '0', '0'),
(21, 'Sortie', 'transport', '50000', '2020-12-22', '17:32:15', '0', '0', '0'),
(22, 'Entree', 'vente', '250000', '2021-01-04', '17:32:47', '0', '0', '0');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `telephone`, `adresse`, `email`) VALUES
(5, 'Jules Sall', '776253729', 'Gueule Tapée', 'jule@gmail.com'),
(6, 'Pape Ba', '705950781', 'liberté 6 extension', 'abouassane71@gmail'),
(7, 'Sitan Drame', '772934214', 'diamageune', 'sitan@gmail.com'),
(8, 'Samantha', '786356472', 'pikine', 'sam@gmail.com'),
(9, 'Pape Ba', '756278440', 'pikine', 'pape@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

CREATE TABLE `employer` (
  `telephone` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `salaire` varchar(255) NOT NULL,
  `conges` varchar(255) NOT NULL,
  `assurance` varchar(255) NOT NULL,
  `posteServi` varchar(255) NOT NULL,
  `DateIntegration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employer`
--

INSERT INTO `employer` (`telephone`, `nom`, `prenom`, `adresse`, `email`, `salaire`, `conges`, `assurance`, `posteServi`, `DateIntegration`) VALUES
('772934214', '                  Drame                  ', '                  Sitan', '                  Dakar ', '                  sitan12@gmail', ' 2000000', '            2mois  ', '              ', 'autre', '0000-00-00'),
('778273010', 'Ba', 'Pape', 'pikine', 'pape@gmail.com', '2000000', '', '', 'DG', '0000-00-00'),
('783456271', 'Diop', 'Omar', 'kolda', 'sitan@gmail.com', '200000', '', '', 'technicien', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(255) NOT NULL,
  `dateFacture` date DEFAULT NULL,
  `quantite` int(255) NOT NULL,
  `produit` int(255) NOT NULL,
  `prixUnitaire` decimal(65,0) NOT NULL,
  `Total` decimal(65,0) NOT NULL,
  `tva` int(255) NOT NULL,
  `client` int(255) NOT NULL,
  `montantHT` decimal(65,0) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `dateFacture`, `quantite`, `produit`, `prixUnitaire`, `Total`, `tva`, `client`, `montantHT`, `type`, `status`) VALUES
(36, '2021-01-18', 4, 26, '456', '1824', 12, 5, '0', '', 0),
(37, '2021-01-18', 4, 26, '456', '1824', 12, 5, '0', '', 0),
(38, '2021-01-18', 34, 27, '4667', '158678', 3, 6, '0', '', 0),
(40, '2021-01-21', 7, 26, '2000', '14000', 18, 6, '0', '', 0),
(42, '2021-01-21', 9, 26, '5879', '52911', 0, 5, '0', '', 0),
(43, '2021-03-02', 4, 27, '4555', '18220', 18, 6, '0', '', 0),
(44, '2021-03-02', 2, 27, '4555', '9110', 18, 6, '0', '', 0),
(45, '2021-03-02', 4, 27, '4555', '18220', 18, 6, '0', '', 0),
(46, '2021-03-02', 5, 27, '4555', '22775', 18, 6, '0', '', 0),
(47, '2021-03-02', 5, 26, '200000', '1000000', 18, 6, '0', '', 0),
(48, '2021-03-02', 6, 26, '523454', '3140724', 18, 5, '0', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nomProduit` varchar(255) NOT NULL,
  `descriptionProduit` text NOT NULL,
  `dateEnregistrement` date NOT NULL,
  `imageProduit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nomProduit`, `descriptionProduit`, `dateEnregistrement`, `imageProduit`) VALUES
(26, 'gescom', 'blablablablablablablablblblblaaaaaaaaaaaaaaaaaaaaaaaa', '2021-01-04', 'Capture d’écran (41).png'),
(27, 'voilehabiba', 'voile doux, souple.........', '2021-01-04', 'Habiba.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`telephone`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`),
  ADD KEY `designation` (`produit`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caisse`
--
ALTER TABLE `caisse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`produit`) REFERENCES `produit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
