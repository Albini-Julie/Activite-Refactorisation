<?php

// On inclue le code de controller.php dans notre fichier view
require "../controller/controller.php";

// On initialise les variables de connexion à la base de données
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "pokemon_db";

// On créé la classe controller, on demande la connexion à la base de données et on envoie la fonction getAllPokemons de récupération des pokemons
$controller = new ActionPokemons();
$controller->connectBD($servername, $username, $password, $dbname);
$controller->getAllPokemons('pokemons');

// On parcourt les résultats reçus par le controller et on les affiche dans la view
if ($controller->results->num_rows > 0) {
  while($row = $controller->results->fetch_assoc()) {
    echo "<h2>" . $row["name"]. "</h2><p>" . $row["type"] . "</p>";
  }
} else {
  echo "0 results";
}

?>
