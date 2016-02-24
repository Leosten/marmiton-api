<?php

// Méthodes pour afficher les recettes

class recipeDisplay
{
	public function returnToJson($raw_result)
	{
		$encoded_result = json_encode($raw_result, JSON_PRETTY_PRINT);
		return $encoded_result;
	}

	public function listRecipeName($connection)
	{
		$response = $connection->query("SELECT ID, nom, image_url FROM marmiton.recettes");
		$raw_result = $response->fetchAll();
		return $this->returnToJson($raw_result);
	}

	public function getFullRecipe($connection, $recipe_id)
	{
		$table_recette = $connection->query("SELECT
											recettes.ID,
											recettes.nom,
											recettes.niveau,
											recettes.pseudo,
											recettes.mail,
											recettes.image_url,
											texte.preparation,
											texte.remarque
											FROM
											marmiton.recettes,
											marmiton.texte
											WHERE texte.ID_recette='".$recipe_id."'
											AND recettes.ID='".$recipe_id."'");
		$table_recette = $table_recette->fetch();
		return $this->returnToJson($table_recette);
	}

	public function getIngredients($connection, $recipe_id)
	{
		$recette_ingredients = $connection->query("SELECT
												nom,
												quantite,
												unite
												FROM
												marmiton.ingredients
												WHERE ingredients.ID_recette='".$recipe_id."'");
		$recette_ingredients = $recette_ingredients->fetchAll();
		return $this->returnToJson($recette_ingredients);
	}

	public function getUserComments($connection, $recipe_id)
	{
		$user_comments = $connection->query("SELECT
											pseudo,
											texte,
											rating
											FROM
											marmiton.user_comments
											WHERE
											user_comments.ID_recette='".$recipe_id."'");
		$user_comments = $user_comments->fetchAll();
		return $this->returnToJson($user_comments);
	}

	public function advancedSearch($connection)
	{
		$search_results = $connection->query("SELECT
											recettes.ID,
											recettes.nom,
											recettes.niveau,
											recettes.pseudo,
											recettes.categorie,
											recettes.tags,
											texte.remarque
											FROM
											marmiton.recettes,
											marmiton.texte");
		$search_results = $search_results->fetchAll();
		return $this->returnToJson($search_results);
	}
}