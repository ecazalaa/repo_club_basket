<?php

require_once '../config/config.php';
require_once '../modele/JoueurDAO.php';

class ObtenirTousLesJoueurs
{
    private $joueurDAO;

    public function __construct()
    {
        $pdo = connectionBD();
        $this->joueurDAO = new JoueurDAO($pdo);
    }

    public function executer()
    {
        return $this->joueurDAO->selectAll();
    }
}