<?php

    $db = new PDO( 'mysql:host=localhost; dbname=sae401' , 'root' , '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "<b>bdd connectée</b><br/>";

?>  