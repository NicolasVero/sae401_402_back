<?php

    function get_pages(string $type, $n) {

        include 'connect_bdd.php';

        $schema = $db -> prepare("SELECT * FROM pages WHERE affiche = 1 AND type LIKE ? ORDER BY id DESC LIMIT " . $n);
        $schema -> execute(array($type));

        $infos = [];

        while ( $page = $schema -> fetch(PDO::FETCH_ASSOC) ) {
            $infos[] = $page;
        }

        return $infos;
    }

?>