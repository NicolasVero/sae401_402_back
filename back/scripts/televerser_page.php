<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Document</title>
</head>
<body>

    <?php
    
        if(isset($_FILES['html']['name'])) {
            echo 'rentre';
            include 'connect_bdd.php';
            
            mkdir("../pages/" . spaceToDash($_POST['titre']));
            mkdir("../pages/" . spaceToDash($_POST['titre']) . "/images/");
            // print_r($_POST);
            // print_r($_POST['html']);

            $html = array(
                'name' => $_POST['titre'] . ".html",
                'size' => $_FILES['html']['size'],
                'type' => $_FILES['html']['type'],
                'tmp_name' => $_FILES['html']['tmp_name']
            );

            $css = array(
                'name' => $_FILES['css']['name'],
                'size' => $_FILES['css']['size'],
                'type' => $_FILES['css']['type'],
                'tmp_name' => $_FILES['css']['tmp_name']
            );

            foreach($html as $key => $element) {
                echo "$key : $element <br>";
            }

            if(move_uploaded_file($html['tmp_name'], "../pages/" . spaceToDash($_POST['titre']) . "/" . spaceToDash($html['name'])) && 
               move_uploaded_file($css ['tmp_name'], "../pages/" . spaceToDash($_POST['titre']) . "/" . spaceToDash($css['name']))) {

                include '../classes/Page.php';

                $p = new Page(spaceToDash($_POST['titre']), $_POST['titre'], "null", "projet", "html", spaceToDash($html['name']), spaceToDash($css['name']), $_POST['auteur']);
                $p->remplir_bdd();

                header("Location: ../accueil.php");
                
            }

        }

        function spaceToDash(string $s):string {
            return strtolower(str_replace(" ", "-", $s));
        }
    
    ?>

    <form id="televerser-form-data" action="televerser_page.php" method="POST" enctype="multipart/form-data">
        <div>
            <input class="form-input-text" type="text" name="titre" id="titre" placeholder="Titre de la page" required>
            <input class="form-input-text" type="text" name="auteur" id="auteur" placeholder="Auteur de la page" required>
            <div>
                <label for="style">Utiliser la feuille de style par défaut</label>
                <input type="checkbox" name="style" id="style" checked>
            </div>
        </div>
        <div id="televerser-form-files">
            <div>
                <label for="html">Choisir un fichier html</label>
                <input type="file" name="html" id="html" accept=".html">
            </div>
            <div>
                <label for="html">Choisir un fichier css</label>
                <input type="file" name="css" id="css" accept=".css">
            </div>
            <div>
                <label for="html">Selectionner les images de votre page</label>
                <input style="margin: 0 auto;" type="file" name="images" id="css">
            </div>
        </div>
        <input style="margin: 0 auto;" class="bouton" type="submit">
    </form>
</body>
</html>