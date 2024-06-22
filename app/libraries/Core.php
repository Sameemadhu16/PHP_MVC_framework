<?php
    class Core{
        //URL format -> /controller/method/params
        protected $currentController = 'Pages';
        protected $CurrentMethod = 'index';
        protected $param = [];
        
        public function __construct(){
            //print_r($this->getURL());

            $url = $this->getURL();

            if(file_exists('../app/controllers/'.ucwords($url[0].'.php'))){
             //If the controller exists, then load it
            $this->currentController = ucwords($url[0]);

            //Unset the controller in the URL
            unset($url);

            //Call the controller in the URL
            require_once '../app/controllers/'.$this->currentController.'.php';

            //Instebtiate the controller
            $this->currentController = new $this->currentController;
            }
            
        }

        public function getURL(){
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);

                return $url;
            }
        }

    }
?>