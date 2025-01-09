<?php
session_start();
require "../classes/GestionNote.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nom"]) || isset($_POST["code"])) {
        $matiere = new Matiere($_POST["nom"], $_POST["code"]);
        $gestionNote->ajouterMatiere($matiere->getNomMatiere(), $matiere->getCodeMatiere());
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
        <label for="nom">Nom de la matière :</label>
        <input type="text" name="nom">
        <label for="code">Code de la Matière :</label>
        <input type="text" name="code">
        <input type="submit">
    </form>
</body>
</html>