<?php
require "Personne.php";

class Etudiant extends Personne {
    private $matricule;

    public function __construct($nom, $prenom, $age, $matricule)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAge($age);
        $this->setMatricule($matricule);
    }

    public function getMatricule() 
    {
        return $this->matricule;
    }

    public function setMatricule($matricule)
    {
        if (empty($matricule)){
            throw new Exception("Le matricule ne peut pas être vide.");
        }
        $this->matricule = $matricule;
    }
}