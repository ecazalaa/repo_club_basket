
<?php


require_once 'session/session.php';
require_once '../modele/MatchBasket.php';
require_once '../controleur/RechercheMatch.php';

// Récupérer le numéro de licence du joueur à modifier
$IdMatch = isset($_GET['Id_Match']) ? htmlspecialchars($_GET['Id_Match']) : '';



if (!empty($IdMatch)) {
    $chercheM = new RechercheMatch( 'Id_Match', $IdMatch);
    $m=$chercheM->executer();
    if ($m) {
        $m = $m[0];
        $Date = htmlspecialchars($m["M_date"]);
        $nomAdversiare = htmlspecialchars($m["nom_adversaire"]);
        $lieu = htmlspecialchars($m['lieu']);
        $resultat = htmlspecialchars($m['resultat']);
    } else {
        echo "Match non trouvé.";
        exit;
    }
} else {
    echo "Id du match non fourni.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Modifier un match</title>
    <link rel="stylesheet" type="text/css" href="style/style.css"> <!-- Assurez-vous que le chemin est correct -->
    <style>
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .top-left {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
</head>
<body>
<div class="top-left">
    <a href="homePage.php" class="button">Retour</a>
</div>
<form method="post" action="modifier_match.php?Id_Match=<?php echo urlencode($IdMatch); ?>">
    <h1>Modification de Match</h1>

    <label for="M_date">Date du match : </label>
    <input type="datetime-local" id="M_date" name="M_date" value="<?php echo $Date; ?>" required><br><br>

    <label for="nom_adversaire"> Nom des adversaires :</label>
    <input type="text" id="nom_adversaire" name="nom_adversaire" value="<?php echo $nomAdversiare; ?>" required><br><br>

    <label for="lieu">Lieu du match :</label>
    <select id="lieu" name="lieu" required>
        <option value="domicile" <?php echo ($lieu == 'domicile') ? 'selected' : ''; ?>>Domicile</option>
        <option value="exterieur" <?php echo ($lieu == 'exterieur') ? 'selected' : ''; ?>>Extérieur</option>
    </select><br><br>


    <label for="resultat">Résultat du match</label>
    <input type="text" id="resultat" name="resultat" value="<?php echo $resultat; ?>"><br><br>

    <button type="submit">Valider les modifications</button>
</form>


<?php
require_once '../controleur/ModifierMatch.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nvDate = isset($_POST['M_date']) ? htmlspecialchars($_POST['M_date']) : '';
    $nvAdversaire = isset($_POST['nom_adversaire']) ? htmlspecialchars($_POST['nom_adversaire']) : '';
    $nvLieu = isset($_POST['lieu']) ? htmlspecialchars($_POST['lieu']) : '';
    $nvResultat = isset($_POST['resultat']) ? htmlspecialchars($_POST['resultat']) : '';

    if (!empty($nvDate) && !empty($nvAdversaire) && !empty($nvLieu)) {
        $matchModif = new MatchBasket($nvDate, $nvAdversaire, $nvLieu, $nvResultat, $IdMatch);
        $modifM = new ModifierMatch($matchModif);
        $req = $modifM->executer();

        if ($req) {
            echo "Le match a été modifié avec succès.";
            header('Location: homePage.php');
        } else {
            echo "Aucune modification effectuée.";
        }
    }
}
?>

</body>
</html>