<?php

class SupprimerJoueur{

    private $joueurDAO;
    private $licence;

    public function __construct(JoueurDAO $joueurDAO)
    {
        $this->joueurDAO = $joueurDAO;
    }

    public function executer($licence){
        return $this->joueurDAO->delete($licence);
    }
}