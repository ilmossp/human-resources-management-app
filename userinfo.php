<?php
session_start();
require 'connection.php';
$sqlQuery = "SELECT * FROM employes";

$sqlResult = mysqli_query($cont, $sqlQuery);

if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION["username"])) : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>user info</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <style>
    ::-webkit-scrollbar-track{
      background-color: transparent;

    }
    ::-webkit-scrollbar{
      width: 5px;
    }
  </style>
    </head>

    <body class="h-screen">

        <div style=" margin:10px;width:calc(100vw - 20px);" class="fixed bg-teal-400 p-5 top-0 flex justify-between font-bold  rounded-md text-white">
            <p>Liste d'employés</p>
            <div class="flex items-center gap-2">
                <p>Welcome <?php echo $_SESSION["username"] ?></p>
                <a class="hover:scale-105 transition-all" href="http://localhost/me/decon.php"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" />
                    </svg></a>
            </div>
        </div>
        <table class="bg-slate-100 border border-gray-300 mx-auto mt-24 table-auto border-separate rounded-md">
            <thead>
                <tr>
                    <th class="px-5 py-3 text-left" scope="col">Num</th>
                    <th class="px-5 py-3 text-left" scope="col">Nom</th>
                    <th class="px-5 py-3 text-left" scope="col">Prenom</th>
                    <th class="px-5 py-3 text-left" scope="col">Sexe</th>
                    <th class="px-5 py-3 text-left" scope="col">Adresse</th>
                    <th class="px-5 py-3 text-left" scope="col">Date de naissance</th>
                    <th class="px-5 py-3 text-left" scope="col">Service</th>
                </tr>
            </thead>
            <tbody>

                <?php
                function addRow($num, $fname, $lname, $sexe, $adresse, $dateNaissance, $numServ)
                {
                    echo '<tr>
        <th scope="row">' . $num . '</th> <!-- id -->
        <td class="px-5 py-3">' . $fname . '</td>
        <td class="px-5 py-3">' . $lname . '</td>
        <td class="px-5 py-3">' . $sexe . '</td>
        <td class="px-5 py-3">' . $adresse . '</td>
        <td class="px-5 py-3">' . $dateNaissance . '</td>
        <td class="px-5 py-3 text-center">' . $numServ . '</td>
      </tr>';
                }

                $sqlQuery = "SELECT * FROM employes";

                $sqlResult = mysqli_query($cont, $sqlQuery);

                while ($row = mysqli_fetch_row($sqlResult)) {
                    addRow($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
                }

                ?>
            </tbody>

        </table>




    </body>

    </html>

    </html>
<?php else :
    header('Location: http://localhost/me/index.html');
endif;
?>