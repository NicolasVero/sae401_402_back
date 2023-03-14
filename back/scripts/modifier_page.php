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


        if(isset($_POST['id'])) {
            
            $requete = $db -> prepare("UPDATE pages SET titre = ?, contenu = ?, date = ? WHERE id = ?");
            $requete -> execute(array($_POST['titre'], $_POST['texte'], $_POST['date'], $_POST['id']));  
        
            
            
            $requete = $db -> prepare("SELECT * FROM pages WHERE id = ?");
            $requete -> execute(array($_GET['page']));  
            
            $pages_infos = $requete -> fetch();
            
            unlink("../pages/" . );

            // header("Location: ../accueil.php");
        }

        $requete = $db -> prepare("SELECT * FROM pages WHERE id = ?");
        $requete -> execute(array($_GET['page']));  
    
        $pages_infos = $requete -> fetch();

        $titre = $pages_infos['titre'];
        $texte = $pages_infos['contenu'];
        $date = $pages_infos['date'];
        $id    = $pages_infos['id'];

        echo $titre;
        echo $texte;
        echo $id;


        print "<form action='modifier_page.php' method='POST' enctype='multipart/form-data'>

    <p>
      <label for='titre'>Titre :</label>
      <input type='text' name='titre' value='$titre' id='titre' required>
      <label for='date'>Date :</label>
      <input type='date' name='date' value='$date' id='date' required>
";



            print "
            </select>
            </p>
            <div>
            <div class='MyTextArea'>
                <p><label for='MyTextArea'>Texte de l'article</label>
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
    ?>

</body>
</html>