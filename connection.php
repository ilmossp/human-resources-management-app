<?php

    define('HOST','localhost'); define('USER','root'); define('PASS','as'); define('DB','GRH');

    $cont=mysqli_connect(HOST,USER,PASS,DB);

    if($cont==false){echo "<h1>connection error</h1>"; }


?>