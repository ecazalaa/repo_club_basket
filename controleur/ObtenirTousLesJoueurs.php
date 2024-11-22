<?php

class ObtenirTousLesJoueurs{

    private $joueurDAO;

    public function __construct(JoueurDAO $joueurDAO)
    {
        $this->joueurDAO = $joueurDAO;
    }

    public function executer(){
        return $this->joueurDAO->selectAll();
    }
}