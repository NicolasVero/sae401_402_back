<?php

function getImagesFiles($scan) {
    $files = array();

    foreach($scan as $fichier)
        if(preg_match("/.jpg$|.jpeg$|.png$|.JPG$|.JPEG$|.PNG$/", $fichier) >= 1) 
            $files[] = $fichier;

    return $files;
}

function moveFile($dossierSource , $dossierDestination){

    if(!file_exists($dossierSource)) return false;  
    if(!copy($dossierSource, $dossierDestination)) return false; 
    if(!unlink($dossierSource)) return false;
    
    return true;
}

function spaceToDash(string $s):string {
    return strtolower(str_replace(" ", "-", $s));
}

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

function getTinyContenu($titre) {

    include 'connect_bdd.php';

    $schema = "SELECT contenu, id FROM pages WHERE dossier = ?";
    $requete = $db -> prepare($schema);
    $requete -> execute(array($titre));
    
    $dossier_infos = $requete -> fetch();
    
    $tiny = substr($dossier_infos['contenu'], strpos($dossier_infos['contenu'], "<p>"), 100);
    
    if(substr($tiny, -4) == "</p>") {
        $tiny = substr($tiny, 0, strlen($tiny) - 4);
    }
    
    $tiny .= "...</p>";
    
    $schema = "UPDATE pages SET tiny_contenu = ? WHERE dossier = ?";
    $requete = $db -> prepare($schema);
    $requete -> execute(array($tiny, $titre));
    
}

?>