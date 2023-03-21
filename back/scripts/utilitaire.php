<?php

function getImagesFiles($scan) {
    $files = array();

    foreach($scan as $fichier)
        if(preg_match("/.jpg$|.jpeg$|.png$/", $fichier) >= 1) 
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

?>