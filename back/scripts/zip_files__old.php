<?php

	$zip_name = '../pages/zip/' . $gp->getDossier() . '.zip';
	$zip_folder = '../pages/zip/' . $gp->getDossier();
	
	$zip_folder_name = basename($zip_folder);
	
	$zip = new ZipArchive();
	$zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE | ZipArchive::CREATE);
	
	
	$parcours_repertoires = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($zip_folder)
		, RecursiveIteratorIterator::SELF_FIRST
	);
	
	
	foreach ($parcours_repertoires as $e) {

		$nom = $parcours_repertoires->getSubPathName();
	
		if (!is_file("$zip_folder/$nom")) {
			// Ajout du dossier vide au fichier zip
			$zip->addEmptyDir("$zip_folder_name/$nom");
			continue;
		}
	
		echo "ajout de $nom<br/>\n";
	
		$zip->addFile("$zip_folder/$nom", "$zip_folder_name/$nom");
	}
	
	$zip->close();

?>
