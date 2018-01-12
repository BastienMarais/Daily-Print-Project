<!doctype html>
<html lang="fr" role="main">
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Daily'Print accueil">
        <meta name="keywords" content="HTML,CSS, PHP, JavaScript">
        <meta name="author" content="Daily'Print TEAM">
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
					<li>
						<a href="accueil.php"> <img src="../../images/logo-petit.png" class="img-responsive center-block" alt="icone du site"/> </a>
					</li>
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
			<content class="container">
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
					<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
						<img src="../../images/logo.png" class="img-responsive" alt="Responsive image" />
					</div>
					<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
				</div>
				<br/>
				<div class="row">
					<div  class="col-xs-1 col-sm-1 col-md-4 col-lg-4">
						<br/>
					</div>
					<div  class="col-xs-10 col-sm-10 col-md-4 col-lg-4 background-white border-black">
						<h3> Pour créer une demande d'impression :</h3>
						<ul>
							<li> Aller sur "Nouvelle demande" </li>
						</ul>
						<h3> Pour voir vos demandes :</h3>
						<ul>
							<li> Aller sur "Mes demandes" </li>
						</ul>
						<h3> Pour vous déconnecter :</h3>
						<ul>
							<li> Aller sur votre nom </li>
						</ul>
						<h3> Pour plus d'informations :</h3>
						<ul>
							<li> Aller sur "Aide" </li>
						</ul>
					</div>
					<div  class="col-xs-1 col-sm-1 col-md-4 col-lg-4">
						<br/>
					</div>	
				</div>
			</content>
		</div>	
	</body>
</html>