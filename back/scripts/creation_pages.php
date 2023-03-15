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
        
        $gp = new GeneratePage($_POST['titre'], "index", $_POST['textarea']);
        
        if($gp->generateFolder()) {
         
            $p = new Page($gp->getDossier(), "index", $_POST['textarea'], $_POST['type'], $gp->getUrl(), "style.css", $_POST['auteur']);
            $gp->generateImagesFolder();
            $p->remplir_bdd();
            $gp->generateHTMLFile();
            

            $gp->moveFiles("../pages/img_temp/", "../pages/" . $p->getDossier() . "/images/");
            
            header('Location: ../accueil.php');
        }    
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