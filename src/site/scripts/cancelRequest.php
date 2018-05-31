<?php

	// Import des fonctions 
	include("functions.php"); 	
	foreach ($_POST['annuler'] as $valeur){
		$arg_new_state = 'Annulee';
		request_state_change_repro($valeur, $arg_new_state , "repro");
	}

?>