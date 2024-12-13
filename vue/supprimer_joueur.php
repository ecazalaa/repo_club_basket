<?php


require_once 'session/session.php';
require_once 'session/session_timeout.php';
require_once '../controleur/SupprimerJoueur.php';
//récupération des données

$licence = isset($_GET['licence']) ? htmlspecialchars($_GET['licence']) : '';




if (!empty($licence)) {
    // Supprimer le joueur

    $suppression = new SupprimerJoueur;
    $suppression->executer($licence);
    echo "Le contact a été supprimé avec succès.";
} else {
    echo "Informations de contact invalides.";
}


echo "<br><br><a href='homePage.php'>Retour</a> | ";


?>