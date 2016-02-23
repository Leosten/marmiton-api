<?php
require("api_create_init.php");
$user_comments = json_decode(file_get_contents('php://input'), true);
$recipe_id = $user_comments['ID_recette'];
if ($createRecipe->insertUserComments($db, $user_comments, $recipe_id))
{
	echo("OK usercomments");
}
else
{
	echo("Nope");
}