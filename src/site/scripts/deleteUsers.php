<?php

	// Import des fonctions 
include("../scripts/functions.php"); 													
foreach ($_POST['supprimer'] as $valeur){
	$table = 'REAL_USER';
	remove_user($valeur,$table);
}

	
?>
