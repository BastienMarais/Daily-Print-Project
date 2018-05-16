<?php

	/*******************************
		Connexion a la BD 
	*******************************/
	
	function connexion_sql(){ 
		// Renvoi le PDO de connexion a la BD
		
		// On check la conf du serveur MySQL
		include("../conf/conf.php");
		
		try { 
			return new PDO('mysql:host='.$VALEUR_hote.';port='.$VALEUR_port.';dbname='.$VALEUR_nom_bd, $VALEUR_user, $VALEUR_mot_de_passe);
		}

		catch(Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
	}
	
	/*******************************
		Gestion des requètes 
	*******************************/
	
	function new_request($arg_email, $arg_path_file, $arg_delivery_date, $arg_num_copy, $arg_choix_couleur, $arg_finition){
		// Créer la requète en BD
		
		$bdd = connexion_sql();
		
		//  REQUETE SQL DE CREATION D'UNE NOUVELLE DEMANDE
		$req = $bdd->prepare('INSERT INTO REQUESTS (user_email, path_file, creation_date, delivery_date, num_copy, couleur, finition) VALUES (:email, :fichier, NOW(), :dateLivraison, :numCopie, :choixCouleur, :finition)');

		$req->execute(array(
			'email' => $arg_email,
			'fichier' => $arg_path_file,
			'dateLivraison' => $arg_delivery_date,
			'numCopie' => $arg_num_copy,
			'choixCouleur' => $arg_choix_couleur,
			'finition' => $arg_finition
			));
	}

	function recuperation_champs_client_new(){
		// Récupère les champs du formulaire et créer la requète dans client-new.php
		
		$date_retour = $_POST['champDate'];
		$chemin_fichier = $_POST['champFichier'];   
		$nb_copie = (int) $_POST['champNbCopie'];
		$couleur = $_POST['champCouleur'];
		
		if( isset($_POST['champFinition']) ){
			$finition = $_POST['champFinition'];
		}
		else {
			echo 'Le champ finition est vide !';
		}
		
		// Lance la création en BD de la requète
		new_request("email@test.fr", $chemin_fichier, $date_retour, $nb_copie, $couleur, $finition);
		
	}
	
	/*******************************
		Inscriptions 
	*******************************/
	
	function new_account($arg_email, $arg_prenom, $arg_nom, $arg_statut, $arg_password, $arg_departement){
		// Créer le compte dans TMP_USER
		
        $bdd = connexion_sql();
    
		//  REQUETE SQL DE CREATION D'UN UTILISATEUR TEMPORAIRE
		$req = $bdd->prepare('INSERT INTO TMP_USER (user_email, name, surname, statut, password, department) VALUES (:email, :prenom, :nom, :statut, :motDePasse, :departement)');

		$req->execute(array(
			'email' => $arg_email,
			'prenom' => $arg_prenom,
			'nom' => $arg_nom,
			'statut' => $arg_statut,
			'motDePasse' => $arg_password,
			'departement' => $arg_departement
			));
		
		// Envoie l'email de confirmation
		send_email_attente($arg_email);
		
		include("../conf/conf.php");
		$message = "?mes=attente";
		header('Location: ' . $VALEUR_url . '/pages/inscription.php' . $message);
		exit();
	}

	function recuperation_champs_inscription(){
		// Récupère les champs du formulaire et créer un compte dans inscription.php
		
		if ($_POST['champMdp1'] != $_POST['champMdp2']){
			echo "Les 2 mots de passe ne correspondent pas !";
			return;
		}

		$prenom = $_POST['champPrenom'];
		$nom = $_POST['champNom'];
		$email = $_POST['champEmail'];

		$password = hash("sha256", $_POST['champMdp1']);

		if( isset($_POST['champStatut']) ){
			$statut = $_POST['champStatut'];
		}
		else{
			echo 'Le champ statut est vide !';
		} 

		if( isset($_POST['champDepartement']) ){
			$departement = $_POST['champDepartement'];
		}
		else{
			echo 'Le champ département est vide !';
		}

		
		// Lance la création en BD du compte
		new_account($email, $prenom, $nom, $statut, $password, $departement);
	}
	
	/*******************************
		Connexion et deconnexion au site
	*******************************/
	
	function recuperation_champs_connexion(){
		// Récupère les champs du formulaire et connecte l'utilisateur sur index.php
		
		$email = $_POST['champEmail'];
		$password = $_POST['champMdp'];
		
		// Lance la connexion
		connexion_site($email, $password);
	}
	
	function connexion_site($arg_email, $arg_password){
		// Gère la connexion au site Daily Print
	
        $bdd = connexion_sql();
   
		$sql =  "SELECT user_email, statut, password FROM REAL_USER WHERE user_email='". $arg_email ."'";

		$reponse = $bdd->query($sql);
		$donnees = $reponse->fetch();

		$emailSQL = $donnees['user_email'];
		$passwordSQL = (string) $donnees['password'];
		$arg_password_hashe = hash("sha256", $arg_password);
		
		// On récupère la conf
		include("../conf/conf.php");
		
		// Si c'est une connexion réussi
		if($passwordSQL === $arg_password_hashe){
			
			// On démarre la session AVANT toute chose
			session_start(); 
			
			// On créer quelques variables de session dans $_SESSION
			$_SESSION['user_email'] = $donnees['user_email'];
			$_SESSION['statut'] = $donnees['statut'];
			
			if ($_SESSION['statut'] == "Admin"){
				header('Location: ' . $VALEUR_url . '/pages/admin-news.php');
				exit();
			}
			else if($_SESSION['statut'] == "Client"){
				header('Location: ' . $VALEUR_url . '/pages/client-visual.php');
				exit();
			}
			else if($_SESSION['statut'] == "Reprographie"){
				header('Location: ' . $VALEUR_url . '/pages/repro-visual.php');
				exit();
			}
			else {
				$message = "?err=inconnue";
				header('Location: ' . $VALEUR_url . '/index.php' . $message);
				exit();
			}
			

		}
		else{
			$message = "?err=mdp";
			header('Location: ' . $VALEUR_url . '/index.php' . $message);
			exit();
		} 
	}

	function deconnexion_site(){
		// Détruit la session et redirige vers index.php
		
		// on récupère la conf
		include("../conf/conf.php");
		
		// Réinitialisation du tableau de session
		session_start();
		
		// On le vide intégralement
		$_SESSION = array();
		
		// Destruction de la session
		session_destroy();
		
		// Destruction du tableau de session
		unset($_SESSION);
		
		header('Location: ' . $VALEUR_url . '/index.php');
		exit();
	}
	
	/*******************************
		Gestion des emails
	*******************************/
	
	function send_email_attente($email_cible){
		// Envoie un email d'attente pour l'activation
		
		echo "Email d'attente";
	}
	
	function send_email_activation($email_cible){
		// Envoie un email pour l'activation
		
		echo "Email d'activation";
	}
	
	function send_email_notif($email_cible,$tuple){
		// Envoie un email de notif avec le tuple donné
		
		echo "Email de notification";
	}
?>
