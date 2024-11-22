<?php

class CreerJoueur
{
    private $joueurDAO;
    private $joueur;

    // Constructeur : Initialise la connexion PDO et le joueur à ajouter
    public function __construct(JoueurDAO $joueurDAO, Joueur $joueur)
    {
        $this->joueurDAO = $joueurDAO;
        $this->joueur = $joueur;
    }
    public function executer(){
        return $this->joueurDAO->insert($this->joueur);
    }

}


