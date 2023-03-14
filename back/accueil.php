<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" type="image/png" href="img/favicon.png">
    <title>Acceuil</title>
</head>
<body>
    
    <section id="actions-pages"> 
        <a href="scripts/creation_pages.php" class="bouton"><p>Créer une nouvelle page</p></a>
        <a href="scripts/televerser_page.php" class="bouton"><p>Téléverser une nouvelle page</p></a>
    </section>


    <?php
    
        include 'classes/ReadFiles.php';
        
        $rf = new ReadFiles("./pages/");
        // $rf->viewAllFiles();
        $pages = $rf->getHTMLFiles();
        // $dossiers = $rf->viewFolders();
        $dossiers = $rf->getFolders();
        

        include 'scripts/connect_bdd.php';

        afficheDossiers($dossiers, $db);




        function afficheDossiers($dossiers, $db) {
            
            echo "<div id='pages'>";
            
            if(count($dossiers) > 0) {
                foreach($dossiers as $dossier)
                    drawFolderDiv($dossier, $db);
            } else {
                echo "<h3>Aucune page prête à être affichée</h3>";
            }

            echo "</div>";
        }

        function drawFolderDiv($dossier, $db) {
        
            $path = $dossier . "/" . $dossier . ".html";

            $schema = "SELECT id, affiche, date, type FROM pages WHERE dossier = ?";
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
            echo "<span class='modif'><a href='#'><img src='img/Modifier.png'></a></span>";
            //! voir dl dossier en entier 
            echo "<span class='telecharger'><a href='pages/$dossier/' download='PAGE : $dossier/'><img src='img/download.png' title='Télécharger la page'></a></span>";
            echo "<span class='supp'><a onclick='return confirmation();' href='scripts/delete_page.php?id=" . $dossier_infos['id'] . "&page=$dossier'><img src='img/Supprimer.png' title='Supprimer la page'></a></span>";
            echo "</div>";
            echo "</div>";

        }

        //! deprecated
        function afficheFichiers($page, $db) {
            foreach ($pages as $page) 
                drawPageDiv($page, $db);  
        }

        //! deprecated
        function drawPageDiv($page, $db) {

            $schema = "SELECT id, affiche FROM pages WHERE tiny_url = ?";
            $requete = $db -> prepare($schema);
            $requete -> execute(array($page));  

            $page_id = $requete -> fetch();
            print_r($page_id);
            echo "retour : ";
            // echo $page_id['id'];

            $icone = $page_id['affiche'] == 1 ? "<img src='img/invisible.png' title='rendre invisible'>" : "<img src='img/visible.png' title='rendre visible'>";

            echo "<div class='page'>";
            echo "<h3><a href='pages/$page' target='_blank'>$page</a></h3>";
            echo "<div class='page-option'>";
            echo "<span class='affiche'><a href='scripts/change_affiche.php?page=" . $page_id['id'] . "'>$icone</a></span>";
            echo "<span class='modif'><a href='#'><img src='img/Modifier.png'></a></span>";
            echo "<span class='telecharger'><a href='pages/$page' download='PAGE : $page'><img src='img/download.png'></a></span>";
            echo "<span class='supp'><a onclick='return confirmation();' href='scripts/delete_page.php?page=$page'><img src='img/Supprimer.png'></a></span>";
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