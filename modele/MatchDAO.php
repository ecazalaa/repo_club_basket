<?php

class MatchDAO{
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }
    public function insert(MatchBasket $match){
        $query = "INSERT INTO club_basket.match_basket(M_date,nom_adversaire, lieu) VALUES(:m_date,:adversaire , :lieu)";
        $req = $this->pdo->prepare($query);
        return $req->execute([':m_date' => $match->getDate(),
            ':adversaire' => $match->getAdversaire(),
            ':lieu' => $match->getLieu()]);
    }

    public function select($critere, $motcle){
        $query = "SELECT * FROM club_basket.match_basket WHERE $critere = :motcle";
        $req = $this->pdo->prepare($query);
        $req->execute(['motcle' => $motcle]);
        return $req->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update(MatchBasket $match){
        $query = "UPDATE club_basket.match_basket SET M_date = :m_date, nom_adversaire = :adversaire, lieu = :lieu, resultat=:resultat WHERE Id_Match = :Id_Match";
        $req = $this->pdo->prepare($query);
        return $req->execute([':m_date' => $match->getDate(),
            ':adversaire' => $match->getAdversaire(),
            ':lieu' => $match->getLieu(),
            ':Id_Match' => $match->getIdMatch(),
            ':resultat' => $match->getResultat()
        ]);
    }
    public function updateResultat(MatchBasket $match, $resultat){
        $query = "UPDATE club_basket.match_basket SET resultat = :resultat WHERE Id_Match = :Id_Match";
        $req = $this->pdo->prepare($query);
        return $req->execute([':resultat' => $resultat,
            ':Id_Match' => $match->getIdMatch()]);
    }
    public function delete($IdMatch){
        $query = "DELETE FROM club_basket.match_basket WHERE Id_Match = :Id_match";;
        $req = $this->pdo->prepare($query);
        return $req->execute(['Id_match' => $IdMatch]);
    }
    public function selectAll(){
        $query = "SELECT * FROM club_basket.match_basket";
        $req = $this->pdo->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
    /*
    public function selectAll() {
        $query = "SELECT * FROM club_basket.match_basket";
        $req = $this->pdo->prepare($query);
        $req->execute();
        $results=$req->fetchAll(PDO::FETCH_ASSOC);
        $matches = [];

        foreach ($results as $row) {
            $matches[] = new Match($row);
        }

        return $matches;
    }
    */

}