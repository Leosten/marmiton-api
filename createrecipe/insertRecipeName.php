<?php

require("api_create_init.php");

if isset($_POST['newrecipe'])
{
	$response = json_decode($_POST['newrecipe'], true);
	$createRecipe->insertRecipeName($db, $response);
}