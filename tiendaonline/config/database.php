<?php

    class Database{
        private $server = "localhost";
        private $database = "tienda";
        private $user = "root";
        private $password = "";
        private $charset = "utf8";
    

    function conectar(){
        try{
            $conect = "mysql:host=" . $this->server . "; dbname=" . $this->database . "; charset=" . $this->charset;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false            
            ];

            $pdo = new PDO($conect, $this->user, $this->password, $options);

            return $pdo;
        }   catch(PDOException $e){
                echo'Error conexion:' . $e->getMessage();
                exit;

            }
        }
    }
        

?>