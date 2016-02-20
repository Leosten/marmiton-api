<?php
// Fichier appelé par angular et renvoie du JSON;

// return:
// - nom
// - preparation
// - remarque

require ("api_send_init.php");

$recipe_id = $_GET['recipeid'];
echo $recipeDisplay->getFullRecipe($db, $recipe_id);