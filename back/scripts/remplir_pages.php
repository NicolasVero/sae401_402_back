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
    include 'utilitaire.php';

    if(isset($_POST['textarea'])) {
        $images = $_FILES['images'];
    
        for($i=0; $i<count($images['name']); $i++) {
            $image = array(
                'name' => $images['name'][$i],
                'size' => $images['size'][$i],
                'type' => $images['type'][$i],
                'tmp_name' => $images['tmp_name'][$i]
            );
            move_uploaded_file($image['tmp_name'], "../pages/img_temp/" . spaceToDash($image['name']));
        }
    }


    include 'traitement_creation_pages.php';

?>

    <script src="../tinymce/tinymce.min.js" ></script>

    <main>

        <script src="init_tinymce.js"></script>

        <form id="creer-form" action='remplir_pages.php' method='POST' enctype="multipart/form-data">
            
            <div id="creer-form-data">
                <input class="form-input-text" type="text" name="titre" id="titre" placeholder="Titre de la page" required/>
                <input class="form-input-text" type="text" name="auteur" id="auteur" placeholder="Auteur de la page" required/>
                <div>
                    <input type="radio" id="projet" name="type" value="projet" checked>
                    <label for="projet">Projet</label>

                    <input type="radio" id="actu" name="type" value="actu">
                    <label for="actu">Actualité</label>
                </div>
                <div style="display: flex; flex-direction: column;">
                    <label for="images">Selectionner les images de votre page</label>
                    <input style="margin: 0 auto;" type="file" name="images[]" id="images" multiple>
                </div>
            </div>   
            
            <textarea name='textarea' id='MyTextArea'></textarea>
            <input style="margin: 0 auto;" type="submit" value="Créer la page" class="bouton">
        </form>

    </main>
</body>
</html> 