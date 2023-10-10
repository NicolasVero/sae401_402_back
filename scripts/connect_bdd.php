<?php

    try {
        // $db = new PDO( 'mysql:host=localhost; dbname=sae401' , 'root' , '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $db = new PDO('mysql:host=louistctoulllou.mysql.db;port=3306;dbname=louistctoulllou', 'louistctoulllou', 'Voiture123', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch (Exception $e) {
        die( 'Erreur : ' . $e -> getMessage() );
    }

?>