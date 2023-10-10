<?php
// Chemin vers le dossier à compresser
$zip_folder = '../pages/' . $_GET['dossier'];

// Vérifie si le dossier existe
if (!is_dir($zip_folder)) {
    die("Le dossier n'existe pas.");
}

// Nom du fichier zip à créer
$zip_name = '../pages/' . $_GET['dossier'] . '.zip';

// Création d'une instance de la classe ZipArchive
$zip = new ZipArchive();

// Ouverture du fichier zip en mode création, avec écrasement s'il existe déjà
if ($zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE | ZipArchive::CREATE) !== true) {
    die("Impossible d'ouvrir le fichier zip.");
}

// Parcours récursif du dossier à compresser
$dir_iterator = new RecursiveDirectoryIterator($zip_folder);
$iterator = new RecursiveIteratorIterator($dir_iterator, RecursiveIteratorIterator::SELF_FIRST);

foreach ($iterator as $file) {
    // Ignore les dossiers vides
    if ($file->isDir()) {
        continue;
    }

    // Chemin absolu du fichier
    $file_path = $file->getRealPath();

    // Nom du fichier ou du dossier dans l'archive zip
    $zip_path = basename($file_path);

    // Ajout du fichier ou du dossier dans l'archive zip
    $zip->addFile($file_path, $zip_path);
}

// Fermeture de l'archive zip
$zip->close();

// Entête HTTP pour forcer le téléchargement
header('Content-Description: File Transfer');
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $_GET['dossier'] . '.zip"');
header('Content-Transfer-Encoding: binary');
header('Connection: Keep-Alive');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($zip_name));

// Envoi du fichier au navigateur
readfile($zip_name);

// Suppression du fichier zip après envoi
unlink($zip_name);
?>