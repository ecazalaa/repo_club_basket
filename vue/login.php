<?php
session_start();

// Define predefined username and password
$predefinedUsername = 'admin';
$predefinedPassword = 'admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $predefinedUsername && $password === $predefinedPassword) {
        $_SESSION['authenticated'] = true;
        header('Location: homePage.php');
        exit;
    } else {
        $error = 'Login ou mot de passe incorrect';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Page de connexion</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <form method="post" action="login.php">
        <h1>Login</h1>
        <?php if (isset($error)) { echo "<p style='color:#9c1616;'>$error</p>"; } ?>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>