<?php

	// Import des fonctions 
	include("functions.php");
	if (empty ($_POST['valid']) and empty ($_POST['refus'])){
		exit();
	}
	else{												
		foreach ((array)$_POST['valid'] as $valeur){
			accept_tmp_user($valeur);
		}
		foreach ((array)$_POST['refus'] as $valeur2){
			$table = 'TMP_USER';
			remove_user($valeur2,$table);
		}
	}
	
?>
