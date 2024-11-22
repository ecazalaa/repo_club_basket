<?php

class JoueurDAO{
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function insert(Joueur $joueur){
        $query = "INSERT INTO club_basket.joueur(licence,Nom, Prenom,date_naissance,taille,poids) VALUES(:licence,:nom , :prenom, :date_naissance, :taille, :poids)";
        $req = $this->pdo->prepare($query);
        return $req->execute([':nom' => $joueur->getNom(),
            ':prenom' => $joueur->getPrenom(),
            ':date_naissance' => $joueur->getDateNaissance(),
            ':taille' => $joueur->getTaille(),
            ':poids' => $joueur->getPoids(),
            ':licence' => $joueur->getLicence()]);
    }

    public function select($critere, $motcle){
        $query = "SELECT nom, prenom, licence FROM club_basket.joueur WHERE $critere = :motcle";
        $req = $this->pdo->prepare($query);
        $req->execute(['motcle' => $motcle]);
        return $req->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update(Joueur $joueur){
        $query = "UPDATE club_basket.joueur SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, taille = :taille, poids = :poids WHERE licence = :licence";
        $req = $this->pdo->prepare($query);
        return $req->execute([':nom' => $joueur->getNom(),
            ':prenom' => $joueur->getPrenom(),
            ':date_naissance' => $joueur->getDateNaissance(),
            ':taille' => $joueur->getTaille(),
            ':poids' => $joueur->getPoids(),
            ':licence' => $joueur->getLicence()]);
    }
    public function delete($licence){
        $query = "DELETE FROM club_basket.joueur WHERE licence = :licence";
        $req = $this->pdo->prepare($query);
        return $req->execute(['licence' => $licence]);
    }
    public function selectAll(){
        $query = "SELECT * FROM club_basket.joueur";
        $req = $this->pdo->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

}
