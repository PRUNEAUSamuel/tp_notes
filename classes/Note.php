<?php


class Note {
    private int $idEtudiant;
    private int $idMatiere;
    private float $valeur;
    private int $bareme;

    public function __construct($idEtudiant, $idMatiere, $valeur, $bareme)
    {
        $this->setIdEtudiant($idEtudiant);
        $this->setIdMatiere($idMatiere);
        $this->setValeur($valeur);
        $this->setBareme($bareme);
    }

    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }

    public function setIdEtudiant($idEtudiant)
    {
        if (empty($idEtudiant)) {
            throw new Exception("L'id étudiant ne peut pas être vide.");
        }
        $this->idEtudiant = $idEtudiant;
    }

    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    public function setIdMatiere($idMatiere)
    {
        if (empty($idMatiere)) {
            throw new Exception("La matière ne peut pas être vide.");
        }
        $this->idMatiere = $idMatiere;
    }

    public function getValeur()
    {
        return $this->valeur;
    }

    public function setValeur($valeur)
    {
        if ($valeur < 0 || $valeur > 20) {
            throw new Exception("La note doit être comprise entre 0 et 20.");
        }
        $this->valeur = $valeur;
    }

    public function getBareme()
    {
        return $this->bareme;
    }

    public function setBareme($bareme)
    {
        if (empty($bareme)) {
            throw new Exception("La note ne peut qu'être sur 5, 10 ou 20.");
        }
        $this->bareme = $bareme;
    }
}