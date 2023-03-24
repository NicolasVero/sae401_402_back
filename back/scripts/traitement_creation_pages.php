<?php

    if(isset($_POST['textarea'])) {

        include '../classes/GeneratePage.php';
        include '../classes/Page.php';
        
        $files = getImagesFiles(scandir('../pages/img_temp'));
        $texte = str_replace('<img src="../pages/img_temp/', '<img src="./images/', $_POST['textarea']);
        
        $gp = new GeneratePage($_POST['titre'], $_POST['titre'], $texte);
        
        if($gp->generateFolder()) {
        
            $p = new Page($gp->getDossier(), $_POST['titre'], $texte, $_POST['type'], $gp->getUrl(), "style.css", $_POST['auteur']);
            $gp->generateImagesFolder();
            $p->remplir_bdd();
            $p->getResume();

            if(isset($images['name']))
                $gp->generateHTMLFile($images['name']);
            else  
                $gp->generateHTMLFile();
                
            $gp->generateCSSFile();

            foreach($files as $file) {
                if(!moveFile("../pages/img_temp/$file", "../pages/" . $_POST['titre'] . "/images/$file")) {
                    break;
                }
            }

            header("Location: ../accueil.php");
        }  
    }

?>