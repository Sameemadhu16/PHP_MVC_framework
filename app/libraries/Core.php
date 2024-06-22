<?php
    class Core{
        //URL format -> /controller/method/params
        protected $currentController = 'Pages';
        protected $CurrentMethod = 'index';
        protected $param = [];
        
        public function __construct(){
            $this->getURL();
        }

        public function getURL(){
            echo $_GET['url'];
        }

    }
?>