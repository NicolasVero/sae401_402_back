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

        $projets = get_pages("projet", 4);
        $actus = get_pages("projet", 4);

        for($i = 0; $i < count($projets); $i++) {

            echo "<h1>".$projets[$i]['titre']."</h1>";
            echo $projets[$i]['auteur'];
            echo $projets[$i]['url'];
        }

    ?>

</body>
</html>