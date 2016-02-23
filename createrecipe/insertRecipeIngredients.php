<?php
require("api_create_init.php");
$recipe_ingredients = json_decode(file_get_contents('php://input'), true);
$recipe_name = $recipe_ingredients['nom'];
if ($createRecipe->insertRecipeIngredients($db, $recipe_ingredients, $recipe_name))
{
	echo("OK recipeIngredients");
}
else
{
	echo("Nope");
}