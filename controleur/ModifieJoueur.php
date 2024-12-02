<?php
require_once '../config/config.php';
require_once '../modele/JoueurDAO.php';
class ModifieJoueur
{
    private $joueurDAO;
    private $joueur;

    public function __construct( Joueur $joueur)
    {
        $pdo = connectionBD();
        $this->joueurDAO = new JoueurDAO($pdo);
        $this->joueur = $joueur;
    }
    public function executer(){
        return $this->joueurDAO->update($this->joueur);
    }

}