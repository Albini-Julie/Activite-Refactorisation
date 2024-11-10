<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des pokémons</title>
    <!-- Lien vers la feuille de style CSS -->
    <link rel="stylesheet" href="../style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Jersey+10&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">
</head>

<body>
  <h1 class="pokemon__title">Voici la liste de tous les pokémons que tu possédes :</h1>
  <!--Bouton de retour vers la page d'accueil-->
  <div class="pokemon__bloc --button">
    <a href="../index.html"><button>Accueil</button></a>
  </div>
</body>

</html>

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
    echo "<div class='pokemon__bloc'><h4 class='pokemon__name'>" . $row["name"]. " : </h4><p class='pokemon__type'>" . $row["type"] . "</p></div>";
  }
} else {
  echo "<h4 class='pokemon__name --erreur'>0 results</h4>";
}

?>
