<?php
	// On démarre la session AVANT toute chose
	session_start(); 
	
	// S'il n'a rien a faire ici 
	if($_SESSION['statut'] !== "Client" && $_SESSION['statut'] !== "Admin" && $_SESSION['statut'] !== "Reprographie"){
		include("../scripts/deconnexion.php");
		deconnexion_site();
	}
?>
<!doctype html>
<html lang="fr">
    <head>
    
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Daily Print">
        <meta name="keywords" content="HTML,CSS, PHP, JavaScript">
        <meta name="author" content="Daily Print TEAM">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		
		<!-- My css -->
        <link rel="stylesheet" href="../css/style.css">       
		
        <title>Daily Print | Mes paramètres</title>
        
    </head>
    <body>
    
		<!-- Navbar -->
		<?php
			if($_SESSION["statut"] === "Client"){
				echo "
					<nav class='nav nav-pills nav-justified navbar-dark bg-dark'>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='client-visual.php'>Mes demandes</a>
						</div>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='client-new.php'>Nouvelle demande</a>
						</div>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link active' href='param.php'>Paramètres</a>
						</div> 
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='../scripts/deconnexion.php'>Se déconnecter</a>
						</div> 
					</nav>
				";
			}
			else if ($_SESSION["statut"] === "Reprographie"){
				echo "
					<nav class='nav nav-pills nav-justified navbar-dark bg-dark'>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='repro-visual.php'>Les demandes</a>
						</div>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='repro-stat.php'>Statistiques</a>
						</div>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link active' href='param.php'>Paramètres</a>
						</div> 
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='../scripts/deconnexion.php'>Se déconnecter</a>
						</div> 
					</nav>
				";
			}
			else {
				echo "
					<nav class='nav nav-pills nav-justified navbar-dark bg-dark'>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='admin-news.php'>Nouvelles inscriptions </a>
						</div>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='admin-users.php'>Liste des utilisateurs</a>
						</div>
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link active' href='param.php'>Paramètres</a>
						</div> 
						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<a class='nav-item nav-link' href='../scripts/deconnexion.php'>Se déconnecter</a>
						</div> 
					</nav>
				";
			}
		?>
        
		<content class="container" role="main">
		
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <img src="../img/logo.png" class="img-fluid" alt="Responsive image" />
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
			
            <br/>
			
            <div class="row ">
			
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel">
				
					<legend class="color-blue">Mes paramètres : </legend>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
						<legend class="color-blue">Changement de mot de passe : </legend>
						
						<form method="POST" action="../scripts/changePassword.php">
							<div class="form-group">
								<label for="inputOldPassword">Mot de passe actuel :</label>
								<input type="password" class="form-control" id="inputOldPassword" name="champOldPassword" placeholder="Mot de passe actuel" required>
							</div>
							<div class="form-group">
								<label for="inputNewPassword1">Nouveau mot de passe :</label>
								<input type="password" class="form-control" id="inputNewPassword1" name="champNewPassword1" placeholder="Nouveau mot de passe" required>
							</div>
							<div class="form-group">
								<label for="inputNewPassword2">Confirmer le mot de passe :</label>
								<input type="password" class="form-control" id="inputNewPassword2" name="champNewPassword2" placeholder="Nouveau mot de passe" required>
							</div>
							<button type="submit" class="btn btn-primary">Changer de mot de passe</button>
						</form>
					
						<?php 
							if (isset($_GET['mes'])){
								if($_GET['mes'] === 'oldEqualNew'){
									echo "
										<br/>
										<span class='text-warning'>
											Ce nouveau mot de passe est identique a l'ancien.
										</span>
									";
								}
								if($_GET['mes'] === 'newError'){
									echo "
										<br/>
										<span class='text-danger'>
											Vos deux 'nouveau mot de passe' sont différents.
										</span>
									";
								}
								if($_GET['mes'] === 'actualError'){
									echo "
										<br/>
										<span class='text-danger'>
											Erreur au niveau du mot de passe actuel.
										</span>
									";
								}
								if($_GET['mes'] === 'success'){
									echo "
										<br/>
										<span class='text-success'>
											Votre mot de passe a été mis à jour.
										</span>
									";
								}
							}
						?>
					</div>
					
					<br/>
					
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
						<legend class="color-blue">Notifications par email : </legend>
						
						<form method="POST" action="../scripts/updateNotifications.php">
							<div class="form-row">
								<div class="col">
									<label for="inputNotifications"> Etat : </label>
									<select class="form-control" id="inputNotifications" name="champNotif" required>
										<option>Sans</option>
										<option>Avec</option>
									</select>
								</div>
							</div>
							
							<br/>
							
							<div class="form-row">
								<div class="col">
									<button type="submit" class="btn btn-primary">Enregistrer </button>
								</div>
							</div>
						</form>
					
						<?php 
							if (isset($_GET['notif'])){
								if($_GET['notif'] === 'success'){
									echo "
										<br/>
										<span class='text-success'>
											Notifications misent à jour.
										</span>
									";
								}
								if($_GET['notif'] === 'error'){
									echo "
										<br/>
										<span class='text-danger'>
											Une erreur est survenue.
										</span>
									";
								}
							}
						?>
					</div>
					
				</div>
				
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				
			</div>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
        
    </body>
</html>
