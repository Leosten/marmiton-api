<?php
header('Access-Control-Allow-Origin: *');
require("../config.php");
require ("createRecipeClass/createRecipe.php");
$createRecipe = new createRecipe;