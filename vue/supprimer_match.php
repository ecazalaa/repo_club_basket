<?php


require_once 'session/session.php';
require_once 'session/session_timeout.php';
require_once '../controleur/SupprimerMatch.php';
//récupération des données

$IdMatch = isset($_GET['Id_Match']) ? htmlspecialchars($_GET['Id_Match']) : '';




if (!empty($IdMatch)) {
    // Supprimer le joueur

    $suppression = new SupprimerMatch();
    $suppression->executer($IdMatch);
    echo "Le match a été supprimé avec succès.";
} else {
    echo "Informations de contact invalides.";
}


echo "<br><br><a href='homePage.php'>Retour</a> | ";


?>