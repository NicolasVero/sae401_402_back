<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php

        include 'back/scripts/lire_pages.php';

        $projets = get_pages("projet", 3);
        $actus = get_pages("actu", 3);

        for($i = 0; $i < count($actus); $i++) {
            echo "
                <div class='news'>
                    <a href='" . $actus[$i]['url'] . "'>
                    <div>
                        <h1>" . $actus[$i]['dossier'] . "</h1>" . 
                        "<span>Par " . $actus[$i]['auteur'] . " le " . $actus[$i]['date'] . "</span>
                    </div>
                    </a>
                </div>";
        }

        for($i = 0; $i < count($projets); $i++) {
            echo "<div class='projects'><a href='" . $projets[$i]['url'] . "' target='_blank' class='projects-links'><div><h1>" . $projets[$i]['dossier'] . "</h1><p>" . $projets[$i]['tiny_contenu'] . "</p><span>Par " . $projets[$i]['auteur'] . " le " . $projets[$i]['date'] . "</span></div></a></div>";
        }

    ?>

</body>
</html>