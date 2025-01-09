<?php


class Personne {
    private $nom;
    private $prenom;
    private $age;


    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        if (empty($nom)) {
            throw new Exception("Le nom ne peut pas être vide.");
        }
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function setPrenom($prenom)
    {
        if (empty($prenom)) {
            throw new Exception("Le prénom ne peut pas être vide.");
        }
        $this->prenom = $prenom;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        if ($age < 0 || $age > 110) {
            throw new Exception("L'age doit être logique");
        }
        $this->age = $age;
    }
}