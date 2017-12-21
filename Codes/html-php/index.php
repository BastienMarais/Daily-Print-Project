<!doctype html>
<html lang="fr">

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
        <content class="container">
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
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4 background-white border-black">
                    <legend>Se connecter : </legend>
                    <form class="form-horizontal" action="pages/accueil.php">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Email :</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Mot de passe :</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <a href="pages/oubli.php" class="color-red">Mot de passe oublié ???</a>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
										<input type="checkbox"> Se souvenir de moi
									</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default"> Connexion </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
            <br/>
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <form class="form-horizontal" action="pages/inscription.php">
                        <button type="submit" class="btn btn-default">Créer un compte</button>
                    </form>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
        </content>
    </body>

</html>
