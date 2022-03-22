<?php
    require 'connection.php';
    $user=$_POST["username"];
    $pass=$_POST["password"];
    $query="SELECT * FROM users WHERE login='$user'";
    $result=mysqli_query($cont,$query);
    if($result && $result->num_rows!= 0){
        $row=mysqli_fetch_row($result);
        if($pass==$row[2] ){
            session_start();
            if(session_status()==PHP_SESSION_ACTIVE) session_unset();
            $_SESSION["username"]=$user;
            $_SESSION["rights"]=$row[3];            
            if($row[3]=="AD") header('Location: http://localhost/me/allEMPLS.php');
            else header('location: http://localhost/me/userinfo.php');
        }

        else{
            header('Location: http://localhost/me/index.html?error=1');
        }
    }
    else{
        header('Location: http://localhost/me/index.html?error=2');

    }    


?>