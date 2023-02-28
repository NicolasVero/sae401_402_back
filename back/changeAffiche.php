<?php

    include 'connect_bdd.php';
    
    $schema = "UPDATE pages SET affiche = abs(affiche - 1) WHERE id = ?";
    $reserver = $db -> prepare($schema);
    $reserver -> execute(array($_GET['page']));  

    header("Location: accueil.php");

?>