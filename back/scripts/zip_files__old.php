// // $zip_name = '../pages/' . $_GET['dossier'] . '.zip';
	// $dossier = $_GET['dossier'];
	// $zip_name = "../pages/$dossier.zip";
	// $zip_folder = '../pages/' . $_GET['dossier'];
	
	// $zip_folder_name = basename($zip_folder);
	
	// $zip = new ZipArchive();
	// $zip->open($zip_name, ZipArchive::CREATE | ZipArchive::OVERWRITE | ZipArchive::CREATE);
	
	
	// $parcours_repertoires = new RecursiveIteratorIterator(
	// 	new RecursiveDirectoryIterator($zip_folder)
	// 	, RecursiveIteratorIterator::SELF_FIRST
	// );
	
	
	// foreach ($parcours_repertoires as $e) {

	// 	$nom = $parcours_repertoires->getSubPathName();
	
	// 	if (!is_file("$zip_folder/$nom")) {
	// 		// Ajout du dossier vide au fichier zip
	// 		$zip->addEmptyDir("$zip_folder_name/$nom");
	// 		continue;
	// 	}
	
	// 	echo "ajout de $nom<br/>\n";
	
	// 	$zip->addFile("$zip_folder/$nom", "$zip_folder_name/$nom");
	// }
	
	// $zip->close();

	// // Envoi des entêtes HTTP pour forcer le téléchargement
	// header('Content-Description: File Transfer');
	// header('Content-Type: application/zip');
	// header('Content-Disposition: attachment; filename="' . $_GET['dossier'] . '.zip"');
	// header('Content-Transfer-Encoding: binary');
	// header('Connection: Keep-Alive');
	// header('Expires: 0');
	// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	// header('Pragma: public');
	// header('Content-Length: ' . filesize($zip_name));

	// // Envoi du fichier au navigateur
	// readfile($zip_name);

	// // Supprimer le fichier zip après l'avoir envoyé au navigateur
	// unlink($zip_name);