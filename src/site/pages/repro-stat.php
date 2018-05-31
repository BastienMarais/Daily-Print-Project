<?php
	// On démarre la session AVANT toute chose
	session_start(); 
	
	// S'il n'a rien a faire ici 
	if($_SESSION['statut'] !== "Reprographie"){
		include("../scripts/deconnexion.php");
		deconnexion_site();
	}
?>
<!doctype html>
<html lang="fr">
    <head>
    
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Daily Print">
        <meta name="keywords" content="HTML,CSS, PHP, JavaScript">
        <meta name="author" content="Daily Print TEAM">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
		
		<!-- My css -->
        <link rel="stylesheet" href="../css/style.css">       
		
        <title>Daily Print | Statistiques</title>
        
    </head>
    <body>
    
         <!-- Navbar -->
		<nav class="nav nav-pills nav-justified navbar-dark bg-dark">
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<a class="nav-item nav-link" href="repro-visual.php">Les demandes</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<a class="nav-item nav-link active" href="repro-stat.php">Statistiques</a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<a class="nav-item nav-link" href="param.php">Paramètres</a>
			</div> 
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<a class="nav-item nav-link" href="../scripts/deconnexion.php">Se déconnecter</a>
			</div> 
		</nav>
        
		<content class="container" role="main">
		
            <div class="row">
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-8 col-md-4 col-lg-4">
                    <img src="../img/titre.png" class="img-fluid" alt="Responsive image" />
                </div>
                <div class="col-xs-2 col-sm-2 col-md-4 col-lg-4"></div>
            </div>
			
            <br/>
			
            <div class="row ">
                <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
				
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel">
				
                    <legend class="color-blue">Statistiques : <a  class="mini" href="https://bastienmarais.github.io/Daily-Print-Project/" target="_blank"> Besoin d'aide ? </a></legend>
					<br/>
					<form method="POST" action="repro-stat.php">
						<div class="col">
							<label for="inputDate">Suivi période : </label>
							<select name="champDate" class="form-control" >
								<option value="Journalier"<?php if(!empty($_POST['champDate'])){if($_POST['champDate'] == "Journalier"){echo "selected";}}?>>Journalier</option>
								<option value="Mensuelle" <?php if(!empty($_POST['champDate'])){if($_POST['champDate'] == "Mensuelle"){echo "selected";}}?>>Mensuelle</option>
								<option value="Annuelle" <?php if(!empty($_POST['champDate'])){if($_POST['champDate'] == "Annuelle"){echo "selected";}}else{echo "selected";}?> >Annuelle</option>	
							</select>
							<label for="inputEtat">Etat : </label>
							<select name="champEtat" class="form-control" >
								<option value="ALL" <?php  if(!empty($_POST['champEtat'])){if($_POST['champEtat'] == "ALL"){echo "selected";}}else{echo "selected";}?>>Toutes les demandes</option>
								<option value="En attente"<?php if(!empty($_POST['champEtat'])){if($_POST['champEtat'] == "En attente"){echo "selected";}}?>>En attente</option>
								<option value="En cours" <?php if(!empty($_POST['champEtat'])){if($_POST['champEtat'] == "En cours"){echo "selected";}}?>>En cours</option>
								<option value="Validée" <?php if(!empty($_POST['champEtat'])){if($_POST['champEtat'] == "Validée"){echo "selected";}}?>>Validée</option>
								<option value="Annulée" <?php if(!empty($_POST['champEtat'])){if($_POST['champEtat'] == "Annulée"){echo "selected";}}?>>Annulée</option>
							</select>
							<br/>
							<button type="submit" class="btn btn-primary">Afficher le graphe</button>
						</div>
					</form>
					<br/>
					<?php
						if (!empty($_POST['champDate']) && !empty($_POST['champEtat']) ){ ### Si ce n'est pas vide
							include("../scripts/grapheStatistique.php");
							grapheStatistique();
						}
					?>
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
			</div>
		</content>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        
        
    </body>
</html>
