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
                    <img src="../img/logo.png" class="img-fluid" alt="Responsive image" />
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
			
            <br/>
			
            <div class="row ">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
				
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4 panel">
				
                    <legend class="color-blue">Création de compte : </legend>
					
                    <form id="inscriptionForm" method="POST" action="../scripts/inscription.php">
						<div class="form-row">
							<div class="col">
								<label for="inputPrenom">Prénom :</label>
								<input type="text" class="form-control" id="inputPrenom" placeholder="Jean" required>
							</div>
							<div class="col">
								<label for="inputNom">Nom : </label>
								<input type="text" class="form-control" id="inputNom" placeholder="Dupont" required>
							</div>
						</div>
						<br/>
						<div class="form-row">
							<div class="col">
								<label for="inputEmail">Email :</label>
								<input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="jdupont@gmail.com" required>
							</div>
						</div>
						<br/>
						<div class="form-row">
							<div class="col">
								<label for="inputPassword1">Mot de passe :</label>
								<input type="password" class="form-control" id="inputPassword1" placeholder="Mot de passe" required>
							</div>
							<div class="col">
								<label for="inputPassword2">Confirmation : </label>
								<input type="password" class="form-control" id="inputPassword2" placeholder="Mot de passe" required>
							</div>
						</div>
						<br/>
						<div class="form-row">
							<div class="col">
								<label for="inputStatut">Statut :</label>
								<select class="form-control" id="inputStatut">
									<option>Client</option>
									<option>Reprographie</option>
								</select>
							</div>
							<div class="col">
								<label for="inputDepartement">Département :</label>
								<select class="form-control" id="inputDepartement">
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
					
				</div>
				
				<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
				
            </div>
			
		</content>




        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
        
    </body>
</html>
