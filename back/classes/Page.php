<?php

    final class Page {

        const PATH = './back/pages/';

        private string $dossier;
        private string $titre;
        private string $texte;
        private string $type;
        private string $html;
        private string $style;
        private string $url;
        private string $tiny_url;
        private string $date;
        private int $id_auteur;
        private string $auteur;
        private bool $estAffiche;

        public function __construct(string $dossier, string $titre, string $texte, string $type, string $html, string $url, string $style, string $auteur) {

            $this->dossier    = $dossier;
            $this->titre      = $titre;
            $this->texte      = $texte;
            $this->type       = $type;
            $this->html       = $html;
            $this->style      = $style;
            $this->url        = self::PATH . $this->titre . "/" . $url;
            $this->tiny_url   = $url;
            $this->date       = Page::donnerDate();
            $this->id_auteur  = 0;
            $this->auteur     = $auteur;
            $this->estAffiche = true;
        }

        private static function donnerDate() {
            date_default_timezone_set('Europe/Paris');
            return date('y-m-d h:i:s');
        }

        public function setAffiche():void {
            $this->estAffiche = !$this->estAffiche;
        }

        public function setTitre($titre):void {
            $this->titre = $titre;
        }

        public function setTinyURL($tiny_url):void {
            $this->tiny_url = $tiny_url;
        }

        public function setURL($url):void {
            $this->url = $url;
        }

        public function remplir_bdd() {

            include '../scripts/connect_bdd.php';


            //! script empecher deux fichiers meme nom

            // include 'ReadFiles.php';

            // $rf = new ReadFiles("../pages/");
            // $pages = $rf->getAllFiles();

            // print_r($pages);

            // for($i = 0; $i < count($pages); $i++) {
            //     if($pages[$i] == $this->tiny_url) {
            //         $this->setTitre($this->titre . "($i)");
            //         $this->setTinyURL($this->tiny_url . "($i)");
            //         $this->setURL($this->url . "($i)");
            //     }
            // }

            $schema = "INSERT INTO pages(dossier, titre, contenu, type, affiche, url, tiny_url, style, date, auteur) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $creerPage = $db -> prepare($schema);
            $creerPage -> execute(array($this->dossier, $this->titre, $this->texte, $this->type, $this->estAffiche, $this->url, $this->tiny_url, $this->style, $this->date, $this->auteur));
        }

    }

?>