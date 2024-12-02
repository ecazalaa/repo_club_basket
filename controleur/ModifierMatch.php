<?php

require_once '../config/config.php';
require_once '../modele/MatchDAO.php';

class ModifierMatch{
    private $matchDAO;
    private $match;

    public function __construct(MatchBasket $match)
    {
        $pdo = connectionBD();
        $this->matchDAO = new MatchDAO($pdo);
        $this->match = $match;
    }

    public function executer(){
        return $this->matchDAO->update($this->match);
    }
}