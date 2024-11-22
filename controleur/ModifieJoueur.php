<?php

class ModifieJoueur
{
    private $joueurDAO;
    private $joueur;

    public function __construct(JoueurDAO $joueurDAO, Joueur $joueur)
    {
        $this->joueurDAO = $joueurDAO;
        $this->joueur = $joueur;
    }
    public function executer(){
        return $this->joueurDAO->update($this->joueur);
    }

}