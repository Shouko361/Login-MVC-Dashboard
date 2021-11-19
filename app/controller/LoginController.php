<?php

    Class LoginController{

        public function index(){
            $loader = new \Twig\Loader\FilesystemLoader('app/view');
            $twig = new \Twig\Environment($loader);
            $template = $twig->load('login.html',['auto_reload' =>true]);
            $params['error'] = $_SESSION['msg_error'] ?? null;

            return $template->render($params);

        }

        public function check(){
            try {
                $user = new User;
                $user->setEmail($_POST['email']);
                $user->setPass($_POST['senha']);
                $user->validateLogin();

                header('location: http://localhost/mvc/dashboard');

            } catch (\Exception $e) {
                header('location: http://localhost/mvc/login');
            }


        }

    }

?>