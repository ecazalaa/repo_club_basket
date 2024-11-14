<?php

$host = "localhost";
$dbname = "club_basket";
$username = "root";
$password = "";


///Connexion au serveur MySQL
try
{
    $linkpdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}




// Récupérer les données du formulaire
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$date_naissance = htmlspecialchars($_POST['dateNaissance']);
$taille = htmlspecialchars($_POST['taille']);
$poids = htmlspecialchars($_POST['poids']);
$licence = htmlspecialchars($_POST['numLicence']);





// Vérifier si le joueur existe déjà dans la base de données

//préparation
// si le numéro de licence est deja attribué, on ne peut pas ajouter le joueur, en revanche un joueur peut renouveler sa licence donc il peut avoir le meme numero de licence nom prenom...
$query = $linkpdo->prepare("SELECT * FROM club_basket.joueur WHERE licence = :licence");
//execution
$query->execute(['licence' => $licence]);
// fetch retourne false si vide sinon elle retournera la premiere ligne de la requete exemple : ['nom' => 'Dupont', 'prenom' => 'Jean', ...]
$contact = $query->fetch();



if($contact)
{
    echo "Le contact existe déjà dans la base de données.";
}
else{
    ///Préparation de la requête
    $req = $linkpdo->prepare('INSERT INTO club_basket.joueur(licence,Nom, Prenom,date_naissance,taille,poids) VALUES(:licence,:nom , :prenom, :date_naissance, :taille, :poids)');
    ///Exécution de la requête
    $req->execute(array('nom' => $nom,
        'prenom' => $prenom,
        'licence' => $licence,
        'date_naissance' => $date_naissance,
        'taille' => $taille,
        'poids' => $poids));

    echo "Le contact a été ajouté avec succès.";
}

?>
<br><br>
<a href="saisie_joueur.html" class="button">retour</a>