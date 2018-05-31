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
	
	function new_request($arg_email, $arg_path_file, $arg_creation_date, $arg_delivery_date, $arg_num_copy, $arg_choix_couleur, $arg_finition, $arg_recto_verso){
	// Créer la requète en BD
		
		$bdd = connexion_sql();
		
		//  REQUETE SQL DE CREATION D'UNE NOUVELLE DEMANDE
		$req = $bdd->prepare('INSERT INTO REQUESTS (user_email, path_file, creation_date, delivery_date, num_copy, couleur, finition, recto_verso, etat) VALUES (:email, :fichier, :date_actuelle, :dateLivraison, :numCopie, :choixCouleur, :finition, :rectoVerso, :etatRequete)');

		

		$req->execute(array(
			'email' => $arg_email,
			'fichier' => $arg_path_file,
			'date_actuelle' => $arg_creation_date,
			'dateLivraison' => $arg_delivery_date,
			'numCopie' => $arg_num_copy,
			'choixCouleur' => $arg_choix_couleur,
			'finition' => $arg_finition,
			'rectoVerso' => $arg_recto_verso,
			'etatRequete' => 'En attente',
			));
			
		send_email_notif_repro();
	}
	

	function new_request_protected($arg_id_request, $arg_titre, $arg_auteur, $arg_editeur, $arg_nb_pages_protegees, $arg_copies){
	// Créer la requète en BD pour une copie protegee
		
		$bdd = connexion_sql();
		
		//  REQUETE SQL DE CREATION D'UNE NOUVELLE DEMANDE
		$req = $bdd->prepare('INSERT INTO PROTECT_FILES (id_request, title, author, editor, num_protect_page, num_copy) VALUES (:idRequete, :titre, :auteur, :editeur, :numPagesProtegees, :numCopies)');

		$req->execute(array(
			'idRequete' => $arg_id_request,
			'titre' => $arg_titre,
			'auteur' => $arg_auteur,
			'editeur' => $arg_editeur,
			'numPagesProtegees' => $arg_nb_pages_protegees,
			'numCopies' => $arg_copies
			));
			
	}

	function recuperation_champs_client_new(){
	// Récupère les champs du formulaire et créer la requète dans client-new.php
		
		session_start(); 
		include("../conf/conf.php");
		
		// vérifications que tous les champs sont la 
		$liste_champs = array("champDate","champCouleur","champFinition","champRectoVerso");
		if(check_liste_post($liste_champs) == False ){
			$message = "?mes=required";
			$ancre = "#champRectoVerso";
			header('Location: ' . $VALEUR_url . '/pages/client-new.php' . $message . $ancre);
			exit();
		}
		
		 
		
		if(isset($_POST['champNbCopie']) && (int) $_POST['champNbCopie'] > 0){
			$nb_copie = (int) $_POST['champNbCopie'];
		}
		
		$email = $_SESSION['user_email'];
		$date_retour = $_POST['champDate'];
		$chemin_fichier = $_FILES['champFichier']['name'];
		$couleur = $_POST['champCouleur'];
		$finition = $_POST['champFinition'];
		$recto_verso = $_POST['champRectoVerso'];
		
		
		date_default_timezone_set('Europe/Paris');

		$date_actuelle = date('Y-m-d G:i:s');

		// Vérification que la meme requete n'a pas déjà été effectuée
		if (check_demande($email, $chemin_fichier, $date_retour, $nb_copie, $couleur, $finition, $recto_verso)){

			// on regarde si c'est un pdf 
			$extension_upload = explode(".",strtolower($chemin_fichier));
			$extension_upload = array_pop($extension_upload) ;
			if ( $extension_upload != "pdf"){
				$message = "?mes=errorFile";
				$ancre = "#champRectoVerso";
				header('Location: ' . $VALEUR_url . '/pages/client-new.php' . $message . $ancre);
				exit();
			}

			// On créer le répertoire utilisateur si besoin
			if($VALEUR_os == "Windows"){
				$VALEUR_files = str_replace("/","\\", $VALEUR_files);
			}
			$dossier = $VALEUR_files . $_SESSION['user_email'];
			if(!is_dir($dossier)){
			    mkdir($dossier);
			}
			
			// On télécharge le fichier 
			$nom =  hash("sha256", $chemin_fichier);
			$path = $dossier . "/" . $nom;
			// if($VALEUR_os == "Windows"){
				// $path = str_replace("/","\\", $path);
			// }
			$resultat = move_uploaded_file($_FILES['champFichier']['tmp_name'],$path);
			if($resultat){
				// Lance la création en BD de la requète
				new_request($email, $chemin_fichier, $date_actuelle, $date_retour, $nb_copie, $couleur, $finition, $recto_verso);
			}
			else {
				$message = "?mes=errorFile";
				$ancre = "#champRectoVerso";
				header('Location: ' . $VALEUR_url . '/pages/client-new.php' . $message . $ancre);
				exit();
			}
		}
		else{
			$message = "?mes=exist";
			$ancre = "#champRectoVerso";
			header('Location: ' . $VALEUR_url . '/pages/client-new.php' . $message . $ancre);
			exit();
		}
		
		// Cas d'impression d'une oeuvre protegee
		if( isset($_POST['champNomPublication']) ){
			if ($_POST['champNomPublication'] !== ''){
				
				// vérifications que tous les champs sont la 
				$liste_champs_protected = array("champNomPublication","champAuteur","champEditeur","champNbPages","champNbExemplaire");
				if(check_liste_post($liste_champs_protected) == False ){
					$message = "?mes=required";
					$ancre = "#champRectoVerso";
					header('Location: ' . $VALEUR_url . '/pages/client-new.php' . $message . $ancre);
					exit();
				}
				
			
				$titre = $_POST['champNomPublication'];
				$auteur = $_POST['champAuteur'];
				$editeur = $_POST['champEditeur'];
				$nbPagesProtegees = $_POST['champNbPages'];
				$nbCopies = $_POST['champNbExemplaire'];
				$id_requete = recuperation_id_request($email,$chemin_fichier, $date_actuelle, $date_retour, $nb_copie, $couleur, $finition, $recto_verso);
				new_request_protected($id_requete, $titre, $auteur, $editeur, $nbPagesProtegees, $nbCopies);
			}
		}
		
		$message = "?mes=success";
		$ancre = "#champRectoVerso";
		header('Location: ' . $VALEUR_url . '/pages/client-new.php' . $message . $ancre);
		exit();
		
	}

	function recuperation_id_request($arg_email, $arg_chemin_fichier, $arg_date_actuelle, $arg_date_retour, $arg_num_copie, $arg_couleur, $arg_finition, $arg_recto_verso){
	// Récupère l'id de la requête créée afin de l'utiliser dans protect_file
		
		$bdd = connexion_sql();
   
		$sql = "SELECT id_request FROM REQUESTS WHERE user_email='". $arg_email ."' AND path_file='". $arg_chemin_fichier ."' AND creation_date='". $arg_date_actuelle ."' AND delivery_date='". $arg_date_retour ."' AND num_copy='". $arg_num_copie ."' AND couleur='". $arg_couleur ."' AND finition='". $arg_finition ."' AND recto_verso='". $arg_recto_verso ."'";

		$reponse = $bdd->query($sql);
		$donnees = $reponse->fetch();

		$id_requete = $donnees['id_request'];

		return $id_requete;
	}

	function check_demande($arg_email, $arg_chemin_fichier, $arg_date_retour, $arg_num_copie, $arg_couleur, $arg_finition, $arg_recto_verso){
	// Retourne TRUE si la requete n'existe pas, FALSE sinon
		
		$bdd = connexion_sql();
   
		$sql = "SELECT id_request FROM REQUESTS WHERE user_email='". $arg_email ."' AND path_file='". $arg_chemin_fichier ."' AND delivery_date='". $arg_date_retour ."' AND num_copy='". $arg_num_copie ."' AND couleur='". $arg_couleur ."' AND finition='". $arg_finition ."' AND recto_verso='". $arg_recto_verso ."'";

		$reponse = $bdd->query($sql);
		$donnees = $reponse->fetch();

		$requete = $donnees['id_request'];

		if ($requete ==  ''){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function request_state_change_repro($arg_id_request, $arg_new_state, $email){
	// Modifie le statut d'une demande dans la BD

		$bdd = connexion_sql();
		
		//  REQUETE SQL DE CREATION D'UNE NOUVELLE DEMANDE
		$sql = "UPDATE REQUESTS SET etat='". $arg_new_state ."' WHERE id_request='". $arg_id_request ."'";
		$bdd->query($sql);	
		echo "Le statut de la demande ". $arg_id_request ." a été modifié: ". $arg_new_state; 
		if($email == "repro"){
			send_email_notif_repro();
			header('Location: ../pages/client-visual.php');
			exit();
		}
		else {
			send_email_notif($email);
			header('Location: ../pages/repro-visual.php');
			exit();
		}
		
	}
	
	
	/*******************************
		Affichage des requetes en tableau JS
	*******************************/

	function recover_user_request(){ //MARCHE
	// Renvoi le numéro de la demande, le chemin du fichier, la date de retour et l'état de la demande
		
		$bdd = connexion_sql();
   
		$sql = "SELECT id_request ,path_file, delivery_date, etat,user_email FROM REQUESTS WHERE user_email='". $_SESSION['user_email'] ."'";
		$sql2 = "SELECT count(*) FROM REQUESTS WHERE user_email='". $_SESSION['user_email'] ."'";
		$reponse = $bdd->query($sql);
		$reponse2 = $bdd->query($sql2);
		$array = array();
		while ($donnees = $reponse->fetch()){
			array_push($array, $donnees);
		}
		$data = $reponse2->fetchColumn(0);
				for ($i = 0; $i<$data; $i++){
					$id_request = $array[$i]['id_request'];
					$path_file = $array[$i]['path_file'];
					$delivery_date = $array[$i]['delivery_date'];
					$etat = $array[$i]['etat'];
					$user_email=$array[$i]['user_email'];
					
					?>
				<form action="../scripts/cancelRequest.php" method="POST">
				<tbody>
					<tr id=<?php echo 'id'.$i;?>>
						<td><?php echo $i+1;?></td>
						<td><strong><?php echo $id_request; ?></strong></td>
						<td><?php echo "<a class='black-link' target='_blank' href='../files/" . $user_email .  "/" .  hash('sha256',$array[$i]['path_file']) . "'>". $path_file . "</a>";?></td>
						<td><?php echo $delivery_date; ?></td>
						<td id=<?php echo 'state'.$i;?>><?php echo $etat; ?></td>
						<td><input type="checkbox" name="annuler[]" value=<?php echo $id_request; ?>></td>	
					</tr>
				</tbody>
				<script>
					var cellContent = document.getElementById("state<?php echo $i;?>").textContent;
					if ( cellContent == "En attente"){
						document.getElementById("id<?php echo $i;?>").style.background ="yellow";
					}
					else if ( cellContent == "Validee"){
						document.getElementById("id<?php echo $i;?>").style.background ="green";
					}
					else if ( cellContent == "Annulee"){
						document.getElementById("id<?php echo $i;?>").style.background ="gray";
						document.getElementById("id<?php echo $i;?>").style.color ="black";
					}
					else if ( cellContent == "En cours"){
						document.getElementById("id<?php echo $i;?>").style.background ="orange";
					}
				</script>
				<?php
				
				}
		?>
		<input class="btn btn-primary" type="submit" value="Annuler"/> <br/><br/>
		</form>
		<?php
		$reponse->closeCursor();
		return $array;
	}

	function recover_user_list(){ // MARCHE
	// Renvoi la liste des utilisateurs pour l'Admin
	// email, nom, prenom, statut, departement, notification
		
		$bdd = connexion_sql();
   
		$requete = "SELECT user_email, name, surname, statut, department, notification FROM REAL_USER";
		//$requete2 = ;
		
		$reponse = $bdd->query($requete);
		$reponse2 = $bdd->query("SELECT count(*) FROM REAL_USER");
		
		$array = array();
		while ($donnees = $reponse->fetch()){
			array_push($array, $donnees);
		}
		$data = $reponse2->fetchColumn(0);
		
		for ($i = 0; $i<$data; $i++){
			$name = $array[$i]['name'];
			$user_email = $array[$i]['user_email'];
			$surname = $array[$i]['surname'];
			$statut = $array[$i]['statut'];
			$department = $array[$i]['department'];
			?>
		<form action="../scripts/deleteUsers.php" method="POST">
		<tbody>
			<tr id=<?php echo 'id'.$i;?>>
				<td><?php echo $i;?></td>
				<td><strong><?php echo $name; ?></strong></td>
				<td><strong><?php echo $surname; ?></strong></td>
				<td><?php echo $user_email; ?></td>
				<td><?php echo $statut; ?></td>
				<td><?php echo $department; ?></td>
				<td><input type="checkbox" name='supprimer[]' value=<?php echo $user_email;?>></td>
				
			</tr>
		</tbody>
		<?php
		}
		?>
		<input class="btn btn-primary" type="submit" value="Supprimer les utilisateurs"/> <br/><br/>
		</form>
		<?php
		$reponse->closeCursor();
		//echo $array;
		//return $array;
	}

	function recover_new_account(){ // MARCHE
	// Renvoi le contenu de TMP_USER
	// email, nom, prenom, statut, departement
		
		$bdd = connexion_sql();
   
		$requete = "SELECT user_email, name, surname, statut, department FROM TMP_USER";

		$reponse = $bdd->query($requete);
		$reponse2= $bdd->query("SELECT count(*) FROM TMP_USER");
		
		$array = array();
		while ($donnees = $reponse->fetch()){
			array_push($array, $donnees);
		}
		$data=$reponse2->fetchColumn(0);
		for ($i=0;$i < $data ; $i++){
			$name = $array[$i]['name'];
			$user_email = $array[$i]['user_email'];
			$surname = $array[$i]['surname'];
			$statut = $array[$i]['statut'];
			$department = $array[$i]['department'];
			?>
		<form action="../scripts/validUsers.php" method="POST">
		<tbody>
			<tr id=<?php echo $i;?>>
				<td><?php echo $i;?></td>
				<td><strong><?php echo $name; ?></strong></td>
				<td><strong><?php echo $surname; ?></strong></td>
				<td id=<?php echo 'email'.$i;?>><?php echo $user_email; ?></td>
				<td><?php echo $statut; ?></td>
				<td><?php echo $department; ?></td>
				<td><input type="checkbox" name='valid[]' value=<?php echo $user_email;?>></td>
				<td><input type="checkbox" name='refus[]' value=<?php echo $user_email;?>></td>	
			</tr>
		</tbody>
		<?php
		}
		?>
		<input class="btn btn-primary" type="submit" value="Gérer les inscriptions"/> <br/><br/>
		</form>
		<?php
		$reponse->closeCursor();
		return $array;
	}

	function recover_repro_request_list(){ // MARCHE
	// Affiche toutes les requetes de la table REQUESTS
	// id request, user email, fichier, date de retour, etat
		
		include("../conf/conf.php");
		
		$bdd = connexion_sql();
   		
		$requete = "SELECT * from REQUESTS WHERE etat != 'Annulée'";
		
		
		$reponse = $bdd->query($requete);
		$reponse2 = $bdd->query("SELECT count(*) FROM REQUESTS WHERE etat != 'Annulee'");
		$array = array();

		while ($donnees = $reponse->fetch()){
			array_push($array, $donnees);
		}
		$data = $reponse2->fetchColumn(0);
		for ($i=0;$i < $data ; $i++){
				$id_request = $array[$i]['id_request'];
				$user_email = $array[$i]['user_email'];
				$creation_date = $array[$i]['creation_date'];
				$delivery_date = $array[$i]['delivery_date'];
				$path_file = $array[$i]['path_file'];
				$num_copy = $array[$i]['num_copy'];
				$couleur = $array[$i]['couleur'];
				$recto_verso = $array[$i]['recto_verso'];
				$finition = $array[$i]['finition'];
				$etat = $array[$i]['etat'];
			?>
		
		<form action="../scripts/changeRequestStatusRepro.php" method="POST">
		<tbody>
			
			<tr>
				<td><?php echo $i;?></td>
				<td data-toggle="modal" data-target="#requestInfo<?php echo $i; ?>"><strong><?php echo $id_request; ?></strong></td>
				<td><?php echo $user_email; ?></td>
				<td><?php echo $delivery_date; ?></td>
				<td>
				<select class="custom-select" name="status[]">
						<option value="<?php echo $user_email. ",En attente,".$array[$i]['id_request'];?>"<?php if($etat == "En attente"){echo "selected";}?>>En attente</option>
						<option value="<?php echo $user_email. ",En cours,".$array[$i]['id_request'];?>"<?php if($etat == "En cours"){echo "selected";}?>>En cours</option>
						<option value="<?php echo $user_email. ",Validee,".$array[$i]['id_request'];?>"<?php if($etat == "Validee"){echo "selected";}?>>Validée</option>
						<option value="<?php echo $user_email. ",Annulee,".$array[$i]['id_request'];?>"<?php if($etat == "Annulee"){echo "selected";}?>>Annulée</option>
				</select>
				</td>
			</tr>
		</tbody>
		
		<div class="modal fade" id="requestInfo<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="requestInfo" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ModalCenterTitle">Information sur la demande <?php echo $id_request; ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<h1 align="center"> Ticket : </h1>
							<ul class="list-group">
								<li class="list-group-item list-group-item-action list-group-item-info"><?php echo $num_copy;?> copies</li>
								<li class="list-group-item list-group-item-action list-group-item-secondary"><?php echo $couleur;?></li>
								<li class="list-group-item list-group-item-action list-group-item-info"><?php echo $recto_verso;?></li>
								<li class="list-group-item list-group-item-action list-group-item-secondary"><?php echo $finition;?></li>
								<li class="list-group-item list-group-item-action list-group-item-info">
								<?php echo "<a target='_blank' href='../files/" . $user_email .  "/" .  hash('sha256',$path_file) . "'>". $path_file . "</a></li>";?>
								
							</ul>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
					</div>
				</div>
			</div>
		</div>
		<?php
		}
		?>
		<input class="btn btn-primary" type="submit" value="Valider"></input> <br/>
		<br/>
		
		</form>
				<!-- Modal -->
		
		<?php
		$reponse->closeCursor();$reponse2->closeCursor();	
	}
	

	
	function accept_tmp_user($arg_email){ // MARCHE
	// Valide une inscription
	// Récupère les infos de la table TMP_USER, les copies dans la table REAL_USER, et supprime la ligne dans TMP_USER
		
		$bdd = connexion_sql();
		$requete = "INSERT INTO REAL_USER SELECT * FROM TMP_USER WHERE user_email='". $arg_email ."'";
		$requete2 = "DELETE FROM TMP_USER WHERE user_email='". $arg_email ."'";
		echo "L'inscription de l'utilisateur ". $arg_email ." a été validée";
		$bdd->query($requete);
		$bdd->query($requete2);
		header('Location: ../pages/admin-news.php');
		exit();
		
	}
	
	function remove_user($arg_email,$arg_table){
		$bdd = connexion_sql();
		$requete = "DELETE FROM ".$arg_table." WHERE user_email='". $arg_email ."'";
		echo "La suppression de l'utilisateur ". $arg_email ." de la table ". $arg_table ." a été validée";
		$bdd->query($requete);
		header('Location: ../pages/admin-users.php');
		exit();
		
	}
	/*******************************
		Inscriptions 
	*******************************/
	
	function new_account($arg_email, $arg_prenom, $arg_nom, $arg_statut, $arg_password, $arg_departement){
	// Créer le compte dans TMP_USER
		
		include("../conf/conf.php");
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
		send_email_notif($VALEUR_email);
		
		$message = "?mes=attente";
		$ancre = "#inscriptionForm";
		header('Location: ' . $VALEUR_url . '/pages/inscription.php' . $message . $ancre);
		exit();
	}

	function recuperation_champs_inscription(){
	// Récupère les champs du formulaire et créer un compte dans inscription.php
		
		include("../conf/conf.php");
		
		// vérifications que tous les champs sont la 
		$liste_champs = array("champPrenom","champNom","champEmail","champMdp1","champMdp2","champStatut","champDepartement");
		if(check_liste_post($liste_champs) == False ){
			$message = "?mes=required";
			$ancre = "#inscriptionForm";
			header('Location: ' . $VALEUR_url . '/pages/inscription.php' . $message . $ancre);
			exit();
		}
		
		
		// on regarde si les mdp sont identiques
		if ($_POST['champMdp1'] != $_POST['champMdp2'] && strlen($_POST['champMdp1'] < 5)){
			$message = "?mes=mdpError";
			$ancre = "#inscriptionForm";
			header('Location: ' . $VALEUR_url . '/pages/inscription.php' . $message . $ancre);
			exit();
		}

		// email invalide
		if (!filter_var($_POST['champEmail'], FILTER_VALIDATE_EMAIL)) {
			$message = "?mes=emailError";
			$ancre = "#inscriptionForm";
			header('Location: ' . $VALEUR_url . '/pages/inscription.php' . $message . $ancre);
			exit();
		}
		
		$prenom = $_POST['champPrenom'];
		$nom = $_POST['champNom'];
		$email = $_POST['champEmail'];
		$password = hash("sha256", $_POST['champMdp1']);
		$statut = $_POST['champStatut'];
		$departement = $_POST['champDepartement'];
		

		
		// Verification d'un email unique
		if (check_email($email)){

			// Lance la création en BD du compte
			new_account($email, $prenom, $nom, $statut, $password, $departement);
		}
		else{
			$message = "?mes=email";
			$ancre = "#inscriptionForm";
			header('Location: ' . $VALEUR_url . '/pages/inscription.php' . $message . $ancre);
			exit();
		}
	}
	
	function check_email($arg_email){
	// Retourne TRUE si l'email n'est pas utilisé, FALSE sinon
	
		$bdd = connexion_sql();
   
		$sql = "SELECT user_email FROM TMP_USER WHERE user_email='". $arg_email ."'";

		$reponse = $bdd->query($sql);
		$donnees = $reponse->fetch();

		$email = $donnees['user_email'];

		if ($email ==  ''){
			$sql = "SELECT user_email FROM REAL_USER WHERE user_email='". $arg_email ."'";

			$reponse = $bdd->query($sql);
			$donnees = $reponse->fetch();
			$email = $donnees['user_email'];

			if ($email ==  ''){
				return TRUE;
			}
		}

		return FALSE;
	}
	
	
	
	/*******************************
		Paramètres et mdp oublié
	*******************************/

	function password_modication($arg_email, $arg_new_password){ 
	// Change le mdp de l'utilisateur donnée

        $bdd = connexion_sql();
		
		$hash =  hash("sha256", $arg_new_password);
		$sql = "UPDATE REAL_USER SET password='". $hash ."' WHERE user_email='". $arg_email ."'";
		$bdd->query($sql);
		
		send_email_mdp($arg_email,$arg_new_password);
		
		include("../conf/conf.php");
		$message = "?mes=success";
		$ancre = "#inputOldPassword" ;
		header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
		exit();
	}
	
	function recuperation_champs_param_password(){
	// Récupère les champs et fait les vérifications avant de le mettre en BD
		
		include("../conf/conf.php");
		session_start();
		
		
		// vérifications que tous les champs sont la 
		$liste_champs = array("champOldPassword","champNewPassword1","champNewPassword2");
		if(check_liste_post($liste_champs) == False ){
			$message = "?mes=required";
			$ancre = "#inputOldPassword" ;
			header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
			exit();
		}
		
		$bdd = connexion_sql();
		$requete = "SELECT password FROM REAL_USER WHERE user_email='". $_SESSION["user_email"] ."'";
		$reponse = $bdd->query($requete);
		$donnees = $reponse->fetch();
		$passwordSQL = (string) $donnees['password'];
		$actual_password = hash("sha256", $_POST['champOldPassword']);
		$reponse->closeCursor();
		
		// Si le mot de passe entré est correct par rapport a la BD
		if($actual_password === $passwordSQL){
			
			// Si le nouveau mdp a été rentré correctement
			if ($_POST['champNewPassword1'] === $_POST['champNewPassword2']){
				
				// Si le nouveau mdp est identique a l'ancien
				if( $actual_password === hash("sha256",$_POST['champNewPassword1'])){
					$message = "?mes=oldEqualNew";
					$ancre = "#inputOldPassword" ;
					header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
					exit();
				}
				else {
					password_modication($_SESSION["user_email"],$_POST['champNewPassword1']);
				}
				
			}
			else {
				$message = "?mes=newError";
				$ancre = "#inputOldPassword" ;
				header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
				exit();
			}
		}
		else {
			$message = "?mes=actualError";
			$ancre = "#inputOldPassword" ;
			header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
			exit();
		}
	}
	
	function update_notif(){
	// Récupère les champs et update la BD
		
		include("../conf/conf.php");
		session_start();
		
		if(isset($_POST['champNotif'])){
			if($_POST['champNotif'] === "Sans" || $_POST['champNotif'] === "Avec"){
				if($_POST['champNotif'] === "Sans"){
					$value = "0";
				}
				else {
					$value = "1";
				}
				$bdd = connexion_sql();
				$sql = "UPDATE REAL_USER SET notification=". $value ." WHERE user_email='". $_SESSION['user_email'] ."'";
				$bdd->query($sql);
				
				$message = "?notif=success";
				$ancre = "#inputNotifications";
				header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
				exit();
			}
			else {
				$message = "?notif=error";
				$ancre = "#inputNotifications";
				header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
				exit();
			}
		}
		else {
			$message = "?notif=required";
			$ancre = "#inputNotifications";
			header('Location: ' . $VALEUR_url . '/pages/param.php' . $message . $ancre);
			exit();
		}
		
	}
	
	function forgetPassword(){
	// Génère et envoi le nouveau mot de passe par email
	
		if(isset($_POST['forgetEmail'])){
			
			include("../conf/conf.php");
			
			if(check_email($_POST['forgetEmail']) === False){
				$char = 'abcdefghijklmnopqrstuvwxyz0123456789';
				$mot_de_passe = str_shuffle($char);
				$mot_de_passe = substr($mot_de_passe , 0 , 10);
				$hash = hash("sha256",$mot_de_passe);
				
				$bdd = connexion_sql();
				$sql = "UPDATE REAL_USER SET password='". $hash ."' WHERE user_email='". $_POST['forgetEmail'] ."'";
				$bdd->query($sql);
				send_email_mdp($_POST['forgetEmail'],$mot_de_passe);
				
				$message = "?err=forgetSuccess";
				$ancre = "#inputEmail" ;
				header('Location: ' . $VALEUR_url . '/index.php' . $message . $ancre);
				exit();
			}
			else {
				
				$message = "?err=forgetError";
				$ancre = "#inputEmail" ;
				header('Location: ' . $VALEUR_url . '/index.php' . $message . $ancre);
				exit();
			}
		}
		else {
			$message = "?err=forgetError";
			$ancre = "#inputEmail" ;
			header('Location: ' . $VALEUR_url . '/index.php' . $message . $ancre);
			exit();
		}
	}
	
	/*******************************
		Connexion et deconnexion
	*******************************/
	
	function recuperation_champs_connexion(){
	// Récupère les champs du formulaire et connecte l'utilisateur sur index.php
	
		include("../conf/conf.php");
		
		// vérifications que tous les champs sont la 
		$liste_champs = array("champEmail","champMdp");
		if(check_liste_post($liste_champs) == False ){
			$message = "?err=required";
			$ancre = "#inputEmail";
			header('Location: ' . $VALEUR_url . '/index.php' . $message . $ancre);
			exit();
		}
		
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
		$arg_password_hash = hash("sha256", $arg_password);
		
		// On récupère la conf
		include("../conf/conf.php");
		
		// Si c'est une connexion réussi
		if($passwordSQL === $arg_password_hash){
			
			// On démarre la session AVANT toute chose
			session_start(); 
			
			// Cookie pour se rappeler de l'email si souvenir coché
			if($_SERVER['SERVER_NAME'] == "localhost"){
				if(isset($_POST['souvenir'])){
					setcookie("email",$arg_email,false,"/",false);
				}
				else {
					setcookie("email","",false,"/",false);
				}
			}
			else {
				if(isset($_POST['souvenir'])){
					setcookie('email', $arg_email, time() + 7*24*3600, null, null, false, true);
				}
				else {
					setcookie('email', "", time() + 7*24*3600, null, null, false, true);
				}
			}
			
			
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
				$ancre = "#inputEmail";
				header('Location: ' . $VALEUR_url . '/index.php' . $message . $ancre);
				exit();
			}
		}
		else{
			$message = "?err=mdp";
			$ancre = "#inputEmail";
			header('Location: ' . $VALEUR_url . '/index.php' . $message . $ancre);
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
	
	function send_email($destinataire,$objet,$texte){
	// Envoie des emails (ne marche pas sans serveur smtp)
	
		include("../conf/conf.php");
		$origine = $VALEUR_email;
		
		// On filtre les serveurs qui rencontrent des bogues.
		if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) {
			$passage_ligne = "\r\n";
		}
		else{
			$passage_ligne = "\n";
		}

		$boundary = "-----=".md5(rand());

		$header = "From: \" ". $origine  . "\"<". $origine .">".$passage_ligne;
		$header.= "Reply-to: \" ". $origine  . "\"<". $origine .">".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;

		$message = $passage_ligne."--".$boundary.$passage_ligne;

		$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
		$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
		
		$message.= $passage_ligne.$texte.$passage_ligne;
		
		$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

		mail($destinataire,$objet,$message,$header);

	}
	
	function send_email_attente($email_cible){
	// Envoie un email d'attente pour l'activation
		
		$objet = "Daily Print | Création d'un compte";
		$texte = "
Bonjour,
		
Nous sommes heureux de vous accueillir sur Daily Print. 
Votre compte a été créé mais il est en attente de validation par un administrateur.
		
A bientot !
";
		send_email($email_cible,$objet,$texte);
		
	}
	
	function send_email_activation($email_cible){
	// Envoie un email pour l'activation
		
		$objet = "Daily Print | Activation de votre compte";
		$texte = "
Bonjour,

Votre compte a été activé ! 
Vous pouvez a présent vous connecter.
		
A bientot !
";
		send_email($email_cible,$objet,$texte);
	}
	
	function send_email_notif($email_cible){
	// Envoie un email de notif avec le tuple donné
		
		
		$objet = "Daily Print | Notification ";
		$texte = "
Bonjour,
		
Il y a du nouveau sur votre compte Daily Print ! 
Pensez a y jeter un oeil ;-)
		
A bientot !
";
		send_email($email_cible,$objet,$texte);
	}
	
	function send_email_mdp($email_cible,$mdp) {
	// Envoie l'email pour informer du changement de mot de passe
	
		$objet = "Daily Print | Changement de mot de passe ";
		$texte = "
Bonjour,
		
Votre nouveau mot de passe est : ".$mdp." 
Vous pouvez vous connecter avec celui-ci.
		
A bientot !
";
		send_email($email_cible,$objet,$texte);
	
	}
	
	function send_email_notif_repro(){
	// Envoie un email a tous les membres de la reprographie
	
		$bdd = connexion_sql();
   		
		$requete = "SELECT user_email from REAL_USER WHERE statut='Reprographie'";
		$reponse = $bdd->query($requete);
		
		while ($donnees = $reponse->fetch()){
			
			$courant = $donnees['user_email'];
			
			if(check_active_notif($courant)){
				send_email_notif($courant);
			}
			
		}

		$reponse->closeCursor();
		
	}
	
	function check_active_notif($arg_user_email){
	// Retourne True si l'utilisateur accepte les notifs, False sinon
		
		$bdd = connexion_sql();

		$requete = "SELECT notification FROM REAL_USER WHERE user_email='". $arg_user_email ."'";
		$reponse = $bdd->query($requete);
		$donnees = $reponse->fetch();
		$reponse->closeCursor();
		
		if($donnees['notification'] == "1"){
			return True ;
		}
		
		return False ;
	}
	
	
	/*******************************
		Checks 
	*******************************/
	
	function check_liste_post($liste){
	// Renvoie True si tout est present, False sinon
	// $min <= champAuteur < $max
	
		$min = 1 ;
		$max = 50;
		
		foreach($liste as $v ){
			if(!isset($_POST[$v])){
				return False ;
			}
			else {
				if($v === "champFichier"){
					$max = 100;
				}
				else {
					$max = 50;
				}
				$chaine = str_replace(" ","",$_POST[$v]) ;
				if(strlen($chaine) < $min && strlen($_POST[$v]) > $max){
					return False ;
				}
			}
		}
		return True ;	
	}
	
	/*******************************
		Statistique
	*******************************/
	
	function new_request_graphe($department,$etat){
	// Créer la requète en BD 
	// Etats acceptés : "En attente", "En cours", "Validée", "Annulée" , "ALL"
	
		$bdd = connexion_sql();
		$ChampsDate = $_POST['champDate'];
		if($ChampsDate == 'Journalier'){
			$today = date("d-m-y");
			if($etat === "ALL"){
				$sql = "SELECT sum(requests.num_copy) FROM requests, real_user WHERE requests.user_email=real_user.user_email AND `department`='".$department."' AND `creation_date`='".$today."'";
			}	
			else {
				$sql = "SELECT  sum(requests.num_copy) as Total  FROM requests, real_user WHERE requests.user_email=real_user.user_email AND `department`='".$department."' AND `etat`='".$etat."' AND `creation_date`='".$today."'";
			}
		}if($ChampsDate == 'Mensuelle'){
			$todayMois = date("m-y");
			
			if($etat === "ALL"){
				$sql = "SELECT  sum(requests.num_copy) as Total  FROM requests, real_user WHERE requests.user_email=real_user.user_email AND `department`='".$department."' AND `creation_date` BETWEEN '20".$todayMois."-01' AND '20".$todayMois."-31'";
			}
			else {
				$sql = "SELECT  sum(requests.num_copy) as Total  FROM requests, real_user WHERE requests.user_email=real_user.user_email AND `department`='".$department."' AND `etat`='".$etat."' AND `creation_date` BETWEEN '20".$todayMois."-01' AND '20".$todayMois."-31'";
			}
		}if($ChampsDate == 'Annuelle'){
			$todayAnnee = date("Y");
			if($etat === "ALL"){
				$sql = "SELECT  sum(requests.num_copy) as Total  FROM requests, real_user WHERE requests.user_email=real_user.user_email AND `department`='".$department."' AND `creation_date` BETWEEN '".$todayAnnee."-01-01' AND '20".$todayAnnee."-12-31'";
			}
			else {
				$sql = "SELECT  sum(requests.num_copy) as Total  FROM requests, real_user WHERE requests.user_email=real_user.user_email AND `department`='".$department."' AND `etat`='".$etat."' AND `creation_date` BETWEEN '".$todayAnnee."-01-01' AND '20".$todayAnnee."-12-31'";
			}
		}
		//  REQUETE SQL DE SELECTION
		$reponse = $bdd->query($sql);
		$donnee =  $reponse->fetch();
		$resultat = $donnee["Total"];
		return $resultat;
	}


	/*******************************
		Clean DB
	*******************************/

	function clean_requests(){
			$message = "?msg=todo";
			$ancre = "#idForm";
			header('Location: ' . $VALEUR_url . '../pages/admin-clean.php' . $message . $ancre);
			exit();
	}

?>	

