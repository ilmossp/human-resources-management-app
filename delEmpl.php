<?php

use LDAP\Result;

    require 'connection.php';
    $Query="DELETE FROM employes WHERE code=".$_GET["num"];
    $Result=mysqli_query($cont,$Query);
    if($Result){
        header("Location: http://localhost/me/allEMPLS.php?done=2");
    }
    else{
        echo "an error occured ";
    }
?>
