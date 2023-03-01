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
            
            print_r($_POST);
        }
    
    ?>

    <form action="televerserPage.php" method="POST">
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
        <input type="file" name="css" id="css" acept=".css">

        <input type="submit">
    </form>
</body>
</html>