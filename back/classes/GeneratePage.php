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

        public function generateHTMLFile($images = null):void {

            $open = fopen(self::PATH  . $this->dossier . '/index.html', 'w');
            fwrite($open, $this->buildHTML($images));
            fclose($open);
        }

        public function generateCSSFile():void {

            $open = fopen(self::PATH  . $this->dossier . '/style.css', 'w');
            fwrite($open, $this->buildCSS());
            fclose($open);
        }

        private function buildHTML($images):string {

            $html  = $this->completeHTMLHeader();
            $html .= "<h1>" . $this->title . "</h1>";
            $html .= $this->completeHTMLMain();
            $html .= $this->content;
            $html .= $this->completeHTMLFooter($images);

            return $html;
        }

        private function buildCSS():string {

            return "
                @import url('https://fonts.cdnfonts.com/css/gotham');

                :root {
                    --violet: #44358B;
                    --bleu: #7175B6;
                    --jaune: #FBB800;
                    --orange: #F18715;
                    --rouge: #EB5E25;
                }
                
                *, *:before, *:after {
                    box-sizing: border-box;
                }
                
                html, body {
                    margin: 0;
                    padding: 0;
                    font-family: 'Gotham', 'sans-serif';
                    font-size: 1.1rem;
                    color: var(--violet);
                    background-color: #ededed;
                }
                
                main {
                    margin: 0 12vw;
                }
                
                h1, h2, h3, h4, h5, h6 {
                    text-align: center;
                }
                
                footer {
                    text-align: right;
                    margin-right: 12vw;
                    font-style: italic;
                }
            ";
        }

        private function completeHTMLHeader():string {

            return "
                <!DOCTYPE html>
                <html>
                <head>
                    <link href='../../styles/popup-style.css' rel='stylesheet'>
                    <link rel='shortcut icon' type='image/png' href='../../img/favicon.png'>
                    <link rel='stylesheet' href='style.css'>
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

        private function completeHTMLFooter($images):string {

            include 'connect_bdd.php';

            $string = "";

            if($images != null) {
                $string .= "<section class='gallery' style='display: flex; flex-wrap: wrap; gap: 15px;'>";
                foreach($images as $image) 
                   $string .= "<img style='max-width: 500px; max-height: 450px; object-fit: cover;' class='gallery-images' src='images/$image' alt=''>";
            
                $string .= "</section>";
                $string .= "<div class='popup-image'><span>&times;</span><img src='' alt=''></div>";

                $schema = $db -> prepare('UPDATE pages SET galerie = ? WHERE dossier LIKE ?');
                $schema -> execute(array($string, $this->dossier));
            }

            $schema = $db -> prepare('SELECT date, auteur, galerie FROM pages WHERE dossier LIKE ?');
            $schema -> execute(array($this->dossier));
            $infos = $schema -> fetch();           

            return 
                $infos['galerie'] .
                "</main>
                <script src='../../scripts/images.js'></script>
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