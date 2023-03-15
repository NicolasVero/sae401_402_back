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

        lirePages("projet", 4);
        echo "<br>";
        lirePages("actu", 3);

    ?>

</body>
</html>