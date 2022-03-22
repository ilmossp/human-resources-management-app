<?php

session_start();
if( session_status()==PHP_SESSION_ACTIVE && $_SESSION["rights"]=="AD"){    
    require 'connection.php';

    $nom=$_GET["nom"]; $prenom=$_GET["prenom"]; $sexe=$_GET["sexe"]; $adresse=$_GET["adresse"]; $dateNaissance=$_GET["dateNaissance"]; $numServ=$_GET["numServ"];

    $sqlQuery="INSERT INTO employes (nom,prenom,sexe,adresse,dateNaissance,numServ) VALUES ('$nom','$prenom','$sexe','$adresse','$dateNaissance','$numServ')";

    mysqli_query($cont,$sqlQuery);

    header("Location: http://localhost/me/formaddEMPL.php?done");
}
else header("location: http//localhost/me/");

?>