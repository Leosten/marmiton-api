<?php
require("api_create_init.php");
$recipe = json_decode(file_get_contents('php://input'), true);
if ($createRecipe->insertRecipeName($db, $recipe))
{
	echo("OK recipename");
}
else
{
	echo("Nope");
}
// var_dump($recipe);
// {
// 	if ($new_recipe_id = $createRecipe->getNewRecipeId($db, $recipe['nom']))
// 	{
// 		$createRecipe->insertRecipeDetails($db, $recipe, $new_recipe_id);
// 	}
// }
// ob_end_flush();