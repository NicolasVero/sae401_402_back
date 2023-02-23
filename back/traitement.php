<?php


    if(!isset($_POST['textarea'])) header('Location: accueil.php');
        
        
    // echo htmlentities($_POST['textarea']);
    // echo htmlentities($_POST['titre']);
    
    include 'GeneratePage.php';
    include 'ReadFiles.php';

    $gp = new GeneratePage($_POST['titre'], $_POST['textarea']);
    $gp->generateHTMLFile();

    $p = new Page($_POST['titre'], );

    $rf = new ReadFiles();
    $rf->viewHTMLFiles();
    // $rf->viewAllFiles();

    // $files = $rf->getAllFiles();
    // print_r($files);

    header('Location: accueil.php');

?>