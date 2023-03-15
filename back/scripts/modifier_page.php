<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Modifier une page</title>
</head>
<body>
    
    <script src="../tinymce/tinymce.min.js" ></script>
    <script src="init_tinymce.js"></script>

    <main>

    <?php
        
        include 'connect_bdd.php';

        $requete = $db -> prepare("SELECT * FROM pages WHERE id = ?");
        if(isset($_POST['id']))
            $requete -> execute(array($_POST['id'])); 
        else 
            $requete -> execute(array($_GET['page']));  
    
        $pages_infos = $requete -> fetch();

        $titre = $pages_infos['dossier'];
        $texte = $pages_infos['contenu'];
        $date  = $pages_infos['date'];
        $id    = $pages_infos['id'];


        if(isset($_POST['id'])) {
            
            if($_POST['titre'] != $titre) {
                rename("../pages/" . $titre, "../pages/" . spaceToDash($_POST['titre']));
            }

            echo "./back/pages/" . spaceToDash($_POST['titre']);


            $requete = $db -> prepare("UPDATE pages SET dossier = ?, contenu = ?, date = ?, url = ? WHERE id = ?");
            $requete -> execute(array($_POST['titre'], $_POST['texte'], $_POST['date'], './back/pages/' . spaceToDash($_POST['titre']), $_POST['id']));  
        
            
            $requete = $db -> prepare("SELECT * FROM pages WHERE id = ?");
            if(isset($_POST['id']))
                $requete -> execute(array($_POST['id'])); 
            else 
                $requete -> execute(array($_GET['page']));   
            
            $pages_infos = $requete -> fetch();
            

            unlink("../pages/" . $_POST['titre'] . "/index.html");

            include '../classes/GeneratePage.php';

            $gp = new GeneratePage($_POST['titre'], "index", $_POST['texte']);
            $gp->generateHTMLFile();

            header("Location: ../accueil.php");
        }

        print "
        <form action='modifier_page.php' method='POST' enctype='multipart/form-data'>
        
            <div id='creer-form-data'>
                <input class='form-input-text' type='text' name='titre' id='titre' value=$titre placeholder='Titre de la page' required>
                <input style='height: 30px;' type='date' name='date' id='date' value=$date required>
            </div>

            <div class='MyTextArea' style='margin: 30px 0;'>
                <textarea name='texte' id='MyTextArea'>$texte</textarea>
            </div>

            <input type='hidden' value=$id name='id'>
            
            <div style='display: flex;'>
                <input style='margin: 0 auto;' type='submit' value='Envoyer' class='bouton'>
            </div>
        </form>";


        function spaceToDash(string $s):string {
            return strtolower(str_replace(" ", "-", $s));
        }

    ?>

    </main>

</body>
</html>