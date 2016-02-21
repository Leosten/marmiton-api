<?php

class createRecipe
{
	public function processJsonPost($JsonObject)
	{
		$JsonObject = json_decode($JsonObject, true);
		return $JsonObject;
	}

	public function insertRecipeName($connection, $recipe_main)
	{
		$this->processJsonPost($recipe_main);
		$recipe_main = $connection->query("INSERT INTO marmiton.recettes (nom, niveau, image_url)
											VALUES ('".$recipe['nom']."', 
											'".$recipe['niveau']."', 
											'".$recipe['image_url']."', 
											'".$recipe['categorie']."', 
											'".$recipe['tags']."')");
	}

	public function getNewRecipeId($connection, $new_recipe_name)
	{
		$new_recipe_id = $connection->query("SELECT ID FROM marmiton.recettes WHERE nom='".$new_recipe_name."'");
		return $new_recipe_id;
	}

	public function insertRecipeDetails($connection, $recipe_data, $recipe_id)
	{
		$recipe_data = $connection->query("INSERT INTO marmiton.ingredients (nom, quantite, unite)
											VALUES ('"$recipe_data['nom')
	}
}