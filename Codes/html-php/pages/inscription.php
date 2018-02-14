<!doctype html>
<html lang="fr"  >

    <head>
        <meta charset="utf-8">
        <meta name="description" content="Daily'Print inscription">
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
	    
	<link rel="apple-touch-icon" sizes="180x180" href="../../images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon-16x16.png">
	<link rel="manifest" href="../../js/manifest.json">
	<link rel="mask-icon" href="../../images/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">

	    
        <title> Rejoignez nous !</title>
    </head>

    <body class="background-generic">
        <content class="container" role="main">
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <img src="../../images/logo.png" class="img-responsive" alt="Responsive image" />
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
            <br/>
            <div class="row ">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4 background-white cadre">
                    <legend>Inscription : </legend>
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputSurname" class="col-sm-4 control-label">Nom</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputSurname" placeholder="Votre nom">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputName" class="col-sm-4 control-label">Prénom</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputName" placeholder="Votre prénom">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-4 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail" placeholder="best_mail_ever@mail.fr">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword1" class="col-sm-4 control-label">Mot de passe</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword1" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword2" class="col-sm-4 control-label">Confirmer</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Statut</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="inputStatus">
									<option value="client">Client</option>
									<option value="reprographie">Service reprographie</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Départements</label>
                            <div class="col-sm-8">
                                <select class="form-control" name="inputDept">
									<option value="INFO">INFO</option>
									<option value="MMI">MMI</option>
									<option value="GEII">GEII</option>
									<option value="Recherches">Recherches</option>
									<option value="REPRO">Reprographie</option>
									<option value="Autre">Autre</option>
								</select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-4">
                                <button type="submit" class="btn background-gradient">S'inscrire</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
            <br/>
            <br/>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <form class="form-horizontal" action="../index.php">
                        <button type="submit" class="btn background-gradient-2">Retour</button>
                    </form>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
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
