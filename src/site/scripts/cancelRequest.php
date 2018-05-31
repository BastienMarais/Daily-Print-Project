<?php

	// Import des fonctions 
include("./functions.php"); 	
foreach ($_POST['annuler'] as $valeur){
	$arg_new_state = 'Annulée';
	request_state_change($valeur, $arg_new_state);
}

?>