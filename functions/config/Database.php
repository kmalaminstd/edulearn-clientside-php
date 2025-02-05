<?php

    class Database {

        private $dbhost = 'localhost';
        private $dbname = 'eduwebbackend';
        private $dbuser = 'user';
        private $dbpass = '';
 
        public $conn;

        public function connect(){

            try{

                $dsn = "mysql:host=$this->dbhost;dbname=$this->dbname";
                $this->conn = new PDO($dsn, $this->dbuser, $this->dbpass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

            }catch(Exception $e){
                echo $e;
            }
        }
    }

?>