<?php
session_start();
require "../classes/GestionNote.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        if (isset($_POST["eleve"]) || isset($_POST["matiere"]) || is_numeric($_POST["note"]) || $_POST["bareme"] === 5 || $_POST["bareme"] === 10 || $_POST["bareme"] === 20) {
            $note = new Note($_POST["eleve"], $_POST["matiere"], $_POST["note"], $_POST["bareme"]);
            $gestionNote->ajouterNote($note->getIdEtudiant(), $note->getIdMatiere(), $note->getValeur(), $note->getBareme());
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/styles.css">
    <title>Ajout d'une note</title>
</head>
<body class="text-center flex items-center flex-col">
    <form method="POST" class="w-3/5 m-10">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <div class="my-8">
            <label for="eleve" class="font-bold">Elève</label>
            <div class="mt-2 grid grid-cols-1">
                <select name="eleve" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pl-3 pr-8 text-base outline outline-1 -outline-offset-1 border-black focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <?php foreach ($etudiantList as $etudiant): ?>
                    <option value=<?=$etudiant["id"]?>><?= $etudiant['prenom'] . " " . $etudiant['nom']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="my-8">
            <label for="matiere" class="font-bold">Matière</label>
            <div class="mt-2 grid grid-cols-1">
                <select name="matiere" class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pl-3 pr-8 text-base outline outline-1 -outline-offset-1 border-black focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <?php foreach ($matiereList as $matiere): ?>
                    <option value=<?=$matiere["id"]?>><?=$matiere["nomMatiere"]?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="my-8">
            <label for="note" class="font-bold">Note</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="note" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <div class="my-8">
            <label for="bareme" class="font-bold">Barème</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="bareme" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <input type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    </form>
</body>
</html>