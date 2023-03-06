<?php


    if(!isset($_POST['textarea'])) header('Location: accueil.php');
           
    include '../classes/GeneratePage.php';
    // include '../classes/ReadFiles.php';
    include '../classes/Page.php';

    $gp = new GeneratePage($_POST['titre'], $_POST['textarea']);
    if($gp->generateFolder()) {
        $gp->generateImagesFolder();
        $gp->generateHTMLFile();
    }


    echo $gp->getUrl();
    $p = new Page($_POST['titre'], $_POST['textarea'], "projet", "html", $gp->getUrl(), "style.css");
    print_r($_POST);

    $p->remplir_bdd();

    header('Location: ../accueil.php');

?>