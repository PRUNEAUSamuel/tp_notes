<?php
session_start();
require "../classes/GestionNote.php";
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Accueil</title>
</head>
<body class="text-center flex items-center flex-col">
    <a href="../formulaires/ajoutEtudiant.php" class="m-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter un étudiant</a>
    <a href="../formulaires/ajoutMatiere.php" class="m-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter une matière</a>
    <a href="../formulaires/ajoutNote.php" class="m-2 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Ajouter une note</a>
    <ul class="m-10 w-4/5 border-2 border-gray-950">
        <li class="grid grid-cols-3">
            <div class="p-2 font-bold border border-gray-950">Prénom :</div>
            <div class="p-2 font-bold border border-gray-950">Nom :</div>
            <div class="p-2 font-bold border border-gray-950">Classe :</div>
        </li>
        <?php foreach ($etudiantList as $etudiant): ?>
        <li class="grid grid-cols-3">
            <div class="p-2 border border-gray-950"><?= $etudiant["prenom"]?></div>
            <div class="p-2 border border-gray-950"><?= $etudiant["nom"]?></div>
            <div class="p-2 border border-gray-950"><?= $etudiant["matricule"]?></div>
        </li>
        <?php endforeach; ?>
    </ul>
    <ul class="m-10 w-4/5 border-2 border-gray-950">
        <li class="grid grid-cols-2">
            <div class="p-2 font-bold border border-gray-950">Matière :</div>
            <div class="p-2 font-bold border border-gray-950">Code :</div>
        </li>
        <?php foreach ($matiereList as $matiere): ?>
        <li class="grid grid-cols-2">
            <div class="p-2 border border-gray-950"><?= $matiere["nomMatiere"]?></div>
            <div class="p-2 border border-gray-950"><?= $matiere["codeMatiere"]?></div>
        </li>
        <?php endforeach; ?>
    </ul>
    <ul class="m-10 w-4/5 border-2 border-gray-950">
        <li class="grid grid-cols-4">
            <div class="p-2 font-bold border border-gray-950">Eleve :</div>
            <div class="p-2 font-bold border border-gray-950">Matière :</div>
            <div class="p-2 font-bold border border-gray-950">Note :</div>
            <div class="p-2 font-bold border border-gray-950">Barème :</div>
        </li>
        <?php foreach ($noteList as $note): ?>
        <li class="grid grid-cols-4">
            <div class="p-2 border border-gray-950"><?= $note["prenom"] . " " . $note["nom"]?></div>
            <div class="p-2 border border-gray-950"><?= $note["nomMatiere"]?></div>
            <div class="p-2 border border-gray-950"><?= $note["valeurNote"]?></div>
            <div class="p-2 border border-gray-950"><?= $note["bareme"]?></div>
        </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>