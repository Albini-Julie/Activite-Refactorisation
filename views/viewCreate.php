
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Pokémon</title>
</head>
<body>

    <!-- Formulaire pour entrer l'ID, le nom et le type du Pokémon -->
    <form method="POST" action="">
        <label>Entrez l'ID de votre Pokémon :</label>
        <input type="text" name="pokemon_id" placeholder="ID du Pokémon" required>
        <label>Entrez le nom de votre Pokémon :</label>
        <input type="text" name="pokemon_name" placeholder="Nom du Pokémon" required>
        <label>Entrez le type de votre Pokémon :</label>
        <input type="text" name="pokemon_type" placeholder="Type du Pokémon" required>
        <button type="submit">Créer</button>
    </form>

    <?php

// Traiter les données si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les infos du Pokémon
    $pokemon_id = htmlspecialchars($_POST["pokemon_id"]);
    $pokemon_name = htmlspecialchars($_POST["pokemon_name"]);
    $pokemon_type = htmlspecialchars($_POST["pokemon_type"]);

    // On inclue le code de controller.php dans notre fichier view
    require "../controller/controller.php";

    // On initialise les variables de connexion à la base de données
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "pokemon_db";

    // On créé la classe controller, on demande la connexion à la base de données et on envoie la fonction createPokemon de création du pokemon
    $controller = new ActionPokemons();
    $controller->connectBD($servername, $username, $password, $dbname);
    $controller->createPokemon('pokemons', $pokemon_id, $pokemon_name, $pokemon_type);
    if ($controller) {
        // Affichage de l'alerte de succès si la requête à aboutie
        echo '<script language="Javascript">
        alert ("Le Pokémon a été créé avec succès !" )
        </script>';
    } else {
        // Affichage de l'alerte erreur si la requête à échoué
        echo '<script language="Javascript">
        alert ("Erreur" )
        </script>';
    }
}
?>

</body>
</html>