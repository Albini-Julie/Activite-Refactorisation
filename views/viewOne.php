
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche Pokémon</title>
    <!-- Lien vers la feuille de style CSS -->
    <link rel="stylesheet" href="../public/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Jersey+10&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">
</head>
<body class="pokemon">

    <h1 class="pokemon__title">Rechercher un pokémon</h1>*
    <h2 class="pokemon__subtitle">Recherchez un pokémon en particulier :</h2>
    <!--Bouton de retour vers la page d'accueil-->
    <div class="pokemon__bloc --button">
        <a href="../index.html"><button>Accueil</button></a>
    </div>
    <!-- Formulaire pour entrer l'ID du Pokémon -->
    <form method="POST" action="">
        <!--Champs pour entrer l'id du pokemon à rechercher-->
        <label>Entrez l'ID de votre Pokémon :</label>
        <input type="text" name="pokemon_id" placeholder="ID du Pokémon" required>
        <!--Bouton pour lancer la recherche du pokemon-->
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
        echo "<div class='pokemon__bloc'><h4 class='pokemon__name'>" . $row["name"]. " : </h4><p class='pokemon__type'>" . $row["type"] . "</p></div>";
    }
    } else {
    echo "<h4 class='pokemon__name --erreur'>0 results</h4>";
    }
}
?>

</body>
</html>