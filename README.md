# repo_club_basket

Aperçu du Projet
Cette application web permet la gestion d'un club de basket, incluant la gestion des joueurs, des matchs, des statistiques et des commentaires. Le site est développé en PHP avec une base de données MySQL, suivant l'architecture MVC (Modèle-Vue-Contrôleur).


🌐 Accès au Site Déployé

URL du site : https://clubbasket.alwaysdata.net/index.php

Pour accéder au site :

Nom : admin
Prénom : admin
Mot de passe : admin





script sql

-- Création de la base de données club_basket si elle n'existe pas
CREATE DATABASE IF NOT EXISTS club_basket CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Utilisation de la base de données club_basket
USE club_basket;

-- Création de la table Match_Basket
DROP TABLE IF EXISTS Match_Basket;
CREATE TABLE Match_Basket (
Id_Match INT AUTO_INCREMENT,
M_date DATETIME,
nom_adversaire VARCHAR(50),
lieu VARCHAR(50),
resultat INT,
PRIMARY KEY(Id_Match)
);

-- Création de la table Utilisateur
DROP TABLE IF EXISTS Utilisateur;
CREATE TABLE Utilisateur (
Id_Utilisateur INT AUTO_INCREMENT,
Nom VARCHAR(50),
Prenom VARCHAR(50),
Mot_de_passe VARCHAR(50),
PRIMARY KEY(Id_Utilisateur)
);

-- Création de la table Commentaire
DROP TABLE IF EXISTS Commentaire;
CREATE TABLE Commentaire (
Id_Commentaire INT AUTO_INCREMENT,
texte TEXT,
PRIMARY KEY(Id_Commentaire)
);

-- Création de la table Joueur
DROP TABLE IF EXISTS Joueur;
CREATE TABLE Joueur (
licence INT,
Nom VARCHAR(50),
Prenom VARCHAR(50),
date_naissance DATE,
taille INT,
poids INT,  
statut VARCHAR(50),
Id_Commentaire INT,
PRIMARY KEY(licence),
FOREIGN KEY(Id_Commentaire) REFERENCES Commentaire(Id_Commentaire) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Création de la table Participer
DROP TABLE IF EXISTS Participer;
CREATE TABLE Participer (
licence INT,
Id_Match INT,
Titu_Remp VARCHAR(50),
poste VARCHAR(50),
Note VARCHAR(50),
PRIMARY KEY(licence, Id_Match),
FOREIGN KEY(licence) REFERENCES Joueur(licence) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY(Id_Match) REFERENCES Match_Basket(Id_Match) ON DELETE CASCADE ON UPDATE CASCADE
);
