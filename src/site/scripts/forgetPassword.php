<?php
    
	// Import des fonctions 
	include("functions.php");
	
    /* 
		Ce fichier doit g�rer ce qui se passe lorsqu'on a mit son email
		et cliqu� sur "envoyer" dans la page "index.php" pour la r�cup�ration
		de mot de passe 
		
		En gros :
			- g�n�rer un mot de passe al�atoire
			- envoyer un email avec le mot de passe si l'adresse existe en BD
			- mettre � jour le mot de passe en BD
			- rediriger vers "index.php" avec le message "Email de r�cup�ration envoy�"
    */
    
?>
