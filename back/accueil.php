<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <title>Accueil</title>
</head>
<body>
    
    <section id="actions-pages"> 
        <a href="scripts/creation_pages.php" class="bouton"><p>Créer une nouvelle page</p></a>
        <a href="scripts/televerser_page.php" class="bouton"><p>Téléverser une nouvelle page</p></a>
    </section>

    <?php

        session_start();
        if(!isset($_SESSION['username'])) header("Location: index.php");
    
        include 'classes/ReadFiles.php';
        
        $rf = new ReadFiles("./pages/");
        $pages = $rf->getHTMLFiles();
        $dossiers = $rf->getFolders();
        

        include 'scripts/connect_bdd.php';

        afficheDossiers($dossiers, $db);

        function afficheDossiers($dossiers, $db) {
                       
            if(count($dossiers) > 1) {
                echo "<div id='pages'>";

                foreach($dossiers as $dossier)
                    if($dossier != "img_temp" && $dossier != "desktop.ini")
                        drawFolderDiv($dossier, $db);
            } else {
                echo "<h3 style='text-align:center'>Aucune page prête à être affichée</h3>";
            }

            echo "</div>";
        }

        function drawFolderDiv($dossier, $db) {
        
            $path = $dossier . "/";

            $schema = "SELECT id, affiche, date, type, contenu FROM pages WHERE dossier = ?";
            $requete = $db -> prepare($schema);
            $requete -> execute(array($dossier));  

            $dossier_infos = $requete -> fetch();
            
            if($dossier_infos['affiche'] == 1) {
                $icone = "<img src='img/invisible.png' title='Rendre invisible'>";
                echo "<div class='page'>";
            } else {
                $icone = "<img src='img/visible.png' title='Rendre visible'>";
                echo "<div class='page non-visible'>";
            }


            echo "<div class='page-infos'><h3><a href='pages/$path' target='_blank'>$dossier</a></h3>";
            echo "<p><i>" . $dossier_infos['type'] . "</i> - Page ajoutée le " . $dossier_infos['date'] . "</p></div>";
            echo "<div class='page-option'>";
            echo "<span class='affiche'><a href='scripts/change_affiche.php?page=" . $dossier_infos['id'] . "'>$icone</a></span>";            
            if($dossier_infos['contenu'] != "null") 
                echo "<span class='modif'><a href='scripts/modifier_page.php?page= " . $dossier_infos['id'] . "'><img src='img/Modifier.png' title='Modifier une page'></a></span>";
            //! voir dl dossier en entier 
            echo "<span class='telecharger'><a href='scripts/zip_files.php?dossier=$dossier'><img src='img/download.png' title='Télécharger la page'></a></span>";
            echo "<span class='supp'><a onclick='return confirmation();' href='scripts/delete_page.php?id=" . $dossier_infos['id'] . "&page=$dossier'><img src='img/Supprimer.png' title='Supprimer la page'></a></span>";
            echo "</div>";
            echo "</div>";

        }
    ?>

    <script>
        function confirmation() {
            return confirm('Cette opération est irréversible, êtes vous sûr de vouloir la réaliser ? (Possibilitée de mettre la page en masquée)'); 
        }
    </script> 

</body>
</html>