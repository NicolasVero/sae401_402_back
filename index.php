<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        include 'back/connect_bdd.php';

        lireArticles($db);


        function lireArticles($db) {

            $schema = $db -> prepare('SELECT * FROM pages WHERE affiche = 1');
            $schema -> execute();

            while ( $page = $schema -> fetch() ) {
                echo "Page : <a href='". $page['url'] ."' target='_blank' />" . $page['titre'] . "</a><br>";
            }
        }


    ?>

</body>
</html>