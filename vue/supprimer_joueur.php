<?php

require_once '../config/config.php';
require_once '../modele/JoueurDAO.php';
require_once '../controleur/SupprimerJoueur.php';
//récupération des données

$licence = isset($_GET['licence']) ? htmlspecialchars($_GET['licence']) : '';




if (!empty($licence)) {
    // Supprimer le joueur
    $pdo = connectionBD();
    $joueurDAO = new JoueurDAO($pdo);
    $suppression = new SupprimerJoueur($joueurDAO);
    $suppression->executer($licence);
    echo "Le contact a été supprimé avec succès.";
} else {
    echo "Informations de contact invalides.";
}


echo "<br><br><a href='homePage.php'>Retour</a> | ";


?>