<?php

require "model.php";

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pokemon_db";

class getPokemons{

    public $bd;
    public $result;

    public function requete(){
        // Fetch data from database
        $sql = "SELECT id, name, type FROM pokemons";
        $this->result = $this->bd->conn->query($sql);
    }

    public function connectBD(){
        $this->bd = new bdConnect();
        $this->bd->connexion("localhost", "username", "password", "pokemon_db");
    }
}



?>