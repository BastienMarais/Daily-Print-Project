<?php
	// On démarre la session AVANT toute chose
	session_start();
	
	// S'il n'a rien a faire ici 
	if($_SESSION['statut'] !== "Admin"){
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

        <title>Daily Print | Nouvelles inscriptions</title>

    </head>
    <body>

		<!-- Navbar -->
		<nav class="nav nav-pills nav-justified navbar-dark bg-dark">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<a class="nav-item nav-link active" href="admin-news.php">Nouvelles inscriptions</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<a class="nav-item nav-link" href="admin-users.php">Liste des utilisateurs</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
				<a class="nav-item nav-link" href="admin-clean.php">Nettoyage de la base</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
				<a class="nav-item nav-link" href="param.php">Paramètres</a>
			</div> 
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
				<a class="nav-item nav-link" href="../scripts/deconnexion.php">Se déconnecter</a>
			</div> 
		</nav>

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
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>

                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel">

                    <legend class="color-blue">Nouvelles inscriptions : <a  class="mini" href="https://bastienmarais.github.io/Daily-Print-Project/" target="_blank"> Besoin d'aide ? </a></legend>

					<!-- Div modifiée par le js -->
					<div id="data">
						<table class="table table-hover table-bordered table-responsive">
							<thead>
								<tr class="background-black">
									<th scope="col" class="center">#</th>
									<th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Prénom</th>
									<th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Nom</th>
									<th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Email</th>
									<th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Statut</th>
									<th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Département</th>
									<th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-1">Accepter</th>
									<th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-1">Refuser</th>
								</tr>
						  </thead>
						  
							<?php 	
								include("../scripts/functions.php"); 
								recover_new_account();
							?>

					</div>
					
					
				</div>


				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
			</div>
		</content>



        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    </body>
</html>
