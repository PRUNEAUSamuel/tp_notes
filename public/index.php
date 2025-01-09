<?php
session_start();
require "../classes/GestionNote.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body class="text-center flex items-center flex-col">
    <ul class="w-4/5">
        <?php foreach ($etudiantList as $etudiant): ?>
        <li class="grid grid-cols-3">
            <div><?= $etudiant["prenom"]?></div>
            <div><?= $etudiant["nom"]?></div>
            <div><?= $etudiant["matricule"]?></div>
        </li>
        <?php endforeach; ?>
    </ul>
    <a href="../formulaires/ajoutEtudiant.php">Ajouter un étudiant</a>
    <a href="../formulaires/ajoutMatiere.php">Ajouter une matière</a>
    <a href="../formulaires/ajoutNote.php">Ajouter une note</a>
</body>
</html>