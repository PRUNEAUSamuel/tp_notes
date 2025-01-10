<?php
session_start();
require "../classes/GestionNote.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        if (isset($_POST["nom"]) || isset($_POST["code"])) {
            $matiere = new Matiere($_POST["nom"], $_POST["code"]);
            $gestionNote->ajouterMatiere($matiere->getNomMatiere(), $matiere->getCodeMatiere());
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
    <title>Ajout d'une matière</title>
</head>
<body class="text-center flex items-center flex-col">
    <form method="POST" class="w-3/5 m-10">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <div class="my-8">
            <label for="nom" class="font-bold">Matière</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="nom" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <div class="my-8">
            <label for="code" class="font-bold">Code</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="code" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <input type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
    </form>
</body>
</html>