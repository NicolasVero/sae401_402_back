<!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Création de pages de projets</title>
        <link rel="stylesheet" href="../styles/style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    </head>
    <body>

    <?php
    
    if(isset($_POST['textarea'])) {

        include '../classes/GeneratePage.php';
        include '../classes/Page.php';
        
        $gp = new GeneratePage($_POST['titre'], $_POST['textarea']);
        
        if($gp->generateFolder()) {
         
            $p = new Page($gp->getDossier(), $_POST['titre'], $_POST['textarea'], $_POST['type'], "html", $gp->getUrl(), "style.css", $_POST['auteur']);
            $gp->generateImagesFolder();
            $p->remplir_bdd();
            $gp->generateHTMLFile();
            
            
            echo $gp->getUrl();
            print_r($_POST);
            
            header('Location: ../accueil.php');
        }    
    }
    
    ?>



        <script src="../tinymce/tinymce.min.js" ></script>

        <main>

            <script src="init_tinymce.js"></script>

            <form action='creation_pages.php' method='POST' enctype="multipart/form-data">
                <!-- <fieldset> -->
                    <!-- <legend>De quel type de page s'agit </legend> -->


                <!-- </fieldset> -->
                
                <div id="form-data">
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