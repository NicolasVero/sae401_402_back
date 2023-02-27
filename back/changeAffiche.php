<?php

    include 'connect_bdd.php';

    // Savoir si page deja affichée ou non 
    // SELECT ....


    $schema = "UPDATE pages SET affiche =  WHERE tiny_url = ?";
    $reserver = $db -> prepare($schema);
    $reserver -> execute(array($_GET['pages']));  

    header("Location: accueil.php");

?>