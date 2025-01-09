<?php

require_once '../config/config.php';
require_once '../modele/JoueurDAO.php';

class ModifierResultatMatch{
    private $matchDAO;
    private $id;
    private $resultat;

    public function __construct($id, $resultat)
    {
        $pdo = connectionBD();
        $this->matchDAO = new MatchDAO($pdo);
        $this->id = $id;
        $this->resultat = $resultat;
    }

    public function executer(){
        return $this->matchDAO->updateResultat($this->id, $this->resultat);
    }
}