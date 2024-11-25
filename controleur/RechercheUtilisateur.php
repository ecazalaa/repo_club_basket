<?php

class RechercheUtilisateur{
    private $utilisateurDAO;
    private $nom;
    private $prenom;
    private $mdp;
    public function __construct(UtilisateurDAO $utilisateurDAO, $nom, $prenom, $mdp)
    {
        $this->utilisateurDAO = $utilisateurDAO;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mdp = $mdp;
    }

    public function executer(){
        return $this->utilisateurDAO->select($this->nom, $this->prenom, $this->mdp);
    }
}