
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Créer un Pokémon</title>
        <link rel="stylesheet" href="../style.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Jersey+10&family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
            rel="stylesheet">
    </head>
    <body>
        <h1 class="pokemon__title">Ajouter un pokémon</h1>
        <h2 class="pokemon__subtitle">Ajoutez un pokémon à votre pokédex !</h2>
        <!--Bouton de retour vers la page d'accueil-->
        <div class="pokemon__bloc --button">
            <a href="../index.html"><button>Accueil</button></a>
        </div>
        <!-- Formulaire pour entrer l'ID, le nom et le type du Pokémon -->
        <form method="POST" action="">
            <!--Champs pour entrer l'id du pokemon-->
            <div class="pokemon__bloc">
                <label>Entrez l'ID de votre Pokémon :</label>
                <input type="text" name="pokemon_id" placeholder="ID du Pokémon" required>
            </div>
            <!--Champs pour entrer le nom du pokemon-->
            <div class="pokemon__bloc">
                <label>Entrez le nom de votre Pokémon :</label>
                <input type="text" name="pokemon_name" placeholder="Nom du Pokémon" required>
            </div>
            <!--Champs pour entrer le type du pokemon-->
            <div class="pokemon__bloc">
                <label>Entrez le type de votre Pokémon :</label>
                <div>
                    <input type="radio" id="Feu" name="pokemon_type" value="Feu" required />
                    <label for="Feu">Feu</label>
                </div>
                <div>
                    <input type="radio" id="Eau" name="pokemon_type" value="Eau" required/>
                    <label for="Eau">Eau</label>
                </div>
                <div>
                    <input type="radio" id="Electrique" name="pokemon_type" value="Electrique" required/>
                    <label for="Electrique">Electrique</label>
                </div>
                <div>
                    <input type="radio" id="Vole" name="pokemon_type" value="Vole" required/>
                    <label for="Vole">Vole</label>
                </div>
                <div>
                    <input type="radio" id="Psy" name="pokemon_type" value="Psy" required />
                    <label for="Psy">Psy</label>
                </div>
            </div>
            <!--Bouton pour confirmer l'ajout du pokemon dans la base de données-->
            <div class="pokemon__bloc --button">
                <button type="submit">Ajouter</button>
            </div>
        </form>
    </body>
</html>

    <?php

// Traiter les données si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les infos du Pokémon
    $pokemon_id = htmlspecialchars($_POST["pokemon_id"]);
    $pokemon_name = htmlspecialchars($_POST["pokemon_name"]);
    $pokemon_type = isset($_POST["pokemon_type"]) ? htmlspecialchars($_POST["pokemon_type"]) : null;

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