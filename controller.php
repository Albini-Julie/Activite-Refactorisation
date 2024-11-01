<?php

// On inclue le code de model.php dans notre fichier controller
require "model.php";

// La classe getPokemons demande la connexion à la base de données grâce à sa fonction connectBD 
// Elle questionne la base de données via sa fonction requete
class getPokemons{

    public $bd;
    public $result;

    public function connectBD($servername, $username, $password, $dbname){
        $this->bd = new bdConnect();
        $this->bd->connexion($servername, $username, $password, $dbname);
    }

    public function requete(){
        // Fetch data from database
        $sql = "SELECT id, name, type FROM pokemons";
        $this->result = $this->bd->conn->query($sql);
    }
}



?>