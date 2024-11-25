<?php

class CreerUtilisateur{

    private $utilisateurDAO;
    private $utilisateur;

    public function __construct(UtilisateurDAO $utilisateurDAO, Utilisateur $utilisateur){
        $this->utilisateurDAO = $utilisateurDAO;
        $this->utilisateur = $utilisateur;
    }
    public function executer(){
        return $this->utilisateurDAO->insert($this->utilisateur);
    }
}