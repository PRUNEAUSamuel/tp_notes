<?php
require "Etudiant.php";
require "Matiere.php";
require "Note.php";
require "../includes/database.php";

class GestionNote {
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function ajouterEtudiant($nom, $prenom, $age, $matricule) {
        $pushFonction = $this->pdo->prepare("INSERT INTO etudiants (nom, prenom, matricule, age) VALUES (:nom, :prenom, :matricule, :age)");
        $pushFonction->execute([
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":matricule" => $matricule,
            ":age" => $age]);
    }

    public function ajouterMatiere($nomMatiere, $codeMatiere){
        $pushFonction = $this->pdo->prepare("INSERT INTO matieres (nomMatiere, codeMatiere) VALUES (:nomMatiere, :codeMatiere)");
        $pushFonction->execute([
            ":nomMatiere" => $nomMatiere,
            ":codeMatiere" => $codeMatiere]);
    }

    public function getEtudiant() {
        $getFonction = $this->pdo->query("SELECT * FROM etudiants");
        return $getFonction->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMatiere() {
        $getFonction = $this->pdo->query("SELECT * FROM matieres");
        return $getFonction->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNote() {
        $getFonction = $this->pdo->query("SELECT prenom, nom, nomMatiere, valeurNote, bareme FROM notes INNER JOIN etudiants ON notes.idEtudiant = etudiants.id INNER JOIN matieres ON notes.idMatiere = matieres.id");
        return $getFonction->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterNote($idEtudiant, $idMatiere, $valeur, $bareme){
        $pushFonction = $this->pdo->prepare("INSERT INTO notes (idEtudiant, idMatiere, valeurNote, bareme) VALUES (:idEtudiant, :idMatiere, :valeurNote, :bareme)");
        $pushFonction->execute([
            ":idEtudiant" => $idEtudiant,
            ":idMatiere" => $idMatiere,
            ":valeurNote" => $valeur,
            ":bareme" => $bareme]);
    }

    public function calculerMoyenneEtudiant($idEtudiant){

    }
}

$gestionNote = new GestionNote();
$etudiantList = $gestionNote->getEtudiant();
$matiereList = $gestionNote->getMatiere();
$noteList = $gestionNote->getNote();