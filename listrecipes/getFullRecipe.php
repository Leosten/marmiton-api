<?php
// Fichier appelé par angular et renvoie du JSON;

require ("api_send_init.php");

$recipe_name = $_GET['recipe'];

echo $recipeDisplay->getFullRecipe($db, $recipe_name);
