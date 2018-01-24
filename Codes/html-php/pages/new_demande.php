<!doctype html>
<html lang="fr" role="main">
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Daily'Print new demande">
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
		<title> Nouvelle demande </title>
	</head>
	<body class="background-generic">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li>
						<a href="accueil.php"> <img src="../../images/logo-petit.png" class="img-responsive center-block" alt="icone du site"/> </a>
					</li>
					<li>
						<a href="accueil.php"> Accueil </a>
					</li>
					<li>
						<a href="visual.php"> Mes demandes </a>
					</li>
					<li class="active">
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

				<form method="post" action="action.php">
				<div class="row">
					<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
					<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
							<p>Date de retour souhaitée : <input type="date" name="return_date"/></p>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-xs-8 col-sm-8 col-md-6 col-lg-6">
						<fieldset>
							<legend>Type de tirage </legend>
								<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
								<p>nombre de copies : <input type="text" name="return_date"/></p>
								<br/>
								<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
								<p>copie :
									<select name="typecopie" style="width:250px">
										<option value="choisissez un type"></option>
										<option value="type1">type 1</option>
										<option value="type2">type 2</option>
										<option value="type3">type 3</option>
										<option value="type4">type 4</option>
									</select>
								</p>
								<br/>
								<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
								<p>Papier :
									<select name="typepapier" style="width:250px">
										<option value="choisissez un type"></option>
										<option value="type1">type 1</option>
										<option value="type2">type 2</option>
										<option value="type3">type 3</option>
										<option value="type4">type 4</option>
									</select>
								</p>
								<br/>
							</fieldset>
							<br/>
							<br/>
							<fieldset>
								<legend>Finition </legend>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3">
										<input type="checkbox" name="agrafe_un"/>1 agrafe</p>
									</div>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3">
										<input type="checkbox" name="agrafe_2"/> 2 agrafes</p>
									</div>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3">
										<input type="checkbox" name="livret"/> livret agrafe</p>
									</div>
									<br/>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3">
										<input type="checkbox" name="massicot"/> massicot</p>
									</div>

									<br/>
									<br/>
									<br/>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
									<div class="col-xs-1 col-sm-2 col-md-3 col-lg-3">
										<input type="checkbox" name="pliage"/> pliage</p>
									</div>
								</fieldset>
								<br/>
								<br/>
								<fieldset>
									<legend>Photographies de pubication protégées </legend>
										<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
										<p>Titre de la publication : <input type="text" name="return_date"/></p>
										<br/>
										<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
										<p>Auteur : <input type="text" name="return_date"/></p>
										<br/>
										<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
										<p>Editeur : <input type="text" name="return_date"/></p>
										<br/>
										<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
										<p>Nb de pages A4 copiées : <input type="text" name="return_date"/></p>
										<br/>
										<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3"></div>
										<p>Nb d'exemplaires/pages: <input type="text" name="return_date"/></p>
										<br/>
									</fieldset>
									<br/>
									<br/>
									<fieldset>

										<div class="row">
											<div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
												<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
													<p>Sélectionner le fichier: <input type="file" name="return_date"/></p>
												</div>
												<br/>
												<br/>
												<br/>

										<div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
												<p>Envoyer votre demande : <input type="submit" value="Envoyer le formulaire"/></p>
										</div>
									</div>




				<h1 class="center"> TODO : new_demande.php </h1>
			</content>
		</div>
	</body>
</html>
