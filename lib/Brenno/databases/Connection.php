<?php

    namespace Brenno\databases;

    abstract Class Connection{

        private static $conn;

        public static function getConn(){

            if(!self::$conn){
                self::$conn = new \PDO('mysql: host=localhost; dbname=login', 'root', 'qwe123@@');
            }

            return self::$conn;
        }
    }

?>