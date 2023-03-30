<?php

    include 'connect_bdd.php';
    include_once 'utilitaire.php';

    $schema = "DELETE FROM pages WHERE id = ?";
    $supprimerPage = $db -> prepare($schema);
    $supprimerPage -> execute(array($_GET['id']));

    remove_dir("../pages/" . $_GET['page'] . "/images/");
    remove_dir("../pages/" . $_GET['page'] . "/");

    header("Location: ../accueil.php");
    
?>