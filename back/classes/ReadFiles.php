<?php

    class ReadFiles {

        // const FOLDER_NAME = './pages';

        private string $folder_name;
        private $scandir;

        public function __construct(string $folder_name) {

            $this->folder_name = $folder_name;
            $this->scandir = scandir($this->folder_name);
            // $this->scandir = scandir(self::FOLDER_NAME);
        }

        public function viewFolders() {

            print_r($this->scandir);
        }

        public function getFolders() {

            $files = array();

            foreach($this->scandir as $fichier)
                if($fichier != "." && $fichier != "..")
                    $files[] = $fichier;

            return $files;
        }

        public function viewAllFiles() {
            
            foreach($this->scandir as $fichier)
                echo "$fichier<br/>";
        }

        public function getAllFiles() {

            $files = array();

            foreach($this->scandir as $fichier)
                $files[] = $fichier;

            return $files;
        }

        public function viewHTMLFiles() {
            
            foreach($this->scandir as $fichier)             
                if(preg_match("/.html$/", $fichier) >= 1) 
                    echo "$fichier<br/>";
        }

        public function getHTMLFiles() {

            $files = array();

            foreach($this->scandir as $fichier)
                if(preg_match("/.html$/", $fichier) >= 1) 
                    $files[] = $fichier;

            return $files;
        }
    }

?>