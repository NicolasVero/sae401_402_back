<?php

    final class Page {

        const PATH = './back/pages/';

        private string $titre;
        private string $texte;
        private string $html;
        private string $style;
        private string $url;
        private string $tiny_url;
        private string $date;
        private int $id_auteur;
        private bool $estAffiche;

        public function __construct(string $titre, string $texte, string $html, string $url, string $style) {

            $this->titre      = $titre;
            $this->texte      = $texte;
            $this->html       = $html;
            $this->style      = $style;
            $this->url        = self::PATH . $url;
            $this->tiny_url   = $url;
            $this->date       = Page::donnerDate();
            $this->id_auteur  = 0;
            $this->estAffiche = true;
        }

        private static function donnerDate() {
            date_default_timezone_set('Europe/Paris');
            return date('d-m-y h:i:s');
        }

        public function changeAffiche() {
            $this->estAffiche = !$this->estAffiche;
        }

        public function remplir_bdd() {

            include 'connect_bdd.php';

            $schema = "INSERT INTO pages(titre, contenu, affiche, url, tiny_url, style, date) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $creerPage = $db -> prepare($schema);
            $creerPage -> execute(array($this->titre, $this->texte, $this->estAffiche, $this->url, $this->tiny_url, $this->style, $this->date));
        }

    }

?>