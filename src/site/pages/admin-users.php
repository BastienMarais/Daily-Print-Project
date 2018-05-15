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

        <title>Daily Print | Liste des utilisateurs</title>

    </head>
    <body>

		<!-- Navbar -->
		<nav class="nav nav-pills nav-justified navbar-dark bg-dark">
			<a class="nav-item nav-link" href="admin-news.php">Nouvelles inscriptions</a>
			<a class="nav-item nav-link active" href="admin-users.php">Liste des utilisateurs</a>
			<a class="nav-item nav-link" href="admin-param.php">Paramètres</a>
		    <form action="../scripts/deconnexion.php">
				<button type="submit" class="nav-item nav-link deconnexion">Se déconnecter</button>
			</form>
		</nav>

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

                    <legend class="color-blue">Listes des utilisateurs : </legend>

					<!-- Div modifiée par le js -->
					<div id="data">
            <table class="table table-hover table-bordered table-responsive">
              <thead>
                <tr class="background-black">
                  <th scope="col" class="center">#</th>
                  <th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Nom</th>
                  <th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Prénom</th>
                  <th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Email</th>
                  <th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Statut</th>
                  <th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Département</th>
                  <th scope="col" class="center col-xs-2 col-sm-2 col-md-2 col-lg-2">Options</th>
                </tr>
              </thead>
					</div>

				</div>

				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
			</div>
		</content>



        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src='../js/admin-users.js'></script>

    </body>
</html>
