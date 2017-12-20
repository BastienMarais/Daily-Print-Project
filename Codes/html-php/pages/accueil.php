<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Web tuto">
		<meta name="keywords" content="HTML,CSS,JavaScript">
		<meta name="author" content="Bastien Marais">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Déclatration des styles css et scripts js -->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="../../css/style.css">
		<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon"/>
		<title> ACCUEIL </title>
	</head>
	<body class="background-generic">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="accueil.php"> Accueil </a>
					</li>
					<li>
						<a href="visual.php"> Mes demandes </a>
					</li>
					<li>
						<a href="new_demande.php"> Nouvelle demande </a>
					</li>
					<li>
						<a href="aide.php"> Aide </a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							email du prof a afficher
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="param.php">Mes paramètres</a></li>
							<li><a href="../index.php">Se déconnecter</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<br/>
		<br/>
		<div class="container-fluid">
			
			<!-- Corps de la page -->
			<content class="container">
				<div class="jumbotron">
					<div class="container">
						<h1> Bienvenue sur Daily'Print </h1>
						<h2> Pour créer une demandes
					</div>
				</div>
				<br/>
				<br/>
				<br/>
				<br/>
				
			</content>
		</div>	
	</body>
</html>