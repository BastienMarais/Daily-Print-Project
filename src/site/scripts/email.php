<?php

	function send_email($origine,$destinataire,$objet,$texte){
		$mail = $destinataire; // Déclaration de l'adresse de destination.

		// On filtre les serveurs qui rencontrent des bogues.
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
			$passage_ligne = "\r\n";
		}
		else{
			$passage_ligne = "\n";
		}

		
		//=====Création de la boundary

		$boundary = "-----=".md5(rand());

		//=====Création du header de l'e-mail.

		$header = "From: \" ". $origine  . "\"<". $origine .">".$passage_ligne;

		$header.= "Reply-to: \" ". $origine  . "\"<". $origine .">".$passage_ligne;

		$header.= "MIME-Version: 1.0".$passage_ligne;

		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

		 

		//=====Création du message.

		$message = $passage_ligne."--".$boundary.$passage_ligne;

		//=====Ajout du message au format texte.

		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;

		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

		$message.= $passage_ligne.$texte.$passage_ligne;

		//==========

		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;


		//=====Envoi de l'e-mail.
		echo "Email envoyé : " . $origine . " " . $destinataire . " " . $objet . " " . $message;
		mail($mail,$objet,$message,$header);

	}
	
	include("../conf/conf.php");
	send_email($VALEUR_email,"marais.bas@gmail.com","test","JE SUIS LE CONTENU !!!");
?>