<?php
session_start();
require "../classes/GestionNote.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        if (isset($_POST["nom"]) || isset($_POST["prenom"]) || isset($_POST["age"]) || isset($_POST["matricule"])) {
            $eleve = new Etudiant($_POST["nom"], $_POST["prenom"], $_POST["age"], $_POST["matricule"]);
            $gestionNote->ajouterEtudiant($eleve->getNom(), $eleve->getPrenom(), $eleve->getAge(), $eleve->getMatricule());
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
    <title>Ajout d'un étudiant</title>
</head>
<body class="text-center flex items-center flex-col">
    <form method="POST" class="w-3/5 m-10">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <div class="my-8">
            <label for="nom" class="font-bold">Nom</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="nom" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <div class="my-8">
            <label for="prenom" class="font-bold">Prénom</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="prenom" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <div class="my-8">
            <label for="matricule" class="font-bold">Classe</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="matricule" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <div class="my-8">
            <label for="age" class="font-bold">Age</label>
            <div class="flex items-center rounded-md pl-3 outline m-2 outline-1 -outline-offset-1 border-black focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                <input type="text" name="age" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base focus:outline focus:outline-0 sm:text-sm/6">
            </div>
        </div>
        <input type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
</body>
</html>