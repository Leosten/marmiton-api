<?php
// Fichier appelé par angular, recoit des donnees POST et renvoie du JSON;

require ("api_send_init.php");

echo $recipeDisplay->listRecipeName($db);
