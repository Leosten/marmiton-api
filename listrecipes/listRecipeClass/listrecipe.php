<?php

// Méthodes pour afficher les recettes

class recipeDisplay
{
	static function listRecipeName($connection)
	{
		$result = $connection->query("SELECT nom, image_url FROM marmiton.recettes");
		return $result->fetchAll();
	}
}
?>
