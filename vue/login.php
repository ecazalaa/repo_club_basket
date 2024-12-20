<?php
session_start();

require_once '../modele/Utilisateur.php';
require_once '../controleur/RechercheUtilisateur.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mdp = sha1($_POST['mdp']);


    $utilisateur = new RechercheUtilisateur( $nom, $prenom, $mdp);
    $utilisateur= $utilisateur->executer();


    if(!$utilisateur){
        $error = 'Nom, prenom ou mot de passe incorrect';
    }
    else{
        $_SESSION['authenticated'] = true;
        header('Location: homePage.php');
        exit;
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Page de connexion</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('mdp');
            var toggleButton = document.getElementById('togglePassword');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleButton.textContent = 'Cacher le mot de passe';
            } else {
                passwordField.type = 'password';
                toggleButton.textContent = 'Afficher le mot de passe';
            }
        }
    </script>
</head>
<body>
    <form method="post" action="login.php">
        <h1>Connexion</h1>
        <?php if (isset($error)) { echo "<p style='color:#9c1616;'>$error</p>"; } ?>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required><br><br>
        <button type="button" class ="bouton-mdp" id="togglePassword" onclick="togglePasswordVisibility()">Afficher le mot de passe</button><br><br>
        <button type="submit">Se connecter</button>
        <br><br>
        <a href="creer_compte_utilisateur.html" class="create-account">Créer mon compte utilisateur</a>
    </form>


</body>
</html>