<?php

    unlink("pages/" . $_GET['page']);
    header("Location: accueil.php");

?>