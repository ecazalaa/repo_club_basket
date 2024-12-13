<?php

class ParticiperDAO
{

    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function insert(Participer $participer)
    {
        $query = "INSERT INTO club_basket.participer(licence,Id_Match, Titu_Remp,poste,Note) VALUES(:licence,:Id_Match ,:Titu_Remp, :poste, :Note)";
        $req = $this->pdo->prepare($query);
        return $req->execute([':licence' => $participer->getLicence(),
            ':Id_Match' => $participer->getIdMatch(),
            ':Titu_Remp' => $participer->getTituRemp(),
            ':poste' => $participer->getPoste(),
            ':Note' => $participer->getNote()]);
    }
    public function select($critere, $motcle)
    {
        $query = "SELECT licence,Id_Match,Titu_Remp,poste,Note FROM club_basket.participer WHERE $critere = :motcle";
        $req = $this->pdo->prepare($query);
        $req->execute(['motcle' => $motcle]);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(Participer $participer)
    {
        $query = "UPDATE club_basket.participer SET licence = :licence, Id_Match = :Id_Match, Titu_Remp = :Titu_Remp, poste = :poste, Note = :Note WHERE licence = :licence AND Id_Match = :Id_Match";
        $req = $this->pdo->prepare($query);
        return $req->execute([':licence' => $participer->getLicence(),
            ':Id_Match' => $participer->getIdMatch(),
            ':Titu_Remp' => $participer->getTituRemp(),
            ':poste' => $participer->getPoste(),
            ':Note' => $participer->getNote()]);
    }
    public function delete($licence, $Id_Match)
    {
        $query = "DELETE FROM club_basket.participer WHERE licence = :licence AND Id_Match = :Id_Match";
        $req = $this->pdo->prepare($query);
        return $req->execute(['licence' => $licence, 'Id_Match' => $Id_Match]);
    }
}
