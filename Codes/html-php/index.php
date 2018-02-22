<!doctype html>
<html lang="fr"  >

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Daily'Print index">
        <meta name="keywords" content="HTML,CSS, PHP, JavaScript">
        <meta name="author" content="Daily'Print TEAM">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Déclatration des styles css et scripts js -->
        <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/style.css">
	
	

	<link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
	<link rel="manifest" href="../js/manifest.json">
	<link rel="mask-icon" href="../images/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">


        <title> Connectez vous !</title>
    </head>

    <body class="background-generic">
        <content class="container" role="main">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <img src="../images/logo.png" class="img-responsive" alt="Responsive image" />
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
            <br/>
            <div class="row ">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4 background-white cadre">
                    <legend class="color-blue">Se connecter : </legend>
                    <form class="form-horizontal" action="pages/accueil.php">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<label for="inputEmail">Adresse email :</label>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
								<input type="email" class="form-control" id="inputEmail" placeholder="Email" required="required"/>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<label for="inputPassword3" class="control-label">Mot de passe :</label>
							</div>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe" required="required"/>
							</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
								<label for="souvenir" class="control-label">Se souvenir :</label>
							</div>
							<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
								<input type="checkbox" class="form-control" id="souvenir"/>
							</div>
						</div>

						<div class="col-xs-4 col-sm-offset-2 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-2 col-lg-4">
							<input type="submit" class="btn background-gradient-3" value="Connexion"/> 
						</div>
					</form>
					<form class="form-horizontal" action="pages/inscription.php">
						<div class="col-xs-offset-1 col-xs-4 col-sm-offset-1 col-sm-4 col-md-offset-1 col-md-4 col-lg-offset-1 col-lg-4">
							<input type="submit" class="btn background-gradient-2" value="Créer un compte"/>
						</div>
					</form>
					<br/>
					<div class="row">
						<div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-4">
							<a href="pages/oubli.php" class="color-blue">Mot de passe oublié ?</a>
						</div>
					</div>
					
				</div>
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
    </body>

</html>
