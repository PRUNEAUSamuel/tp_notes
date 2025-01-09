<?php
session_start();
require "../classes/GestionNote.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nom"]) || isset($_POST["prenom"]) || isset($_POST["age"]) || isset($_POST["matricule"])) {
        $eleve = new Etudiant($_POST["nom"], $_POST["prenom"], $_POST["age"], $_POST["matricule"]);
        $gestionNote->ajouterEtudiant($eleve->getNom(), $eleve->getPrenom(), $eleve->getAge(), $eleve->getMatricule());
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" require>
        <label for="matricule">Matricule :</label>
        <input type="text" name="matricule" require>
        <label for="age">Age :</label>
        <input type="number" name="age" require>
        <input type="submit">
    </form>
</body>
</html>