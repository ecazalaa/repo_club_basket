<?php


require_once 'session/session.php';
require_once '../config/config.php';
require_once '../modele/JoueurDAO.php';
require_once '../controleur/ObtenirTousLesJoueurs.php';

$joueurs = new ObtenirTousLesJoueurs();
$joueurs = $joueurs->executer();

if (count($joueurs) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Date de Naissance</th><th>Taille (cm)</th><th>Poids (kg)</th><th>Numéro de licence</th></tr>";

    foreach ($joueurs as $joueur) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($joueur['Nom']) . "</td>";
        echo "<td>" . htmlspecialchars($joueur['Prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($joueur['date_naissance']) . "</td>";
        echo "<td>" . htmlspecialchars($joueur['taille']) . "</td>";
        echo "<td>" . htmlspecialchars($joueur['poids']) . "</td>";
        echo "<td>" . htmlspecialchars($joueur['licence']) . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucun joueur trouvé.";
}
?>