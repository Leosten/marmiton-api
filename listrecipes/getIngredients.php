<?php
require ("api_send_init.php");

$recipe_id = $_GET['recipeid'];
echo $recipeDisplay->getIngredients($db, $recipe_id);