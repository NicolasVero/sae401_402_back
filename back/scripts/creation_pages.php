<!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Créer une page</title>
        <link rel="stylesheet" href="../styles/style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

    <?php

    include 'verif_session.php';
    
    if(isset($_POST['textarea'])) {

        include '../classes/GeneratePage.php';
        include '../classes/Page.php';
        
        $files = getImagesFiles(scandir('../pages/img_temp'));
        $texte = str_replace('<img src="../pages/img_temp/', '<img src="./images/', $_POST['textarea']);
        
        $gp = new GeneratePage($_POST['titre'], "index", $texte);
        
        if($gp->generateFolder()) {
        
            $p = new Page($gp->getDossier(), "index", $texte, $_POST['type'], $gp->getUrl(), "style.css", $_POST['auteur']);
            $gp->generateImagesFolder();
            $p->remplir_bdd();
            $gp->generateHTMLFile();

            foreach($files as $file) {
                if(!moveFile("../pages/img_temp/$file", "../pages/" . $_POST['titre'] . "/images/$file")) {
                    break;
                }
            }

            header('Location: ../accueil.php');
        }    
    }

    function getImagesFiles($scan) {
        $files = array();

        foreach($scan as $fichier)
            if(preg_match("/.jpg$|.jpeg$|.png$/", $fichier) >= 1) 
                $files[] = $fichier;

        return $files;
    }

    function moveFile($dossierSource , $dossierDestination){

        if(!file_exists($dossierSource)) return false;  
        if(!copy($dossierSource, $dossierDestination)) return false; 
        if(!unlink($dossierSource)) return false;
        
        return true;
    }

    ?>

        <script src="../tinymce/tinymce.min.js" ></script>

        <main>

            <script src="init_tinymce.js"></script>

            <form id="creer-form" action='creation_pages.php' method='POST' enctype="multipart/form-data">
                
                <div id="creer-form-data">
                    <input class="form-input-text" type="text" name="titre" id="titre" placeholder="Titre de la page" required/>
                    <input class="form-input-text" type="text" name="auteur" id="auteur" placeholder="Auteur de la page" required/>
                    <div>
                        <input type="radio" id="projet" name="type" value="projet" checked>
                        <label for="projet">Projet</label>
    
                        <input type="radio" id="actu" name="type" value="actu">
                        <label for="actu">Actualité</label>
                    </div>
                </div>   
                
                <textarea name='textarea' id='MyTextArea'></textarea>
                <input style="margin: 0 auto;" type="submit" value="Créer la page" class="bouton">
            </form>

        </main>
    </body>
</html>