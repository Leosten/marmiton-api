<?php
// Fichier appelé par angular et renvoie du JSON;

// return:
// - pseudo
// - texte
// - rating

require ("api_send_init.php");

$recipe_id = $_GET['recipeid'];
echo $recipeDisplay->getUserComments($db, $recipe_id);