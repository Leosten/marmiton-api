<?php

class createRecipe
{
	public function getRecipeId($connection, $recipe_name)
	{
		$recipe_id = $connection->query("SELECT ID FROM marmiton.recettes WHERE nom='".$recipe_name."'");
		$recipe_id = $recipe_id->fetch();
		return $recipe_id[0];
	}

	public function insertRecipeName($connection, $recipe)
	{
		$recipe_exec = $connection->query("INSERT INTO marmiton.recettes (nom, niveau, image_url, categorie, tags, pseudo, mail)
											VALUES ('".$recipe['nom']."',
											'".$recipe['niveau']."',
											'".$recipe['image_url']."',
											'".$recipe['categorie']."',
											'".$recipe['tags']."',
											'".$recipe['pseudo']."',
											'".$recipe['mail']."')");
	}

	public function insertRecipeIngredients($connection, $recipe_ingredients, $recipe_name)
	{
		$recipe_id = $this->getRecipeId($connection, $recipe_name);
		foreach ($recipe_ingredients['ingredients'] as $value)
		{
			$connection->query("INSERT INTO marmiton.ingredients (nom, quantite, unite, ID_recette)
											VALUES ('".$value['nom']."',
													'".$value['quantite']."',
													'".$value['unite']."',
													'".$recipe_id."')");
		}
	}

	public function insertRecipeDetails($connection, $recipe_details, $recipe_name)
	{
		$recipe_id = $this->getRecipeId($connection, $recipe_name);
		$recipe_details = $connection->query("INSERT INTO marmiton.texte (preparation, remarque, ID_recette)
												VALUES ('".$recipe_details['preparation']."',
														'".$recipe_details['remarque']."',
														'".$recipe_id."')");
	}

	public function insertUserComments($connection, $user_comments, $recipe_id)
	{
		$recipe_details = $connection->query("INSERT INTO marmiton.user_comments (pseudo, texte, rating, ID_recette)
											VALUES ('".$user_comments['pseudo']."',
													'".$user_comments['texte']."',
													'".$user_comments['rating']."',
													'".$recipe_id."')");
	}
}