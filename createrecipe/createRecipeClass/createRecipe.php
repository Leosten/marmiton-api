<?php

class createRecipe
{
	private $JsonResult

	public function processJsonPost($JsonObject)
	{
		$JsonObject = json_decode($JsonObject, true);
	}

	public function insertRecipeName($connection, $recipe)
	{
		$recipe_data = $connection->query("INSERT INTO marmiton.recettes (nom, niveau, image_url)
											VALUES ('".$recipe['nom']."',
											'".$recipe['niveau']."',
											'".$recipe['image_url']."')");
	}
}