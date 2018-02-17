<!doctype html>
<html lang="fr"  >
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Daily'Print visual">
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
		<title> Visualisation </title>
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
					<li class="active">
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
			<content class="container col-md-offset-1 col-lg-offset-1 col-xs-12 col-sm-12 col-md-10 col-lg-10 background-white cadre" role="main">
				<legend class="color-blue"> Vos demandes : </legend>
				<div class="table-responsive">
					<table class="table table-bordered table-responsive">
						<thead>
							<tr class="background-black">
								<th scope="col" class="center">#</th>
								<th scope="col" class="center">ID</th>
								<th scope="col" class="center">Fichier</th>
								<th scope="col" class="center">Date de retour</th>
								<th scope="col" class="center">Statut</th>
							</tr>
						</thead>
						<tbody class="center">
							<tr class="background-gradient-4">
								<th scope="row" class="center">1</th>
								<td>0000001</td>
								<td><a href="../../fichiers/exemple.pdf" target="blank" class="color-white"> exemple.pdf</a></td>
								<td>10 / 03 / 2018</td>
								<td>non traitée</td>
							</tr>
							<tr class="background-gradient-2">
								<th scope="row" class="center">2</th>
								<td>0000156</td>
								<td><a href="../../fichiers/exemple.pdf" target="blank"  class="color-white"> exemple.pdf</a></td>
								<td>02 / 03 / 2018</td>
								<td>en cours</td>
							</tr>
							<tr class="background-gradient-2">
								<th scope="row" class="center">3</th>
								<td>0000253</td> 
								<td><a href="../../fichiers/exemple.pdf" target="blank"  class="color-white"> exemple.pdf</a></td>
								<td>01 / 03 / 2018</td>
								<td>en cours</td>
							</tr>
							<tr class="background-gradient-3">
								<th scope="row" class="center">4</th>
								<td>0000001</td>
								<td><a href="../../fichiers/exemple.pdf" target="blank" class="color-white"> exemple.pdf</a></td>
								<td>23 / 02 / 2018</td>
								<td>traitée</td>
							</tr>
							<tr class="background-gradient-3">
								<th scope="row" class="center">5</th>
								<td>0000156</td>
								<td><a href="../../fichiers/exemple.pdf" target="blank"  class="color-white"> exemple.pdf</a></td>
								<td>20 / 02 / 2018</td>
								<td>traitée</td>
							</tr>
							<tr class="background-gradient-3">
								<th scope="row" class="center">6</th>
								<td>0000253</td> 
								<td><a href="../../fichiers/exemple.pdf" target="blank"  class="color-white"> exemple.pdf</a></td>
								<td>19 / 02 / 2018</td>
								<td>traitée</td>
							</tr>
							<tr class="background-gradient-3">
								<th scope="row" class="center">7</th>
								<td>0000001</td>
								<td><a href="../../fichiers/exemple.pdf" target="blank" class="color-white"> exemple.pdf</a></td>
								<td>15 / 02 / 2018</td>
								<td>traitée</td>
							</tr>
							<tr class="background-gradient-3">
								<th scope="row" class="center">8</th>
								<td>0000156</td>
								<td><a href="../../fichiers/exemple.pdf" target="blank"  class="color-white"> exemple.pdf</a></td>
								<td>15 / 02 / 2018</td>
								<td>traitée</td>
							</tr>
							<tr class="background-gradient-3">
								<th scope="row" class="center">9</th>
								<td>0000253</td> 
								<td><a href="../../fichiers/exemple.pdf" target="blank"  class="color-white"> exemple.pdf</a></td>
								<td>12 / 02 / 2018</td>
								<td>traitée</td>
							</tr>
						</tbody>
					</table>
				</div>
			</content>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
		</div>	
	</body>
</html>