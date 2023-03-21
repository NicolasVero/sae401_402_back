<?php
    function get_pages(string $type, $n) {

        include 'connect_bdd.php';

        $schema = $db -> prepare("SELECT * FROM pages WHERE affiche = 1 AND type LIKE ? ORDER BY id DESC LIMIT " . $n);
        $schema -> execute(array($type));
        echo "<b>Pages $type : </b><br/>";

        while ( $page = $schema -> fetch() ) {
            echo "Page : <a href='" . $page['url'] . "' target='_blank' />" . $page['dossier'] . "</a><br>";
        }
    }
?>