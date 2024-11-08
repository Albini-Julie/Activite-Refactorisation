<?php

// La classe bdConnect permet la connexion à la base de données grâce à sa fonction connexion
// Permet de questionner la base de données grâce à ses nombreuses fonctions
class bdConnect{

    public $conn;
    public $result;
    
    // Permet la connexion à la base de données
    // La fonction connexion prend en paramètres les informations de connexion à la base de données
    public function connexion($servername, $username, $password, $dbname){
        // Créer la connexion
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifie la connexion
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    // Sélectionner tous les éléments d'une base de données
    public function getAll($bdd){
        // Requete
        $sql = "SELECT id, name, type FROM $bdd";
        $this->result = $this->conn->query($sql);
    }

    // Sélectionner un seul élément de la base de données grâce à son id
    public function getOne($bdd, $id){
        // Requete
        $sql = "SELECT id, name, type FROM $bdd WHERE id = $id";
        $this->result = $this->conn->query($sql);
    }

    // Créer un nouvel élément dans la base de données
    // Prend en argument l'id, le nom et le type de cet élément
    public function create($bdd, $id, $name, $type){
        // Requete
        $sql = "INSERT INTO $bdd (id, name, type) VALUES ($id, '$name', '$type')";
        $this->result = $this->conn->query($sql);
    }

    // Modifié un élément grâce à son id
    // Prend en argument l'id de l'élément à modifier, son nouvel id, son nouveau nom et son nouveau type
    public function update($bdd, $id_new, $id, $name, $type){
        // Requete
        $sql = "UPDATE $bdd SET id = $id, name = '$name', type = '$type' WHERE id = $id_new";
        $this->result = $this->conn->query($sql);
    }

    // Permet de supprimer un élément grâce à son id
    public function delete($bdd, $id){
        // Requete
        $sql = "DELETE FROM $bdd WHERE id = $id";
        $this->result = $this->conn->query($sql);
    }
}

?>