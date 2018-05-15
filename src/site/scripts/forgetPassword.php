<?php
    
	// Import des fonctions 
	include("functions.php");
	
    /* 
		Ce fichier doit gérer ce qui se passe lorsqu'on a mit son email
		et cliqué sur "envoyer" dans la page "index.php" pour la récupération
		de mot de passe 
		
		En gros :
			- générer un mot de passe aléatoire
			- envoyer un email avec le mot de passe si l'adresse existe en BD
			- mettre à jour le mot de passe en BD
			- rediriger vers "index.php" avec le message "Email de récupération envoyé"
    */
    
?>
