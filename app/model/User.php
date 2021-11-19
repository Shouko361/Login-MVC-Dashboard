<?php

    use Brenno\databases\Connection;

    Class User{

        private $id;
        private $name;
        private $email;
        private $password;

        public function validateLogin(){
            //conect banco de dados
            //selecionar o usr == email e senha informados
            //coneferir senha
            //se estiver ok cria section e direct usr dashboard
            //se tive erro redirect pag login
            $conn = Connection::getConn();

            $sql = 'SELECT * FROM usuarios WHERE email = :email';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();

            if($stmt->rowCount()){
                $result = $stmt->fetch();

                if($result['senha'] === $this->password){
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['nome'] = $result['nome'];
                   return true;
                }
            }
            throw new Exception("Email ou Senha incorretos!");
            



        }

        public function setEmail($email){
            $this->email = $email;

        }

        public function setName($name){
            $this->name = $name;

        }

        public function setPass($password){
            $this->password = $password;

        }

        public function getEmail(){
            return  $this->email;
        }

        public function getName(){
            return  $this->name;
        }

        public function getPass(){
            return  $this->password;
        }
       


    }

?>