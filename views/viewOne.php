
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Pokémon</title>
</head>
<body>

    <!-- Formulaire pour entrer l'ID du Pokémon -->
    <form method="POST" action="">
        <label>Entrez l'ID de votre Pokémon :</label>
        <input type="text" name="pokemon_id" placeholder="ID du Pokémon" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php

// Traiter la donnée si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer l'ID du Pokémon
    $pokemon_id = htmlspecialchars($_POST["pokemon_id"]);

    // On inclue le code de controller.php dans notre fichier view
    require "../controller/controller.php";

    // On initialise les variables de connexion à la base de données
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "pokemon_db";

    // On créé la classe controller, on demande la connexion à la base de données et on envoie la fonction getOnePokemon de récupération du pokemon
    $controller = new ActionPokemons();
    $controller->connectBD($servername, $username, $password, $dbname);
    $controller->getOnePokemon('pokemons', $pokemon_id);

    // On parcourt les résultats reçus par le controller et on les affiche dans la view
    if ($controller->results->num_rows > 0) {
    while($row = $controller->results->fetch_assoc()) {
        echo "<h2>" . $row["name"]. "</h2><p>" . $row["type"] . "</p>";
    }
    } else {
    echo "0 results";
    }
}
?>

</body>
</html>