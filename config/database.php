<?php

class Database{

    // especificando database
    private $host = "localhost";
    private $db_name = "api";
    private $username = "root";
    private $password = "123456";
    private $conn;

    // connect
    public function getConnection(){

        $this->conn = null;

        try{

            $this->conn = new PDO("mysql:host = " . $this->host . 
            ";dbname=" . $this->db_name,
            $this->username, 
            $this->password);

            $this->conn->exec("set name utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
        }
}

?>