<!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Création de pages de projets</title>
        <link rel="stylesheet" href="styles/style.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    </head>
    <body>

        <script src="tinymce/tinymce.min.js" ></script>




        <main>

            <script>
                tinymce.init({ 
                    selector:'textarea#MyTextArea',
                    promotion: false,
                    skin: 'oxide-dark',
                    content_css: 'writer',
                    placeholder: "Saisissez ici votre texte et mettez-le en forme !",
                    language: 'fr_FR',
                    plugins: 'advlist autolink link image lists charmap preview',
                    external_plugins: {
                        'maths': 'http://www.maths.com/plugin.min.js'
                    },
                    images_upload_url: './tinymce/postAcceptor.php',
                    images_upload_base_path: '/images',
                    images_file_types: 'jpg,svg,webp,png'
                });
            </script>


        <form action='traitement.php' method='POST' enctype="multipart/form-data">
            <input type="text" name="titre" id="titre" placeholder="Titre de la page" required/>
            <textarea name='textarea' id='MyTextArea'></textarea>
            <input type="submit" value="envoyer">
        </form>

        </main>
    </body>
</html>