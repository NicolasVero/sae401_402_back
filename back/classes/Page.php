<?php

    final class Page {

        const PATH = './back/pages/';

        private string $dossier;
        private string $titre;
        private string $texte;
        private string $type;
        private string $style;
        private string $url;
        private string $tiny_url;
        private string $date;
        private string $auteur;
        private bool $estAffiche;

        public function __construct(string $dossier, string $titre, string $texte, string $type, string $url, string $style, string $auteur) {

            $this->dossier    = $dossier;
            $this->titre      = $titre;
            $this->texte      = $texte;
            $this->type       = $type;
            $this->style      = $style;
            $this->url        = self::PATH . Page::spaceToDash($this->dossier);
            $this->tiny_url   = $url;
            $this->date       = Page::donnerDate();
            $this->auteur     = $auteur;
            $this->estAffiche = true;
        }

        private static function donnerDate() {
            date_default_timezone_set('Europe/Paris');
            return date('y-m-d h:i:s');
        }

        public static function spaceToDash(string $s):string {

            return strtolower(str_replace(" ", "-", $s));
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

        public function getDossier() {
            return $this->dossier;
        }

        public function getResume() {
            include '../scripts/connect_bdd.php';

            $schema = "SELECT contenu, id FROM pages WHERE dossier = ?";
            $requete = $db -> prepare($schema);
            $requete -> execute(array($this->dossier));

            $dossier_infos = $requete -> fetch();
            echo $dossier_infos['contenu'];   

            $tiny = substr($dossier_infos['contenu'], 0, 150);
            $tiny .= "</p>";

            $schema = "UPDATE pages SET tiny_contenu = ? WHERE dossier = ?";
            $requete = $db -> prepare($schema);
            $requete -> execute(array($tiny, $this->dossier));

        }

        public function remplir_bdd() {

            include '../scripts/connect_bdd.php';

            $schema = "INSERT INTO pages(dossier, titre, contenu, type, affiche, url, tiny_url, style, date, auteur) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $creerPage = $db -> prepare($schema);
            $creerPage -> execute(array($this->dossier, $this->titre, $this->texte, $this->type, $this->estAffiche, $this->url, $this->tiny_url, $this->style, $this->date, $this->auteur));
        }

    }

?>