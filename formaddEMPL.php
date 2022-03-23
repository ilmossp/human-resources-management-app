<?php
session_start();
if (session_status() == PHP_SESSION_ACTIVE && $_SESSION["rights"] == "AD") :
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

        <a href="http://localhost/me/allEMPLS.php" class="fixed bg-teal-400 text-white px-3 py-2 rounded-full left-5 top-5 flex justify-center gap-2 items-center hover:bg-teal-500 transition-all">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z" />
            </svg>
            <p>
                retour vers la liste
            </p>
        </a>
        <form method="GET" autocomplete="off" action="/me/valAddEMPL.php">
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
                        <button type="submit" class="bg-teal-400 px-5 py-2 rounded-full text-white hover:bg-teal-500">Ajouter</button>
                        <button type="reset" class="bg-gray-400 px-5 py-2 rounded-full text-white hover:bg-gray-600">Effacer</button>
                    </td class="p-3">

                </tr>
            </table>
        </form>
        <div class="fixed -bottom-20 w-screen justify-center transition-all hidden" id="add-success">
            <div class="flex items-center gap-2 text-white bg-lime-400  px-3 py-2 rounded-full">
                <svg style="width:14px;height:14px" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                </svg>
                <p id="warning">employee added successfully</p>
            </div>
        </div> <?php
                if (isset($_GET["done"])) {
                    echo '<script>
        const url= new URL(window.location);
        const params=new URLSearchParams(url.search);
        if (params.has("done")){
            const x=document.getElementById("add-success");
            x.style.display= "flex"
            x.style.bottom = "20px";
            setTimeout(() => {x.style.bottom = "-80px";},3000);
        }
    </script>';
                }
                ?>
    </body>

    </html>
<?php else :

    header("location: http://localhost/me/");
endif;

?>