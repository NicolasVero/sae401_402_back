<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <script src="../tinymce/tinymce.min.js" ></script>
    <script src="init_tinymce.js"></script>

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

        print "<form action='modifier_page.php' method='POST' enctype='multipart/form-data'>
        <label for='titre'>Titre :</label>
        <input type='text' name='titre' id='titre' value=$titre required>
        <label for='date'>Date :</label>
        <input type='date' name='date' id='date' value=$date required>
            </p>
            <div>
            <div class='MyTextArea'>
                <textarea name='texte' id='MyTextArea'>$texte</textarea>
                <p>
            </div>
            </div>
            <input type='hidden' value=$id name='id'>
        <input type='submit' value='envoyer'>
            </p>
        </form>
        </fieldset>
        </div>";


        function spaceToDash(string $s):string {

            return strtolower(str_replace(" ", "-", $s));
        }
    ?>

</body>
</html>