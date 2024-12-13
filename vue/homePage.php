<?php
require_once 'session/session.php';
require_once 'session/session_timeout.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Club de Basket Labège - Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #1a8f3b;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        header img {
            position: absolute;
            left: 10px;
            height: 60px;
        }

        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            margin-top: 49px; /* Adjust based on header height */
            width: 100%;
            position: fixed;
            top: 50px; /* Adjust based on header height */
            z-index: 999;
        }

        nav a {
            color: #379153;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        nav a:hover {
            background-color: #555;
        }

        .container {
            display: flex;
            flex-direction: column;
            padding: 20px;
            text-align: center;
            margin-top: 120px; /* Adjust based on header and nav height */
        }
        .liste {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .liste_joueurs, .matchs_a_venir {
            flex: 1; /* Ensure both boxes take up equal space */
            /* Ensure both boxes take up to 48% of the container width */
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-sizing: border-box;
            margin: 1%; /* Add margin between the boxes */
        }
        .liste_matchs_passe{
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-sizing: border-box;
            margin: 1%; /* Add margin between the boxes */
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: auto; /* Push footer to the bottom */
            width: 100%;
        }

        table {
            width: 100%; /* Set table width to 100% of its container */
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f7f7f7;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
        .logout-button {
            background-color: #379153;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 20px 0;
            cursor: pointer;
            border-radius: 5px;
        }

        .logout-button:hover {
            background-color: #296e3f;
        }
        .button-modif {
            background-color: #0b8810; /* Green */
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 13px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
        .button-modif:hover {
            background-color: #0a6e0a;
        }
    </style>
</head>
<body>

<header>
    <img src="public/logoClub.png" alt="Club de Basket Labège Logo">
    <h1>Bienvenue au Club de Basket de Labège</h1>
</header>

<nav>
    <a href="saisie_joueur.php">Ajouter un Joueur</a>
    <a href="saisie_recherche_joueur.php">Rechercher un Joueur</a>
    <a href="saisie_match.php">Ajouter un Match</a>
    <a href="saisie_recherche_match.php">Rechercher un Match</a>
    <a href="contact.html">Contact</a>
</nav>

<div class="container">
    <h2>Gestion de votre club de basket</h2>
    <p>Utilisez les liens ci-dessus pour ajouter des joueurs, rechercher des joueurs, ou nous contacter.</p>
<div class="liste">
    <div class="liste_joueurs" id="liste_joueurs">
        <h2>Liste des joueurs</h2>
        <?php include 'afficher_joueurs.php';
        echo getAllPlayers()?>
    </div>
    <div class="matchs_a_venir" id="matchs_a_venir">
        <h2>Matchs à venir</h2>
        <?php include 'afficher_matchs_a_venir.php'; ?>
    </div>
</div>
    <div class="liste_matchs_passe" id="liste_matchs_passe">
        <h2>Liste des matchs passés</h2>
        <?php include 'afficher_matchs_passe.php'; ?>
    </div>
</div>


<footer>
    <p>&copy; 2024 Club de Basket Labège. Tous droits réservés.</p>
    <a href="logout.php" class="logout-button">Se déconnecter</a>
</footer>

</body>
</html>