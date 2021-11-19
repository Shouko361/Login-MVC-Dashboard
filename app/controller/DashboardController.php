<?php

    Class DashboardController{

        public function index(){
            
            echo 'Logado com sucesso! <a href="http://localhost/mvc/dashboard/logout">Sair</a>';
            
        }

        public function logout(){

            unset($_SESSION['id']);
            session_destroy();

            header('location: http://localhost/mvc/login');

        }

    }

?>