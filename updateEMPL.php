<?php


session_start();
if( session_status()==PHP_SESSION_ACTIVE && $_SESSION["rights"]=="AD"){
      
    require 'connection.php';

    $fname=$_POST["nom"]; $lname=$_POST["prenom"]; $sexe=$_POST["sexe"]; $adresse=$_POST["adresse"]; $dateNaissance=$_POST["dateNaissance"]; $num=$_POST["num"];
    $numServ=$_POST["numServ"];

    $sqlQuery="UPDATE employes SET nom='$fname', prenom='$lname', sexe='$sexe', adresse='$adresse', dateNaissance='$dateNaissance' ,numServ='$numServ' WHERE code='$num'";

    $result=mysqli_query($cont,$sqlQuery);

    if($result){
        header("Location: http://localhost/me/allEMPLS.php?done=1");
    }
}
else header("location: http//localhost/me/");

?>