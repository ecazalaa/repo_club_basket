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

        nav {
            display: flex;
            justify-content: center;
            background-color: #444;
            margin-top: 50px; /* Adjust based on header height */
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
            padding: 20px;
            text-align: center;
            flex: 1;
            margin-top: 120px; /* Adjust based on header and nav height */
        }
        .liste_joueurs{
            text-align: left;
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
            width: 50%; /* Set table width to half the page */
            border-collapse: collapse;
            margin: 20px 0; /* Remove auto centering */
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            float: left; /* Align table to the left */
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
    </style>
</head>
<body>

<header>
    <h1>Bienvenue au Club de Basket de Labège</h1>
</header>

<nav>
    <a href="/club_basket/repo_club_basket/vue/saisie_joueur.html">Ajouter un Joueur</a>
    <a href="saisie_recherche_joueur.php">Rechercher un Joueur</a>
    <a href="contact.html">Contact</a>
</nav>

<div class="container">
    <h2>Gestion de votre club de basket</h2>
    <p>Utilisez les liens ci-dessus pour ajouter des joueurs, rechercher des joueurs, ou nous contacter.</p>

    <div class="liste_joueurs" id="joueurs">
        <h2>Liste des joueurs</h2>
        <?php include 'afficher_joueurs.php'; ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 Club de Basket Labège. Tous droits réservés.</p>
</footer>

</body>
</html>