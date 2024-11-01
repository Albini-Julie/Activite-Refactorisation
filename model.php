<?php

// La classe bdConnect permet la connexion à la base de données grâce à sa fonction connexion
// La fonction connexion prend en paramètres les informations de connexion à la base de données
class bdConnect{

    public $conn;

    public function connexion($servername, $username, $password, $dbname){
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
}

?>