<?php
require_once 'session/session.php';
require_once 'session/session_timeout.php';
require_once '../controleur/RechercheMatch.php';

// Récupérer le numéro de licence du joueur à modifier
$idMatch = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '';

if (!empty($idMatch)) {
    $chercheMatch = new RechercheMatch('Id_Match', $idMatch);
    $m = $chercheMatch->executer();
    if ($m) {
        $m = $m[0];
        $date = htmlspecialchars($m["M_date"]);
        $lieu = htmlspecialchars($m["lieu"]);
        $nomAdversaire = htmlspecialchars($m['nom_adversaire']);
    } else {
        echo "Match non trouvé.";
        exit;
    }
} else {
    echo "Id de match non fourni.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feuille de match</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            width: 80%;
            justify-content: space-between;
        }

        .block {
            width: 45%;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-height: 200px;
        }

        .component {
            background-color: #e0e0e0;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin: 10px 0;
            cursor: grab;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .droppable {
            min-height: 50px;
        }

        .reset-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<h1>Feuille de match du <?php echo $date; ?> à <?php echo $lieu; ?> contre <?php echo $nomAdversaire; ?></h1>
<div class="container">
    <div class="block" id="block1">
        <h2>Joueurs actifs</h2>
        <?php include 'afficher_joueurs.php';
        echo getDraggablePlayers();?>
    </div>
    <div class="block" id="block2">
        <h2>Feuille de match</h2>
        <table>
            <tr>
                <th>Poste</th>
                <th>Joueur</th>
            </tr>
            <tr>
                <td>Gardien</td>
                <td class="droppable" id="gardien"></td>
            </tr>
            <tr>
                <td>Défenseur</td>
                <td class="droppable" id="defenseur"></td>
            </tr>
            <tr>
                <td>Milieu</td>
                <td class="droppable" id="milieu"></td>
            </tr>
            <tr>
                <td>Attaquant</td>
                <td class="droppable" id="attaquant"></td>
            </tr>
        </table>
    </div>
</div>
<button class="reset-button" id="resetButton">Réinitialiser</button>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const components = document.querySelectorAll('.component');
        const droppables = document.querySelectorAll('.droppable');
        const block1 = document.getElementById('block1');
        const resetButton = document.getElementById('resetButton');

        components.forEach(component => {
            component.addEventListener('dragstart', dragStart);
        });

        droppables.forEach(droppable => {
            droppable.addEventListener('dragover', dragOver);
            droppable.addEventListener('drop', drop);
        });

        function dragStart(e) {
            e.dataTransfer.setData('text/plain', e.target.id);
        }

        function dragOver(e) {
            e.preventDefault();
        }

        function drop(e) {
            e.preventDefault();
            const id = e.dataTransfer.getData('text');
            const component = document.getElementById(id);
            if (e.target.classList.contains('droppable')) {
                e.target.innerHTML = '';
                e.target.appendChild(component);
            }
        }

        resetButton.addEventListener('click', () => {
            droppables.forEach(droppable => {
                if (droppable.firstChild) {
                    block1.appendChild(droppable.firstChild);
                }
            });
        });
    });
</script>
</body>
</html>