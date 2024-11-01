<?php

require "controller.php";

$controller = new getPokemons();
$controller->connectBD();
$controller->requete();

if ($controller->result->num_rows > 0) {
  // Output data of each row
  while($row = $controller->result->fetch_assoc()) {
    echo "<h2>" . $row["name"]. "</h2><p>" . $row["type"] . "</p>";
  }
} else {
  echo "0 results";
}

?>
