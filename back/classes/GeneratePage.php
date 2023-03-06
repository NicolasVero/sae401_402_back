<?php

    final class GeneratePage {

        const PATH = '../pages/';

        private string $pageTitle;
        private string $title;
        private string $content;
    
        public function __construct(string $title, string $content) {

            $this->pageTitle = $this->spaceToDash($title);
            $this->title     = $title;
            $this->content   = $content;
        }

        public function spaceToDash(string $s):string {

            return strtolower(str_replace(" ", "-", $s));
        }

        //! return bool ? 
        public function generateFolder() {
            
            if(!file_exists(self::PATH . $this->pageTitle)) 
                return mkdir(self::PATH . $this->pageTitle);

            return false;
        }


        public function generateImagesFolder():void {

            mkdir(self::PATH . $this->pageTitle . "/images/");
        }

        public function generateHTMLFile():void {

            $open = fopen(self::PATH  . $this->pageTitle . "/" . $this->pageTitle . '.html', 'w');
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
                    <link rel='stylesheet' href='../styles/page-style.css'>
                    <title>Test</title>
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

            return "
                </main>

                <footer>
                <p>Infos a venir</footer>
                <footer>

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