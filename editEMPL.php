
<?php
session_start();
if( session_status()==PHP_SESSION_ACTIVE && $_SESSION["rights"]=="AD"):
      


?>


<?php
require 'connection.php';
$num = $_GET["num"];
$Query = "SELECT nom,prenom,sexe,adresse,dateNaissance,numServ FROM employes WHERE code='$num'";
$result = mysqli_query($cont, $Query);
$row = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editpage</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>

<body class="flex justify-center h-screen items-center">
    <form method="POST" action="/me/updateEMPL.php" autocomplete="off">
        <input type="hidden" name="num" value=<?php echo "$num"?>>    
    <table class="p-3 bg-slate-100 border border-gray-300 rounded-md shadow-lg border-separate">
            <tr>
                <td class="p-3"><label for="nom" class="form-label">Nom </label></td class="p-3">
                <td class="p-3"><input type="text" name="nom" class="rounded-full" value="<?php echo "$row[0]" ?>"></td class="p-3">
            </tr>
            <tr>
                <td class="p-3">
                    <label for="prenom" class="form-label">Prenom </label>
                </td class="p-3">
                <td class="p-3">
                    <input type="text" name="prenom" class="rounded-full" value="<?php echo "$row[1]" ?>">
                </td class="p-3">
            </tr>
            <tr>
                <td class="p-3">
                    Sexe
                </td class="p-3">
                <td class="p-3">
                    <label class="radio-inline"><input type="radio" name="sexe" value="M" checked> M</label>
                    <label class="radio-inline"><input type="radio" name="sexe" value="F"> F</label>
                </td class="p-3">
            </tr>

            <tr>
                <td class="p-3">
                    <label for="adresse" class="form-label">Adresse :</label>

                </td class="p-3">
                <td class="p-3">
                    <input type="text" name="adresse" class="rounded-full" value="<?php echo "$row[3]" ?>">

                </td class="p-3">
            </tr>


            <tr>
                <td class="p-3">
                    <label for="dateNaissance" class="form-label">Date de Naissance </label>

                </td class="p-3">
                <td class="p-3">
                    <input type="date" name="dateNaissance" class="rounded-full w-full" value="<?php echo"$row[4]"?>">

                </td class="p-3">
            </tr>


            <tr>
                <td class="p-3">
                    <label for="numServ" class="form-label">Service </label>

                </td class="p-3">
                <td class="p-3">
                    <input type="text" name="numServ" class="rounded-full" value="<?php echo "$row[5]" ?>">

                </td class="p-3">
            </tr>




            <tr>
                <td class="p-3">
                    <button type="submit" class="bg-indigo-400 px-5 py-2 rounded-full">Modifier</button>
                    <button type="reset" class="bg-gray-200 px-5 py-2 rounded-full">Annuler</button>
                </td class="p-3">

            </tr>
        </table>
    </form>

</body>

</html>
<?php else: 

header("location: http://localhost/me/");
endif;

?>