<?php
class RechercheJoueur{
    private $joueurDAO;
    private $critere;
    private $motcle;
    public function __construct(JoueurDAO $joueurDAO, $critere, $motcle)
    {
        $this->joueurDAO = $joueurDAO;
        $this->critere = $critere;
        $this->motcle = $motcle;
    }
    public function executer(){
        return $this->joueurDAO->select($this->critere, $this->motcle);
    }


}