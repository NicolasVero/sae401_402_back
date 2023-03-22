<?php

    final class GeneratePage {

        const PATH = '../pages/';

        private string $pageTitle;
        private string $title;
        private string $content;
        private string $dossier;
    
        public function __construct(string $dossier, string $title, string $content) {

            $this->pageTitle = $this->spaceToDash($title);
            $this->title     = $dossier;
            $this->content   = $content;
            $this->dossier   = $this->spaceToDash($dossier);
        }

        public function spaceToDash(string $s):string {
            return strtolower(str_replace(" ", "-", $s));
        }

        public function getDossier():string {
            return $this->dossier;
        }

        public function generateFolder() {
            
            if(!file_exists(self::PATH . $this->dossier)) 
                return mkdir(self::PATH . $this->dossier);

            return false;
        }


        public function generateImagesFolder():void {

            mkdir(self::PATH . $this->dossier . "/images/");
        }

        public function generateHTMLFile():void {

            $open = fopen(self::PATH  . $this->dossier . '/index.html', 'w');
            // $open = fopen(self::PATH  . $this->dossier . "/" . $this->pageTitle . '.html', 'w');
            fwrite($open, $this->buildHTML());
            fclose($open);
        }

        private function buildHTML():string {

            $html  = $this->completeHTMLHeader();
            $html .= "<h1>" . $this->title . "</h1>";
            $html .= $this->completeHTMLMain();
            $html .= $this->content;
            $html .= $this->completeHTMLFooter();

            return $html;
        }

        private function completeHTMLHeader():string {

            return "
                <!DOCTYPE html>
                <html>
                <head>
                    <link rel='shortcut icon' type='image/png' href='../../img/favicon.png'>
                    <link rel='stylesheet' href='../styles/page-style.css'>
                    <meta charset='UTF-8'>
                    <title>" . $this->title . "</title>
                </head>
                <body>
            ";
        }

        private function completeHTMLMain():string {
            return "
                <main>
            ";
        }

        private function completeHTMLFooter():string {

            include 'connect_bdd.php';

            $schema = $db -> prepare('SELECT date, auteur FROM pages WHERE dossier LIKE ?');
            $schema -> execute(array($this->dossier));


            $infos = $schema -> fetch(); 
            echo $schema -> rowCount();

            echo "<b>page : " . $this->dossier . "</b><br>";
            
            echo "infos fetch : ";
            print_r($infos);
            

            return "
                </main>

                <footer>
                    <p>Fait le " . $infos['date'] . " par " . $infos['auteur'] . "</p>
                </footer>
                
                </body>
                </html>
            ";
        }

        public function getUrl():string {
            return $this->pageTitle . ".html";
        }

        public function redirectOnPage():void {
            header("Location: " . self::PATH . $this->pageTitle . ".html");
        }

    }

?>