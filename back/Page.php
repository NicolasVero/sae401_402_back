<?php

    final class Page {

        private string $titre;
        private string $texte;
        private string $html;
        private string $css;
        private string $lien;
        private string $date;
        private bool $estAffiche;

        public function __construct(string $titre, string $texte, string $html, string $css, string $lien) {

            $this->titre      = $titre;
            $this->texte      = $texte;
            $this->html       = $html;
            $this->css        = $css;
            $this->lien       = $lien;
            $this->date       = Page::donnerDate();
            $this->estAffiche = true;
        }

        private static function donnerDate() {
            date_default_timezone_set('Europe/Paris');
            return date('d-m-y h:i:s');
        }

        public function changeAffiche() {
            $this->estAffiche = !$this->estAffiche;
        }

    }

?>