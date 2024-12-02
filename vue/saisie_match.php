<?php

require_once 'session/session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Saisie de match</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }

        .top-left {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 90%;
            max-width: 400px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            margin-bottom: 5px;
            color: #555;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: gray;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 48%;
            margin: 5px 1%;
        }

        @media (max-width: 600px) {
            form {
                width: 100%;
                padding: 10px;
            }

            button {
                width: 100%;
                margin: 10px 0;
            }
        }
    </style>
</head>
<body>

<div class="top-left">
    <a href="homePage.php" class="button">Retour</a>
</div>

<form method="post" action="ajout_match.php">
    <h1>Saisie d'un match</h1>

    <label for="m_date">Date de match :</label>
    <input type="datetime-local" id="m_date" name="m_date" required><br><br>

    <label for="adversaires">Nom des adversaires :</label>
    <input type="text" id="adversaires" name="adversaires" required><br><br>

    <label for="lieu">Lieu du match :</label>
    <select id="lieu" name="lieu" required>
        <option value="domicile">Domicile</option>
        <option value="exterieur">Extérieur</option>
    </select><br><br>

    <button type="reset">Vider les champs</button>
    <button type="submit">Ajouter le match</button>
</form>

</body>
</html>