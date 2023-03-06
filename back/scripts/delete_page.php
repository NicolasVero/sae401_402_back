<?php

    include 'connect_bdd.php';

    $schema = "DELETE FROM pages WHERE id = ?";
    $supprimerPage = $db -> prepare($schema);
    $supprimerPage -> execute(array($_GET['id']));

    // unlink("../pages/" . $_GET['page']);
    remove_dir("../pages/" . $_GET['page']);
    // header("Location: ../accueil.php");


    function remove_dir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            
            foreach ($objects as $object) { 
                if ($object != "." && $object != "..") { 
                    if (filetype($dir."/".$object) == "dir") rmdir($dir . "/" . $object); else unlink($dir . "/" . $object); 
                }
            }

            reset($objects);
            rmdir($dir);
            }
        }

?>