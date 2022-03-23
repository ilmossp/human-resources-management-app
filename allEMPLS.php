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
  <title>allEMPL</title>
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

<body class="h-screen" >

  <div style=" margin:10px;width:calc(100vw - 20px);" class="fixed bg-teal-400 p-5 top-0 flex justify-between font-bold  rounded-md text-white">
    <p>Liste d'employés</p>
    <div class="flex items-center gap-2">
    <p>Welcome <?php echo $_SESSION["username"]?></p>
    <a class="hover:scale-105 transition-all" href="http://localhost/me/decon.php"><svg style="width:24px;height:24px" viewBox="0 0 24 24">
    <path fill="currentColor" d="M16,17V14H9V10H16V7L21,12L16,17M14,2A2,2 0 0,1 16,4V6H14V4H5V20H14V18H16V20A2,2 0 0,1 14,22H5A2,2 0 0,1 3,20V4A2,2 0 0,1 5,2H14Z" />
</svg></a>
    </div>
  </div>


  <a id="add" class="fixed right-5 bottom-5 p-5 bg-slate-200 rounded-full hover:scale-110 hover:bg-teal-400 hover:text-white transition-all" href="/me/formaddEMPL.php" id="elbuton">
    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
      <path fill="currentColor" d="M15,14C12.33,14 7,15.33 7,18V20H23V18C23,15.33 17.67,14 15,14M6,10V7H4V10H1V12H4V15H6V12H9V10M15,12A4,4 0 0,0 19,8A4,4 0 0,0 15,4A4,4 0 0,0 11,8A4,4 0 0,0 15,12Z" />
    </svg>
  </a>

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
        <th class="px-5 py-3 text-left" scope="col">Operations</th>
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
        <td class="flex justify-around px-5 py-3">
            <a href="/me/editEMPL.php?num=' . $num . '">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z" />
        </svg>
              
          </a>
          
          <a href="/me/delEmpl.php?num=' . $num . '" class="button">
          <svg style="width:24px;height:24px" viewBox="0 0 24 24">
          <path fill="currentColor" d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z" />
      </svg>
              
          </a>
        </td>
      </tr>';
      }

      require 'connection.php';

      $sqlQuery = "SELECT * FROM employes";

      $sqlResult = mysqli_query($cont, $sqlQuery);

      while ($row = mysqli_fetch_row($sqlResult)) {
        addRow($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
      }

      ?>
    </tbody>

  </table>
  <div class="flex items-center fixed right-5 -bottom-20 bg-lime-400 transition-all p-5 rounded-full" id="success-mod">
    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
      <path fill="currentColor" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
    </svg>
  </div>
    
 
  <?php
  if (isset($_GET["done"])) {
    $done = $_GET["done"];
    if ($done == 1) {
      echo '<script>
      const x = document.getElementById("success-mod");
      const y = document.getElementById("add");
      x.style.bottom = "20px";
      y.style.bottom= "104px";
      setTimeout(() => {x.style.bottom = "-80px"; y.style.bottom="20px"},3000);
    </script>';
    }
    elseif($done==2){
      echo '<script>
      const x = document.getElementById("success-mod");
      const y = document.getElementById("add");
      x.style.bottom = "20px";
      y.style.bottom= "104px";
      setTimeout(() => {x.style.bottom = "-80px"; y.style.bottom="20px"},3000);
    </script>';
    }
  }
  ?>
</body>

</html>

<?php else: 

    header("location: http://localhost/me/");
endif;
    
?>
  