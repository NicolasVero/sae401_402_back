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
    
        if(isset($_POST['titre'])) {

            include 'connect_bdd.php';
            
            // print_r($_POST);
            // print_r($_POST['html']);

            $html = array(
                'name' => $_FILES['html']['name'],
                'size' => $_FILES['html']['size'],
                'type' => $_FILES['html']['type'],
                'tmp_name' => $_FILES['html']['tmp_name']
            );

            foreach($html as $key => $element) {
                echo "$key : $element <br>";
            }

            if(move_uploaded_file($html['tmp_name'], "./pages/")) {
                echo "fichier trans";
            }




        }
    
    ?>

    <form action="televerser_page.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="titre" id="titre" required>
        <div>
            <label for="affiche">Afficher la page sur le site</label>
            <input type="checkbox" name="affiche" id="affiche" checked>
        </div>
        <div>
            <label for="affiche">Utiliser la feuille de style par défaut</label>
            <input type="checkbox" name="style" id="style" checked>
        </div>
        <label for="html">Choisir un fichier html</label>
        <input type="file" name="html" id="html" accept=".html">
        <label for="html">Choisir un fichier css</label>
        <input type="file" name="css" id="css" accept=".css">

        <input type="submit">
    </form>
</body>
</html>