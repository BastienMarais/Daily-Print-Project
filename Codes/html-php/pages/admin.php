<!doctype html>
<html lang="fr"  >
	<head>
		<meta charset="utf-8">
        <meta name="description" content="Daily'Print Admin Panel">
        <meta name="keywords" content="HTML,CSS, PHP, JavaScript">
        <meta name="author" content="Daily'Print TEAM">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Déclatration des styles css et scripts js -->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="../../js/validate.js"></script>
		<link rel="stylesheet" href="../../css/style.css">
		<link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon"/>
		<title> Panel Admin / Demandes </title>
	</head>
	<body class="background-generic">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<ul class="nav navbar-nav">
					<li>
						<a href="admin.php"> <img src="../../images/logo-petit.png" class="img-responsive center-block" alt="icone du site"/> </a>
					</li>
					<li class="active">
						<a href="admin.php"> Demandes d'inscription en attente </a>
					</li>
					<li>
						<a href="admin_users.php"> Liste des utilisateurs </a>
					</li>
					<li>
						<a href="admin_aide.php"> Aide admin </a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown">
							admin@dailyprint.xyz
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="admin_param.php">Mes paramètres</a></li>
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
					<table class="table table-hover table-bordered table-responsive">
						<thead>
							<tr class="background-black">
								<th scope="col" class="center">#</th>
								<th scope="col" class="center">Nom</th>
								<th scope="col" class="center">Prénom</th>
								<th scope="col" class="center">Email</th>
								<th scope="col" class="center">Statut</th>
								<th scope="col" class="center">Département</th>
								<th scope="col" class="center">Options</th>
							</tr>
						</thead>
						<tbody class="center">
							<tr id="1">
								<th scope="row" class="center">1</th>
								<td>Nom_1</td>
								<td>Prénom_1</td>
								<td>user.1@gmail.com</td>
								<td>Reprographie</td>
								<td>Reprographie</td>
								<td>
									<form>
										<input type="submit" id="acc1" value="Accepter" class="btn background-gradient-3"/>
										<input type="submit"id="ref1" value="Refuser" class="btn background-gradient-4"/>
										<p id="datehour">
											 <?php
												$date = date("d-m-Y H:i:s");
												list($finDate,$finHeure) = preg_split('/ /',$date);
												list($finAnnee,$finMois,$finJr) = preg_split('/-/',$finDate);
												list($finHrs,$finMin) = preg_split('/:/',$finHeure);
												echo 'Validé le '.$finDate.' à '.$finHeure;
  										?>
										</p>
									</form>
								</td>
							</tr>
							<tr id="2">
								<th scope="row" class="center">2</th>
								<td>Nom_2</td>
								<td>Prénom_2</td>
								<td>user.2@gmail.com</td>
								<td>Professeur</td>
								<td>INFO</td>
								<td>
									<form>
										<input type="submit" id="acc2" value="Accepter" class="btn background-gradient-3"/>
										<input type="submit" id="ref2" value="Refuser" class="btn background-gradient-4"/>
										<p id="datehour2">
											 <?php
												$date = date("d-m-Y H:i:s");
												list($finDate,$finHeure) = preg_split('/ /',$date);
												list($finAnnee,$finMois,$finJr) = preg_split('/-/',$finDate);
												list($finHrs,$finMin) = preg_split('/:/',$finHeure);
												echo 'Validé le '.$finDate.' à '.$finHeure;
  										?>
										</p>
									</form>
								</td>
							</tr>
							<tr id="3">
								<th scope="row" class="center">3</th>
								<td>Nom_3</td>
								<td>Prénom_1</td>
								<td>user.3@gmail.com</td>
								<td>Professeur</td>
								<td>GEII</td>
								<td>
									<form>
										<input type="submit" id="acc3" value="Accepter" class="btn background-gradient-3"/>
										<input type="submit" id="ref3" value="Refuser" class="btn background-gradient-4"/>
										<p id="datehour3">
											<?php
												$date = date("d-m-Y H:i:s");
												list($finDate,$finHeure) = preg_split('/ /',$date);
												list($finAnnee,$finMois,$finJr) = preg_split('/-/',$finDate);
												list($finHrs,$finMin) = preg_split('/:/',$finHeure);
												echo 'Validé le '.$finDate.' à '.$finHeure;
  										?>
										</p>
									</form>
								</td>
							</tr>
							<tr id="4">
								<th scope="row" class="center">4</th>
								<td>Nom_4</td>
								<td>Prénom_4</td>
								<td>user.4@gmail.com</td>
								<td>Reprographie</td>
								<td>Reprographie</td>
								<td>
									<form>
										<input type="submit" id="acc4" value="Accepter" class="btn background-gradient-3"/>
										<input type="submit" id="ref4" value="Refuser" class="btn background-gradient-4"/>
										<p id="datehour4">
											 <?php
												$date = date("d-m-Y H:i:s");
												list($finDate,$finHeure) = preg_split('/ /',$date);
												list($finAnnee,$finMois,$finJr) = preg_split('/-/',$finDate);
												list($finHrs,$finMin) = preg_split('/:/',$finHeure);
												echo 'Validé le '.$finDate.' à '.$finHeure;
  										?>
										</p>
									</form>
								</td>
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
			<br/>		</div>
	</body>
</html>
