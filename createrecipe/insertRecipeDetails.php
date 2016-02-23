<?php
require("api_create_init.php");
$recipe_details = json_decode(file_get_contents('php://input'), true);
$recipe_name = $recipe_details['nom'];
if ($createRecipe->insertRecipedetails($db, $recipe_details, $recipe_name))
{
	echo("OK recipename");
}
else
{
	echo("Nope");
}