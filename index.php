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

        include 'back/scripts/lire_pages.php';

        $projets = get_pages("projet", 2);
        $actus = get_pages("projet", 1);
        $pages = [$projets, $actus];

        for ($x = 0; $x < count($pages); $x++) {
            for($i = 0; $i < count($pages[$x]); $i++) {
                echo "<h1>" . $pages[$x][$i]['auteur'] . "</h1>";
                echo "<p>" . $pages[$x][$i]['contenu'] . "<p>";
            }
        }

        

    ?>

</body>
</html>