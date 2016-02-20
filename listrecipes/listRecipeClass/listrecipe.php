<?php

// Méthodes pour afficher les recettes

class recipeDisplay
{
	private $result;

	public function returnToJson($raw_result)
	{
		$encoded_result = json_encode($raw_result);
		$result = $encoded_result;
		return $result;
	}

	public function listRecipeName($connection)
	{
		$response = $connection->query("SELECT ID, nom, image_url FROM marmiton.recettes");
		$raw_result = $response->fetchAll();
		return $this->returnToJson($raw_result);
	}

	public function getFullRecipe($connection, $recipe_name)
	{
		$id_recette = $connection->query("SELECT ID FROM marmiton.recettes WHERE nom='".$recipe_name."'");
		$id_recette = $id_recette->fetch();
		$id_recette = $id_recette[0];
		$table_recette = $connection->query("SELECT
											nom,
											preparation,
											remarque
											FROM
											marmiton.recettes,
											marmiton.texte,
											WHERE texte.ID_recette='".$id_recette."'
											AND recettes.ID='".$id_recette."'");
		$table_recette = $table_recette->fetch();
		return $this->returnToJson($table_recette);
	}

	public function getIngredients($connection, $recipe_name)
	{
		$id_recette = $connection->query("SELECT ID FROM marmiton.recettes WHERE nom='".$recipe_name."'");
		$id_recette = $id_recette->fetch();
		$id_recette = $id_recette[0];
		$recette_ingredients = $connection->query("SELECT
												nom,
												quantite,
												unite
												FROM 
												marmiton.ingredients
												WHERE ingredients.ID_recette='".$id_recette."'");
		$recettes_ingredients = $recettes_ingredients->fetchAll();
		return $this->returnToJson($recettes_ingredients);
	}
}
?>
