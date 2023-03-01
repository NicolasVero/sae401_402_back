<?php

    try {
        $db = new PDO( 'mysql:host=localhost; dbname=sae401' , 'root' , '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (Exception $e) { die( 'Erreur : ' . $e -> getMessage() ); }
    // echo "<b>bdd connectée</b><br/>";

?>  