<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>

    <style>
    
        * {
            box-sizing: border-box;
        }

        html, body {
            background-color: black;
        }

        div {
            background-color: white;
        }
        
        div.page {
            height: 75px;
            border: 1px solid black;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .page h3 {
            padding: 15px;
        }

        div.page-option {
            display: flex;
            height: 100%; 
        }
        
        p {
            color: #080710;
        }

        a img {
            width: 100%;
            height: 100%;
            background-color: #999999AA;
            border-radius: 5px;
        }
        
        span a {
            margin: 0 15px;
            height: 50%;
        }

        span {
            display: flex;
            align-items: center;
            width: 100%;
        }


    </style>

</head>
<body>
    
    <div> 
        <a href="creationPages.php"><p>Créer une nouvelle page</p></a>
    </div>


    <?php
    
        include 'ReadFiles.php';
        
        $rf = new ReadFiles();
        // $rf->viewAllFiles();
        $pages = $rf->getHTMLFiles();
        
        foreach ($pages as $page) {
            drawPageDiv($page);
        }



        function drawPageDiv($page) {

            echo "<div class='page'>";
            echo "<h3><a href='pages/$page' target='_blank'>$page</a></h3>";
            echo "<div class='page-option'>";
            echo "<span class='modif'><a href='#'><img src='img/Modifier.png'></a></span>";
            echo "<span class='modif'><a href='#'><img src='img/Modifier.png'></a></span>";
            echo "<span class='supp'><a href='deletePage.php?page=$page'><img src='img/Supprimer.png'></a></span>";
            echo "</div>";
            echo "</div>";
        }


    
    ?>

</body>
</html>