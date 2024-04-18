-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 10 avr. 2024 à 17:53
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `corpany_project_intranet`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `idActcualite` int(11) NOT NULL,
  `lien` varchar(100) DEFAULT NULL,
  `detail` varchar(100) DEFAULT NULL,
  `idGroupe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `libellé` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `libellé`) VALUES
(1, 'Employé'),
(2, 'Ressources Humaines'),
(3, 'Logistique'),
(4, 'Informatique'),
(5, 'Administateur'),
(6, 'Communication');

-- --------------------------------------------------------

--
-- Structure de la table `info_user`
--

CREATE TABLE `info_user` (
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `numTel` varchar(20) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `info_user`
--

INSERT INTO `info_user` (`prenom`, `nom`, `poste`, `numTel`, `photo`, `idUser`) VALUES
('Marc', 'MOREAU', 'PDG', '02 40 91 78 01', 'images/Organigramme/Marc_Moreau_PDG.jpeg', 1),
('Valerie', 'DESTIN', 'Responsable Administration', '02 40 91 78 02', 'images/Organigramme/Valérie_Destin_ResponsableAdmini', 2),
('Jules', 'LEBLANC', 'Responsable Projet', '02 40 91 78 03', 'images/Organigramme/Jules_Leblanc_ResponsableProjet.', 3),
('Olivier', 'PINTE', 'Développeur', '02 40 91 78 04', 'images/Organigramme/Olivier_Pinte_Developpeur.jpeg', 4),
('Manu', 'CRAFT', 'Développeur Alternant', '02 40 91 78 05', 'images/Organigramme/Manu_Craft_AlternantDev.jpeg', 5),
('Enola', 'LOPEZ', 'Dessineuse Dev', '02 40 91 78 06', 'images/Organigramme/Enola_Lopez_DessigneuseDev.jpeg', 6),
('Roseline', 'SOURIANT', 'DRH', '02 40 91 78 07', 'images/Organigramme/Roseline_Souriant_DRH.jpeg', 7),
('Laura', 'GOUT', 'Assistante RH', '02 40 91 78 08', 'images/Organigramme/Laura_Gout_AssistanteRH.jpeg', 8),
('Elsa', 'PELLE', 'Communication', '02 40 91 78 09', 'images/Organigramme/Elsa_Pelle_Communication', 9),
('Malik', 'BROWN', 'Responsable Ménage', '02 40 91 78 10', 'images/Organigramme/Malik_Brown_ResponsableMenage', 10);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `email`, `motDePasse`, `idGroupe`) VALUES
(1, 'marc.moreau@corpany.com', 'mdp', 5),
(2, 'valerie.destin@corpany.com', 'mdp', 2),
(3, 'jules.leblanc@corpany.com', 'mdp', 4),
(4, 'olivier.pinte@corpany.com', 'mdp', 4),
(5, 'manu.craft@corpany.com', 'mdp', 4),
(6, 'enola.lopez@corpany.com', 'mdp', 4),
(7, 'roseline.souriant@corpany.com', 'mdp', 2),
(8, 'laura.gout@corpany.com', 'mdp', 2),
(9, 'elsa.pelle@corpany.com', 'mdp', 6),
(10, 'malik.brown@corpany.com', 'mdp', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`idActcualite`),
  ADD KEY `FK_ACTUALITE_idGroupe` (`idGroupe`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Index pour la table `info_user`
--
ALTER TABLE `info_user`
  ADD KEY `FK_INFO_IDUSER` (`idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD CONSTRAINT `FK_ACTUALITE_idGroupe` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`);

--
-- Contraintes pour la table `info_user`
--
ALTER TABLE `info_user`
  ADD CONSTRAINT `FK_INFO_IDUSER` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
