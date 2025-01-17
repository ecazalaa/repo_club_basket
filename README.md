# repo_club_basket

Aperçu du Projet
Cette application web permet la gestion d'un club de basket, incluant la gestion des joueurs, des matchs, des statistiques et des commentaires. Le site est développé en PHP avec une base de données MySQL, suivant l'architecture MVC (Modèle-Vue-Contrôleur).


🌐 Accès au Site Déployé

URL du site : https://clubbasket.alwaysdata.net/index.php

Pour accéder au site :

Nom : admin

Prénom : admin

Mot de passe : admin



SCRIPT SQL de Création de la bd :

CREATE TABLE `utilisateur` (
  `Id_Utilisateur` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prenom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Mot_de_passe` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"

CREATE TABLE `match_basket` (
  `Id_Match` int NOT NULL AUTO_INCREMENT,
  `M_date` datetime DEFAULT NULL,
  `nom_adversaire` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resultat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Match`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"

CREATE TABLE `participer` (
  `licence` int NOT NULL,
  `Id_Match` int NOT NULL,
  `Titu_Remp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poste` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`licence`,`Id_Match`),
  KEY `Id_Match` (`Id_Match`),
  CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`licence`) REFERENCES `joueur` (`licence`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`Id_Match`) REFERENCES `match_basket` (`Id_Match`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"

CREATE TABLE `joueur` (
  `licence` int NOT NULL,
  `Nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prenom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `taille` int DEFAULT NULL,
  `poids` int DEFAULT NULL,
  `statut` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Id_Commentaire` int DEFAULT NULL,
  PRIMARY KEY (`licence`),
  KEY `Id_Commentaire` (`Id_Commentaire`),
  CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`Id_Commentaire`) REFERENCES `commentaire` (`Id_Commentaire`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"

CREATE TABLE `commentaire` (
  `Id_Commentaire` int NOT NULL AUTO_INCREMENT,
  `texte` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`Id_Commentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci"
