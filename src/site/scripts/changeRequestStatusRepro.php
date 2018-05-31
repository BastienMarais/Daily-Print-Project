<?php

	// Import des fonctions 
	include("functions.php"); 	
	foreach($_POST['status'] as $statut){
		$statut2 = explode(",",$statut);
		$statutFinal = $statut2[1];
		$idRequest = $statut2[2];
		$email = $statut2[0];
		request_state_change_repro($idRequest, $statutFinal, $email );

	}
	header('Location: ../pages/repro-visual.php');
	exit();
?>