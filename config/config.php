<?php


function connectionBD(){
    $host = "localhost";
    $dbname = "club_basket";
    $username = "root";
    $password = "admin";


///Connexion au serveur MySQL
    try {
        $linkpdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (Exception $e) {
        die('Erreur  de connexion à la bd: ' . $e->getMessage());
    }
    return $linkpdo;

}

?>
