-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : sam. 28 mai 2022 à 14:49
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ProjetWeb`
--

-- --------------------------------------------------------

--
-- Structure de la table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `ID_admin` int(11) NOT NULL,
  `Nom_admin` varchar(50) NOT NULL,
  `Prenom_admin` varchar(50) NOT NULL,
  `Sexe_admin` varchar(50) NOT NULL,
  `Mdp_admin` varchar(50) NOT NULL,
  `Email_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `IdClient` int(11) NOT NULL,
  `Nom_Client` varchar(50) NOT NULL,
  `Prenom_Client` varchar(50) NOT NULL,
  `Sexe_Client` varchar(50) NOT NULL,
  `Date_de_naissance` date NOT NULL,
  `Mdp_client` varchar(50) NOT NULL,
  `Email_client` varchar(50) NOT NULL,
  `Num_telephone` varchar(50) NOT NULL,
  `Profession` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Client`
--

INSERT INTO `Client` (`IdClient`, `Nom_Client`, `Prenom_Client`, `Sexe_Client`, `Date_de_naissance`, `Mdp_client`, `Email_client`, `Num_telephone`, `Profession`) VALUES
(5, 'Ndong Ngoua', 'Canestin', 'Homme', '2001-05-25', '12345', 'canestinng@gmail.com', '0605942436', 'Etudiant');

-- --------------------------------------------------------

--
-- Structure de la table `Laboratoire`
--

CREATE TABLE `Laboratoire` (
  `ID_laboratoire` int(11) NOT NULL,
  `Salle` varchar(50) NOT NULL,
  `Telephone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Paiement`
--

CREATE TABLE `Paiement` (
  `ID_paiement` int(11) NOT NULL,
  `Date_paiement` date NOT NULL,
  `Facture` decimal(15,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Personnel`
--

CREATE TABLE `Personnel` (
  `ID_person` int(11) NOT NULL,
  `Nom_person` varchar(50) NOT NULL,
  `Prenom_person` varchar(50) NOT NULL,
  `Sexe_person` varchar(50) NOT NULL,
  `Mdp_person` varchar(50) NOT NULL,
  `Email_person` varchar(50) NOT NULL,
  `Cv_person` varchar(50) NOT NULL,
  `bureau_person` varchar(50) NOT NULL,
  `Photo_person` varchar(50) NOT NULL,
  `Type_medecin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Service`
--

CREATE TABLE `Service` (
  `ID_service` int(11) NOT NULL,
  `Nom_service` varchar(50) NOT NULL,
  `Informations` varchar(500) NOT NULL,
  `Regles` varchar(500) NOT NULL,
  `ID_laboratoire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Index pour la table `Laboratoire`
--
ALTER TABLE `Laboratoire`
  ADD PRIMARY KEY (`ID_laboratoire`);

--
-- Index pour la table `Paiement`
--
ALTER TABLE `Paiement`
  ADD PRIMARY KEY (`ID_paiement`);

--
-- Index pour la table `Personnel`
--
ALTER TABLE `Personnel`
  ADD PRIMARY KEY (`ID_person`);

--
-- Index pour la table `Service`
--
ALTER TABLE `Service`
  ADD PRIMARY KEY (`ID_service`),
  ADD KEY `Service_Laboratoire_FK` (`ID_laboratoire`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `ID_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `IdClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Laboratoire`
--
ALTER TABLE `Laboratoire`
  MODIFY `ID_laboratoire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Paiement`
--
ALTER TABLE `Paiement`
  MODIFY `ID_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Personnel`
--
ALTER TABLE `Personnel`
  MODIFY `ID_person` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Service`
--
ALTER TABLE `Service`
  MODIFY `ID_service` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Service`
--
ALTER TABLE `Service`
  ADD CONSTRAINT `Service_Laboratoire_FK` FOREIGN KEY (`ID_laboratoire`) REFERENCES `Laboratoire` (`ID_laboratoire`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
