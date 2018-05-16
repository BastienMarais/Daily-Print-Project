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
        <link rel="stylesheet" href="css/style.css">       
		
        <title>Daily Print | Connexion</title>
        
    </head>
    <body>
    
        <content class="container" role="main">
		
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <img src="img/logo.png" class="img-fluid" alt="Responsive image" />
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
			
            <br/>
			
            <div class="row ">
                <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
				
                <div class="col-xs-8 col-sm-8 col-md-6 col-lg-6 panel">
				
                    <legend class="color-blue">Se connecter : </legend>
					
                    <form id="connexionForm" method="POST" action="scripts/connexion.php">
						<div class="form-group">
							<label for="inputEmail">Adresse email : </label>
							<input type="email" class="form-control" id="inputEmail" name="champEmail" aria-describedby="emailHelp" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="inputPassword">Mot de passe :</label>
							<input type="password" class="form-control" id="inputPassword" name="champMdp" placeholder="Mot de passe" required>
						</div>
						<div class="form-group">
							<button type="button" class="btn btn-link" data-toggle="modal" data-target="#forgetPassword">Mot de passe oublié</a>
						</div>
						<div class="form-group form-check">
							<input type="checkbox" class="form-check-input" id="checkSouvenir">
							<label class="form-check-label" for="checkSouvenir">Se souvenir de moi</label>
						</div>
					</form>
					<div class="form-row">
						<div class="col">
							<button type="submit" class="btn btn-primary" form="connexionForm">Connexion</button>
						</div>
						<div class="col">
							<form action="pages/inscription.php">
								<button type="submit" class="btn btn-secondary">Créer un compte</button>
							</form>
						</div>
					</div>
					
	
					<?php 
						if (isset($_GET['err'])){
							if($_GET['err'] === 'mdp'){
								echo "
									<br/>
									<span class='text-danger'>
										La combinaison email / mot de passe est incorrecte.
									</span>
								";
							}
							if($_GET['err'] === 'inconnue'){
								echo "
									<br/>
									<span class='text-danger'>
										Erreur lors de la connexion.
									</span>
								";
							}
							if($_GET['err'] === 'forgetSuccess'){
								echo "
									<br/>
									<span class='text-success'>
										Un email avec le nouveau mot de passe a été envoyé.
										Cela peut prendre un peu de temps avant de le recevoir...
									</span>
								";
							}
							if($_GET['err'] === 'forgetError'){
								echo "
									<br/>
									<span class='text-danger'>
										L'email renseigné n'existe pas.
									</span>
								";
							}
						}
					?>
					
				</div>
				
				<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
				
            </div>
			
		</content>

		<!-- Modal -->
		<div class="modal fade" id="forgetPassword" tabindex="-1" role="dialog" aria-labelledby="forgetPassword" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ModalCenterTitle">Récupération de mot de passe</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="forgetForm" method="POST" action="../scripts/forgetPassword.php">
							<div class="form-group">
								<label for="inputForget">Adresse email : </label>
								<input type="email" class="form-control" id="inputForget" name="forgetEmail" aria-describedby="emailHelp" placeholder="Email" required>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
						<button type="submit" class="btn btn-primary" form="forgetForm">Envoyer</button>
					</div>
				</div>
			</div>
		</div>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
        
    </body>
</html>
