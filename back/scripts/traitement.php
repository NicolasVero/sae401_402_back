<?php


    if(!isset($_POST['textarea'])) header('Location: accueil.php');
           
    include '../classes/GeneratePage.php';
    // include '../classes/ReadFiles.php';
    include '../classes/Page.php';

    $gp = new GeneratePage($_POST['titre'], $_POST['textarea']);
    $gp->generateHTMLFile();

    $p = new Page($_POST['titre'], $_POST['titre'], "html", $gp->getUrl(), "style.css", "url");
    print_r($_POST);

    $p->remplir_bdd();

    header('Location: ../accueil.php');

?>