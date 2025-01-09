<?php
session_start();
require "../classes/GestionNote.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["eleve"]) || isset($_POST["matiere"]) || is_numeric($_POST["note"]) || $_POST["bareme"] === 5 || $_POST["bareme"] === 10 || $_POST["bareme"] === 20) {
        $note = new Note($_POST["eleve"], $_POST["matiere"], $_POST["note"], $_POST["bareme"]);
        $gestionNote->ajouterNote($note->getIdEtudiant(), $note->getIdMatiere(), $note->getValeur(), $note->getBareme());
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
        <label for="eleve">Eleve :</label>
        <select name="eleve">
            <?php foreach ($etudiantList as $etudiant): ?>
            <option value=<?=$etudiant["id"]?>><?= $etudiant['prenom'] . " " . $etudiant['nom']?></option>
            <?php endforeach; ?>
        </select>
        <label for="matiere">Matière :</label>
        <select name="matiere">
            <?php foreach ($matiereList as $matiere): ?>
            <option value=<?=$matiere["id"]?>><?=$matiere["nomMatiere"]?></option>
            <?php endforeach; ?>
        </select>
        <label for="note">Note :</label>
        <input type="number" name="note">
        <label for="bareme">Barème :</label>
        <input type="number" name="bareme">
        <input type="submit">
    </form>
</body>
</html>