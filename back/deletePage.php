<?php

    include 'connect_bdd.php';

    $schema = "DELETE FROM pages WHERE tiny_url = ?";
    $supprimerPage = $db -> prepare($schema);
    $supprimerPage -> execute(array($_GET['page']));

    unlink("pages/" . $_GET['page']);
    header("Location: accueil.php");

?>