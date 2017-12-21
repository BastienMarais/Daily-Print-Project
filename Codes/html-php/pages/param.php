<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Daily'Print param">
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
		<title> Paramètres </title>
	</head>
	<body class="background-generic">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li>
						<a href="accueil.php"> <img src="../../images/logo-petit.png" class="img-responsive center-block"/> </a>
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
						<legend> Partie mot de passe :</legend>
						<form class="form-horizontal">
							<div class="form-group">
								<label for="inputPassword1" class="col-sm-2 control-label">Mot de passe actuel :</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword1" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword2" class="col-sm-2 control-label">Nouveau mot de passe :</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword2" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword1" class="col-sm-2 control-label">Confirmer le mdp :</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="inputPassword1" placeholder="Password">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Changer mot de passe</button>
								</div>
							</div>
						</form>
					</div>
					<div  class="col-xs-1 col-sm-1 col-md-4 col-lg-4">
						<br/>
					</div>	
				</div>
				<br/>
				<div class="row">
					<div  class="col-xs-1 col-sm-1 col-md-4 col-lg-4">
						<br/>
					</div>
					<div  class="col-xs-10 col-sm-10 col-md-4 col-lg-4 background-white border-black">
						<legend> Partie notification :</legend>
						<h1>TODO </h1>
					</div>
					<div  class="col-xs-1 col-sm-1 col-md-4 col-lg-4">
						<br/>
					</div>	
				</div>
			</content>
		</div>	
	</body>
</html>