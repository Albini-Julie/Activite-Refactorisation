
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression Pokémon</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Jersey+10&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
        rel="stylesheet">
</head>
<body class="pokemon">
        <h1 class="pokemon__title">Supprimer un pokémon</h1>
        <h2 class="pokemon__subtitle">Supprimez un pokémon de votre pokédex !</h2>
        <!--Bouton de retour vers la page d'accueil-->
        <div class="pokemon__bloc --button">
            <a href="../index.html"><button>Accueil</button></a>
        </div>
    <!-- Formulaire pour entrer l'ID du Pokémon -->
    <form method="POST" action="">
        <!--Champs pour entrer l'id du pokemon à supprimer-->
        <div class="pokemon__bloc">
            <label>Entrez l'ID du pokémon que vous voulez supprimer :</label>
            <input type="text" name="pokemon_id" placeholder="ID du Pokémon" required>
        </div>
        <!--Bouton pour confirmer la suppression du pokemon-->
        <div class="pokemon__bloc --button">
            <button class="pokemon__delete" type="submit">Supprimer</button>
        </div>
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