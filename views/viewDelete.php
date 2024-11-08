
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression Pokémon</title>
</head>
<body>

    <!-- Formulaire pour entrer l'ID du Pokémon -->
    <form method="POST" action="">
        <label>Entrez l'ID du pokémon que vous voulez supprimer :</label>
        <input type="text" name="pokemon_id" placeholder="ID du Pokémon" required>
        <button type="submit">Supprimer</button>
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

    // On créé la classe controller, on demande la connexion à la base de données et on envoie la fonction deletePokemon de suppression du pokemon
    $controller = new ActionPokemons();
    $controller->connectBD($servername, $username, $password, $dbname);
    $controller->deletePokemon('pokemons', $pokemon_id);

    if ($controller) {
        // Affichage de l'alerte de succès si la requête à aboutie
        echo '<script language="Javascript">
        alert ("Le Pokémon numéro ' . $pokemon_id . ' a été supprimé avec succès !" )
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