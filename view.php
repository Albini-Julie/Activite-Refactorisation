<?php

// On inclue le code de controller.php dans notre fichier view
require "controller.php";

// On initialise les variables de connexion à la base de données
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pokemon_db";

// On créé la classe controller, on demande la connexion à la base de données et on envoie la requete de récupération des pokemons
$controller = new getPokemons();
$controller->connectBD($servername, $username, $password, $dbname);
$controller->requete();

// On parcourt les résultats reçus par le controller et on les affiche dans la view
if ($controller->result->num_rows > 0) {
  // Output data of each row
  while($row = $controller->result->fetch_assoc()) {
    echo "<h2>" . $row["name"]. "</h2><p>" . $row["type"] . "</p>";
  }
} else {
  echo "0 results";
}

?>
