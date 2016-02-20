<?php

class createRecipe
{
	private $JsonResult

	public function processJsonPost($JsonObject)
	{
		$JsonObject = json_decode($JsonObject);
		var_dump($JsonObject);
	}
}