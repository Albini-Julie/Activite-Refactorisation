<?php

// On inclue le code de model.php dans notre fichier controller
require "../model/model.php";

// La classe ActionPokemon demande la connexion à la base de données grâce à sa fonction connectBD 
// Elle questionne la base de données via ses différentes fonctions qui prennent en argument le nom de cette base de données
class ActionPokemons{

    public $bd;
    public $results;

    // Permet la connexion
    public function connectBD($servername, $username, $password, $dbname){
        $this->bd = new bdConnect();
        $this->bd->connexion($servername, $username, $password, $dbname);
    }

    // getAllPokemons permet d'avoir la liste de tous les pokémons
    public function getAllPokemons($bdd){
        if($this->bd){
        $this->bd->getAll($bdd);
        $this->results = $this->bd->result;
        }
    }

    // getOnePokemon permet d'obtenir les informations d'un seul pokémon grâce à son id
    public function getOnePokemon($bdd, $id){
       if($this->bd){
        $this->bd->getOne($bdd, $id);
        $this->results = $this->bd->result;
       }
    }

    // createPokemon permet de créer un pokémon en prenant en argument son id, son nom et son type
    public function createPokemon($bdd, $id, $name, $type){
        if($this->bd){
            $this->bd->create($bdd, $id, $name, $type);
            $this->results = $this->bd->result;
        }
    }

    // updatePokemon permet de modifier un pokémon sélectionné grâce à son id. Elle prend en paramètre son nouveau id, son nouveau nom et son nouveau type
    public function updatePokemon($bdd, $id_new, $id, $name, $type){
        if($this->bd){
            $this->bd->update($bdd, $id_new, $id, $name, $type);
            $this->results = $this->bd->result;
        }
    }

    // deletePokemon permet de supprimer un pokémon grâce son id
    public function deletePokemon($bdd, $id){
        if($this->bd){
            $this->bd->delete($bdd, $id);
            $this->results = $this->bd->result;
        }
    }
}



?>