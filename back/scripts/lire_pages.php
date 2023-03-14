<?php
    function lirePages(string $type, int $n) {

        echo $n;

        include 'connect_bdd.php';

        $schema = $db -> prepare('SELECT * FROM pages WHERE affiche = 1 AND type LIKE ? ORDER BY id DESC LIMIT 3');
        $schema -> execute(array($type));
        echo "<b>Pages $type : </b><br/>";

        while ( $page = $schema -> fetch() ) {
            echo "Page : <a href='". $page['url'] ."' target='_blank' />" . $page['titre'] . "</a><br>";
        }
    }
?>