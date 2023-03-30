<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Téléverser une page</title>
</head>
<body>

    <?php
    
        include 'verif_session.php';
        include_once 'utilitaire.php';

        if(isset($_FILES['html']['name'])) {

            include 'connect_bdd.php';
            
            mkdir("../pages/" . spaceToDash($_POST['titre']));
            mkdir("../pages/" . spaceToDash($_POST['titre']) . "/images/");

            if(isset($_FILES['html']['name'])) {
                $html = array(
                    'name' => "index.html",
                    'size' => $_FILES['html']['size'],
                    'type' => $_FILES['html']['type'],
                    'tmp_name' => $_FILES['html']['tmp_name']
                );

                move_uploaded_file($html  ['tmp_name'], "../pages/" . spaceToDash($_POST['titre']) . "/"        . spaceToDash($html  ['name']));
            }

            if(isset($_FILES['css']['name'])) {
                $css = array(
                    'name' => $_FILES['css']['name'],
                    'size' => $_FILES['css']['size'],
                    'type' => $_FILES['css']['type'],
                    'tmp_name' => $_FILES['css']['tmp_name']
                );

                move_uploaded_file($css   ['tmp_name'], "../pages/" . spaceToDash($_POST['titre']) . "/"        . spaceToDash($css   ['name']));
            }

            $images = $_FILES['images'];
        
            for($i=0; $i<count($images['name']); $i++) {
                $image = array(
                    'name' => $images['name'][$i],
                    'size' => $images['size'][$i],
                    'type' => $images['type'][$i],
                    'tmp_name' => $images['tmp_name'][$i]
                );
                move_uploaded_file($image['tmp_name'], "../pages/" . spaceToDash($_POST['titre']) . "/images/" . spaceToDash($image['name']));
            }
            
            include '../classes/Page.php';
            include '../classes/GeneratePage.php';

            if(isset($_POST['style'])) {
                $gp = new GeneratePage($_POST['titre'], $_POST['titre'], "null");
                $gp->generateCSSFile();
            }

            $p = new Page(spaceToDash($_POST['titre']), "index", "null", $_POST['type'], spaceToDash($html['name']), spaceToDash($css['name']), $_POST['auteur']);
            $p->remplir_bdd();

            header("Location: ../accueil.php");
            
        }
    
    ?>

    <form id="televerser-form-data" action="televerser_page.php" method="POST" enctype="multipart/form-data">
        <div>
            <input class="form-input-text" type="text" name="titre" id="titre" placeholder="Titre de la page" required>
            <input class="form-input-text" type="text" name="auteur" id="auteur" placeholder="Auteur de la page" required>
            <div>
                <label for="style">Utiliser la feuille de style par défaut</label>
                <input type="checkbox" name="style" id="style">
            </div>
            <div>
                <input type="radio" id="projet" name="type" value="projet" checked>
                <label for="projet">Projet</label>

                <input type="radio" id="actu" name="type" value="actu">
                <label for="actu">Actualité</label>
            </div>
        </div>
        <div id="televerser-form-files">
            <div>
                <label for="html">Choisir un fichier html</label>
                <input type="file" name="html" id="html" accept=".html">
            </div>
            <div>
                <label for="css">Choisir un fichier css</label>
                <input type="file" name="css" id="css" accept=".css">
            </div>
            <div>
                <label for="images">Selectionner les images de votre page</label>
                <input style="margin: 0 auto;" type="file" name="images[]" id="images" multiple>
            </div>
        </div>
        <input style="margin: 0 auto;" class="bouton" type="submit" value="Téléverser la page">
    </form>
</body>
</html>