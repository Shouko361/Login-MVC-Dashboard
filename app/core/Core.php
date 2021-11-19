<?php

    Class Core{

        private $url;
        private $controller;
        private $mothod = 'index';
        private $params = array();

        private $user;

        public function __construct(){
            
            $this->user = $_SESSION['id'] ?? null;

        }

        public function start($request){

            if(isset($request['url'])){
                $this->url = explode('/', $request['url']);

                $this->controller = ucfirst($this->url[0]).'Controller';
                array_shift($this->url);

                if(isset($this->url[0])){
                    $this->method = $this->url[0];
                    array_shift($this->url);

                    if(isset($this->url[0])){
                        $this->params = $this->url[0];
                    }
                    else{
                        $this->params = 'index';
                    }

                }else{
                    $this->method = 'index';
                }
            }else{
                $this->controller = 'LoginController';
                $this->method = 'index';
            }
            if($this->user){
                $pg_permission = ['DashboardController'];
                if(!isset($this->controller) || !in_array($this->controller, $pg_permission)){
                
                    $this->controller = 'DashboardController';
                    $this->method = 'index';
                }
            }
            else{
                $pg_permission = ['LoginController'];

                if(!isset($this->controller) || !in_array($this->controller, $pg_permission)){

                    $this->controller = 'LoginController';
                    $this->method = 'index';
                }                
            }

            echo call_user_func(array(new $this->controller, $this->method), $this->params);
        }

    }

?>