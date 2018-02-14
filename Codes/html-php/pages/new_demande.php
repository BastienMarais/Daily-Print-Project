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
        <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon" />
        <title> Nouvelle demande </title>
    </head>

    <body class="background-generic">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li> <a href="accueil.php"> <img src="../../images/logo-petit.png" class="img-responsive center-block" alt="icone du site"/> </a> </li>
                    <li> <a href="accueil.php"> Accueil </a> </li>
                    <li> <a href="visual.php"> Mes demandes </a> </li>
                    <li class="active"> <a href="new_demande.php"> Nouvelle demande </a> </li>
                    <li> <a href="aide.php"> Aide </a> </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"> <a href="" class="dropdown-toggle" data-toggle="dropdown">
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

        <div class="container-fluid">
            <content class="container">

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 "></div>
                <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2 "></div>
                <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8 background-white border-black">
                    <form method="post" action="action.php">
                        <div class="col-xs-2 col-sm-2 col-md-4 col-lg-12"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 "></div>
                        <h1 class="border-black text-center" id=haut_page>Remplissez ce formulaire de demande</h1>
                        <br/>
						<br/>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3 "></div>
                            <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3">
								<label for="inputReturnDate">Date de retour souhaitée :</label>
							</div>
                            <div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">
                                <input type="date" id="inputReturnDate" />
							</div>
							<br/>
							<br/>
							<br/>
							<br/>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                            <div class="col-xs-1 col-sm-1 col-md-2 col-lg-3 "></div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <fieldset class="border-black">
                                    <legend>Type de tirage </legend>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                                         <label for="inputCopyNumber">Nombre de copies :</label> </div>
                                    <div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">
                                        <input type="text" id="inputCopyNumber" />
									</div>
                                    <br/>
									<br/>
                                    <div class="col-xs-2 col-sm-2 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-8 col-sm-8 col-md-5 col-lg-5">
                                        <label for="inputCopyType">Copie :</label>
									</div>
                                    <div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">
                                        <select name="typecopie" style="width:187px">
											<option value="choisissez un type"></option>
											<option value="type1">type 1</option>
											<option value="type2">type 2</option>
											<option value="type3">type 3</option>
											<option value="type4">type 4</option>
										</select>
									</div>
                                    <br/>
									<br/>
                                    <div class="col-xs-2 col-sm-2 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-8 col-sm-8 col-md-5 col-lg-5">
                                        <label for="inputPaperType">Papier :</label>
									</div>
                                    <div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">
                                        <select name="typepapier" style="width:187px">
											<option value="choisissez un type"></option>
											<option value="type1">type 1</option>
											<option value="type2">type 2</option>
											<option value="type3">type 3</option>
											<option value="type4">type 4</option>
										</select>
										<br/>
										<br/>
									</div>
                                    <br/>
								</fieldset>
								<br/>
								<br/>
                                <fieldset class="border-black">
                                    <legend>Finitions </legend>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3"></div>
                                    <div class="col-xs-5 col-sm-4 col-md-4 col-lg-3">
                                        <label for="inputAgrafe1">1 agrafe</label>
										<br/>
										<input type="checkbox" id="inputAgrafe1" /> 
                                    </div>
                                    <div class="col-xs-5 col-sm-4 col-md-5 col-lg-3">
                                        <label for="inputAgrafe2">2 agrafes</label>
										<br/>
										<input type="checkbox" id="inputAgrafe2" /> 
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-12 col-lg-3"></div>
                                    <div class="col-xs-5 col-sm-4 col-md-4 col-lg-2">
                                        <label for="livret">Livret</label>
										<br/>
										<input type="checkbox" id="livret" /> 
                                    </div>
                                    <div class="col-xs-5 col-sm-12 col-md-8 col-lg-3"></div>
                                    <div class="col-xs-5 col-sm-4 col-md-8 col-lg-1">
                                        <label for="massicot">Massicot</label>
										<br/>
										<input type="checkbox" id="massicot" /> 
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2"></div>
                                    <div class="col-xs-5 col-sm-4 col-md-4 col-lg-1">
                                        <label for="pliage">Pliage</label>
										<br/>
										<input type="checkbox" id="pliage" /> 
                                    </div>
                                </fieldset>
								<br/>
								<br/>
                                <fieldset class="border-black">
                                    <legend>Publications protégées </legend>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
										<label for="publicationTitle">Titre de la publication :</label>
									</div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" id="publicationTitle" />
									</div>
                                    <br/>
									<br/>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label for="author">Auteur :</label>
									</div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" id="author" /> 
									</div>
                                    <br/>
									<br/>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label for="editor">Editeur :</label> 
									</div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" id="editor" /> 
									</div>
                                    <br/>
									<br/>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label for="numberCopiedPages">Nb de pages A4 copiées :</label> 
									</div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                        <input type="text" id="numberCopiedPages" /> 
									</div>
                                    <br/>
									<br/>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <label for="numberExByPages">Nb d'exemplaires/pages :</label> 
									</div>
                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                        <input type="text" id="numberExByPages" /> 
									</div>
                                    <br/>
									<br/>
									<br/>
									<br/>
									<br/>
									<br/>
								</fieldset>
								<br/>
								<br/>
                                <fieldset>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                            <label for="fileSelector">Sélectionner le fichier:</label> 
										</div>
                                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                            <input type="file" id="fileSelector" /> 
										</div>
                                    </div>
								</fieldset>
								<br/>
								<br/>
								<div class="row">
									<div class="col-xs-4 col-sm-4 col-md-5 col-lg-5 "></div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
										<input type="submit" value="envoyer" />
									</div>
									<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5"></div>
								</div>
								<br/>
								<br/>
							</div>
                        </div>
					</form>
                </div>
            </content>
        </div>
        <footer class="footer text-center background-grey-text-white row">
            <div>
                <a href='#haut_page'> Retourner en haut </a>
            </div>
        </footer>
    </body>
</html>
