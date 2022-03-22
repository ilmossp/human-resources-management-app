
<?php
session_start();
if( session_status()==PHP_SESSION_ACTIVE && $_SESSION["rights"]=="AD"):
      


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <link rel="stylesheet" href="/me/style/form-style.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body class="flex justify-center items-center h-screen">

    <form method="GET" autocomplete="off">
        <table class="p-3 bg-slate-100 border border-gray-300 rounded-md shadow-lg border-separate">
            <tr>
                <td class="p-3"><label for="nom" class="form-label">Nom </label></td class="p-3">
                <td class="p-3"><input type="text" name="nom" class="rounded-full"></td class="p-3">
            </tr>
            <tr>
                <td class="p-3">
                    <label for="prenom" class="form-label">Prenom </label>
                </td class="p-3">
                <td class="p-3">
                    <input type="text" name="prenom" class="rounded-full">

                </td class="p-3">
            </tr>
            <tr>
                <td class="p-3">
                    Sexe
                </td class="">
                <td class="">
                    <label class="p-3"><input class="" type="radio" name="sexe" value="M" checked> M</label>
                    <label class="p-3"><input class="" type="radio" name="sexe" value="F"> F</label>

                </td class="">

            </tr>

            <tr>
                <td class="p-3">
                    <label for="adresse" class="form-label">Adresse </label>

                </td class="p-3">
                <td class="p-3">
                    <input type="text" name="adresse" class="rounded-full" id="">

                </td class="p-3">
            </tr>


            <tr>
                <td class="p-3">
                    <label for="dateNaissance" class="">Date de Naissance </label>

                </td class="p-3">
                <td class="p-3">
                    <input type="date" name="dateNaissance" class="rounded-full w-full" id="">

                </td class="p-3">
            </tr>


            <tr>
                <td class="p-3">
                    <label for="numServ" class="form-label">Service </label>

                </td class="p-3">
                <td class="p-3">
                    <input type="text" name="numServ" class="rounded-full   ">

                </td class="p-3">
            </tr>




            <tr>
                <td class="p-3">
                    <button type="submit" class="bg-indigo-400 px-5 py-2 rounded-full text-white hover:bg-indigo-600">Ajouter</button>
                    <button type="reset" class="bg-gray-400 px-5 py-2 rounded-full text-white hover:bg-gray-600">Annuler</button>
                </td class="p-3">

            </tr>
        </table>
    </form>



    <?php

    $sett = isset($_GET["nom"]) && isset($_GET["prenom"]) && isset($_GET["sexe"]) && isset($_GET["adresse"]) && isset($_GET["dateNaissance"]) && isset($_GET["numServ"]);
    if ($sett) {


        $nom = $_GET["nom"];
        $prenom = $_GET["prenom"];
        $sexe = $_GET["sexe"];
        $adresse = $_GET["adresse"];
        $dateNaissance = $_GET["dateNaissance"];
        $numServ = $_GET["numServ"];
        header("Location: http://localhost/me/valAddEMPL.php?nom=$nom&prenom=$prenom&sexe=$sexe&adresse=$adresse&dateNaissance=$dateNaissance&numServ=$numServ");
    }


    ?>







</body>

</html>
<?php else: 

header("location: http://localhost/me/");
endif;

?>