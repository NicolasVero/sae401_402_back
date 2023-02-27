<?php


    if(!isset($_POST['textarea'])) header('Location: accueil.php');
        
        
    // echo htmlentities($_POST['textarea']);
    // echo htmlentities($_POST['titre']);
    
    include 'GeneratePage.php';
    include 'ReadFiles.php';
    include 'Page.php';

    $gp = new GeneratePage($_POST['titre'], $_POST['textarea']);
    $gp->generateHTMLFile();

    $p = new Page($_POST['titre'], $_POST['titre'], "html", $gp->getUrl(), "style.css", "url");
    print_r($_POST);

    $p->remplir_bdd();

    $rf = new ReadFiles();
    $rf->viewHTMLFiles();
    // $rf->viewAllFiles();

    // $files = $rf->getAllFiles();
    // print_r($files);

    header('Location: accueil.php');

?>