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
    
    if(isset($_POST['textarea'])) {

        include '../classes/GeneratePage.php';
        include '../classes/Page.php';
        
        $files = getImagesFiles(scandir('../pages/img_temp'));

        print_r($files);
        $texte = str_replace('<img src="../pages/img_temp/', '<img src="./images/', $_POST['textarea']);
        
        $gp = new GeneratePage($_POST['titre'], "index", $texte);
        
        if($gp->generateFolder()) {
        
            $p = new Page($gp->getDossier(), "index", $texte, $_POST['type'], $gp->getUrl(), "style.css", $_POST['auteur']);
            $gp->generateImagesFolder();
            $p->remplir_bdd();
            $gp->generateHTMLFile();

            foreach($files as $file) {
                // rename("back/pages/img_temp/$file", "back/pages/" . $_POST['titre'] . "/images/$file");
                moveFile("../pages/img_temp/$file", "../pages/" . $_POST['titre'] . "/images/$file");
            }

            // header('Location: ../accueil.php');
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

        $retour = 1; 
        if(!file_exists($dossierSource)) { 
         $retour = -1; 
        } else { 
         if(!copy($dossierSource, $dossierDestination)) { 
         $retour = -2; 
         } else { 
         if(!unlink($dossierSource)) { 
         $retour = -3; 
         } 
         } 
        } 
        return($retour);
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