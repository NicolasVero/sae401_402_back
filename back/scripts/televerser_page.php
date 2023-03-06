<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

        form {
            display: flex;
            flex-direction: column;
            width: 50vw;
        }
  
    </style>

</head>
<body>

    <?php
    
        if(isset($_FILES['html']['name'])) {
            echo 'rentre';
            include 'connect_bdd.php';
            
            mkdir("../pages/" . $_POST['titre']);
            mkdir("../pages/" . $_POST['titre'] . "/images/");
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

            if(move_uploaded_file($html['tmp_name'], "../pages/" . $_POST['titre'] . "/" . $html['name']) && 
               move_uploaded_file($css ['tmp_name'], "../pages/" . $_POST['titre'] . "/" . $css['name'])) {

                include '../classes/Page.php';

                $p = new Page($_POST['titre'], "null", "projet", "html", $html['name'], $css['name']);
                $p->remplir_bdd();

                header("Location: ../accueil.php");
                
            }

        }
    
    ?>

    <form action="televerser_page.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" id="titre" required>
        <div>
            <label for="style">Utiliser la feuille de style par défaut</label>
            <input type="checkbox" name="style" id="style" checked>
        </div>
        <label for="html">Choisir un fichier html</label>
        <input type="file" name="html" id="html" accept=".html">

        <label for="html">Choisir un fichier css</label>
        <input type="file" name="css" id="css" accept=".css">
        
        <label for="html">Selectionner les images de votre page</label>
        <input type="file" name="images" id="css">

        <input type="submit">
    </form>
</body>
</html>