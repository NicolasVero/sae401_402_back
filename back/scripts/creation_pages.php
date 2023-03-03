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

        <script src="../tinymce/tinymce.min.js" ></script>

        <main>

            <script src="init_tinymce.js"></script>

            <form action='traitement.php' method='POST' enctype="multipart/form-data">
                <!-- <fieldset>
                    <legend>De quel type de page s'agit </legend>

                    <div>
                        <input type="radio" id="projet" name="projet" value="projet" checked>
                        <label for="projet">Projet</label>

                        <input type="radio" id="actu" name="actu" value="actu">
                        <label for="actu">Actualité</label>
                    </div>
                </fieldset> -->

                <input type="text" name="titre" id="titre" placeholder="Titre de la page" required/>
                <textarea name='textarea' id='MyTextArea'></textarea>
                <input type="submit" value="envoyer">
            </form>

        </main>
    </body>
</html>