<?php
	// On démarre la session AVANT toute chose
	session_start(); 
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
		
        <title>Daily Print | Inscription</title>
        
    </head>
    <body>
    
        <content class="container" role="main">
		
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <img src="../img/titre.png" class="img-fluid" alt="Responsive image" />
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
			
            <br/>
			
            <div class="row ">
                <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
				
                <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6 panel">
				
                    <legend class="color-blue">Création de compte : <a  class="mini" href="https://bastienmarais.github.io/Daily-Print-Project/" target="_blank"> Besoin d'aide ? </a></legend>
					
                    <form id="inscriptionForm" method="POST" action="../scripts/inscription.php">
						<div class="form-row">
							<div class="col">
								<label for="inputPrenom">Prénom :</label>
								<input type="text" class="form-control" id="inputPrenom" name="champPrenom" placeholder="Jean" required>
							</div>
							<div class="col">
								<label for="inputNom">Nom : </label>
								<input type="text" class="form-control" id="inputNom" name="champNom" placeholder="Dupont" required>
							</div>
						</div>
						<br/>
						<div class="form-row">
							<div class="col">
								<label for="inputEmail">Email :</label>
								<input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" name="champEmail" placeholder="jdupont@gmail.com" required>
							</div>
						</div>
						<br/>
						<div class="form-row">
							<div class="col">
								<label for="inputPassword1">Mot de passe :</label>
								<input type="password" class="form-control" id="inputPassword1" name="champMdp1" placeholder="Mot de passe" required>
							</div>
							<div class="col">
								<label for="inputPassword2">Confirmation : </label>
								<input type="password" class="form-control" id="inputPassword2" name="champMdp2" placeholder="Mot de passe" required>
							</div>
						</div>
						<br/>
						<div class="form-row">
							<div class="col">
								<label for="inputStatut">Statut :</label>
								<select class="form-control" id="inputStatut" name="champStatut">
									<option>Client</option>
									<option>Reprographie</option>
								</select>
							</div>
							<div class="col">
								<label for="inputDepartement">Département :</label>
								<select class="form-control" id="inputDepartement" name="champDepartement">
									<option>INFO</option>
									<option>MMI</option>
									<option>GEII</option>
									<option>Recherche</option>
									<option>Reprographie</option>
									<option>Autre</option>
								</select>
							</div>
						</div>
					</form>
					<br/>
					<div class="form-row">
						<div class="col">
							<button type="submit" class="btn btn-primary" form="inscriptionForm">S'inscrire</button>
						</div>
						<form action="../index.php">
							<div class="col">
								<button type="submit" class="btn btn-secondary">Retour</button>
							</div>
						</form>
					</div>
					<?php 
						if (isset($_GET['mes'])){
							if($_GET['mes'] === 'attente'){
								echo "
									<br/>
									<span class='text-success'>
										Votre compte a bien été créé, veuillez patienter le temps qu'un administrateur valide votre inscription. <br/>
										Un email vous notifiera lorsqu'il sera utilisable.
									</span>
								";
							}
							else if($_GET['mes'] === 'mdpError'){
								echo "
									<br/>
									<span class='text-danger'>
										Vos mots de passe sont différents ou trop court (mdp au moins 5 caractères).
									</span>
								";
							}
							else if($_GET['mes'] === 'email'){
								echo "
									<br/>
									<span class='text-danger'>
										Adresse email déjà existante. Votre compte n'est peut-être pas encore activé.
									</span>
								";
							}
							else if($_GET['mes'] === 'emailError'){
								echo "
									<br/>
									<span class='text-danger'>
										Adresse email mal formée.
									</span>
								";
							}
							else if($_GET['mes'] === 'required'){
								echo "
									<br/>
									<span class='text-danger'>
										Vous n'avez pas rempli tous les champs.
									</span>
								";
							}
						}
					?>
				</div>
				
				<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
					
            </div>
			
		</content>




        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
        
    </body>
</html>
