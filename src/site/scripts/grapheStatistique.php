<?php // content="text/plain; charset=utf-8"
	require_once ('../jpgraph-4.2.0/src/jpgraph.php');
	require_once ('../jpgraph-4.2.0/src/jpgraph_bar.php');

	include("functions.php");
	function grapheStatistique(){
	$donnee=array("INFO","MMI","GEII","Reprographie","Recherche","Autre");
	$data1y=array();
	$champEtat = $_POST['champEtat'];
	if($champEtat == 'ALL'){
		$etat = "All";
	}if($champEtat == 'En attente'){
		$etat = "En attente";
	}if($champEtat == 'Validée'){
		$etat = "Validée";
	}if($champEtat == 'Annulée'){
		$etat = "Annulée";
	}if($champEtat == 'En cours'){
		$etat = "En cours";
	}
	foreach ($donnee as $i=>$value) {
		$data1y[$i]	= new_request_graphe($value, $champEtat);
	}

	// Create the graph. These two calls are always required
	$graph = new Graph(800,600,'auto');
	$graph->SetScale("textlin");

	$theme_class=new UniversalTheme;
	$graph->SetTheme($theme_class);

	$graph->yaxis->SetTickPositions(array(0,min($data1y),round(((max($data1y)+min($data1y))/2), 0, PHP_ROUND_HALF_UP),max($data1y)));
	$graph->SetBox(false);

	$graph->ygrid->SetFill(false);
	$graph->xaxis->SetTickLabels(array('INFO','MMI','GEII','Recherche','Reprographie','Autre'), array('#85c1e9','#f5b7b1','#edbb99','#52be80', '#bb8fce', 'black'));
	$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,14);
	$graph->yaxis->HideLine(false);
	$graph->yaxis->HideTicks(false,false);
	$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,12);

	// Create the bar plots
	$b1plot = new BarPlot($data1y);

	//création du soustitre
	$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
	$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");
	$datefr = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y"); 
	$ChampsDate = $_POST['champDate'];
	if($ChampsDate == 'Journalier'){
		if($etat === "All"){
			$soustitre = "pour le ".$datefr." pour toutes les demandes";
		}
		else {
			$soustitre = "pour le ".$datefr." à l'état de '".$etat . "'";
		}
		$datefr = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
		
	}if($ChampsDate == 'Mensuelle'){
		if($etat === "All"){
			$soustitre = "pour le mois de ".$datefr." pour toutes les demandes";
		}
		else{
			$soustitre = "pour le mois de ".$datefr." à l'état de '".$etat . "'";
		}
		$datefr = $mois[date("n")];
	}if($ChampsDate == 'Annuelle'){
		$datefr = date("Y");
		if($etat === "All"){
			$soustitre = "pour l'année ".$datefr." pour toutes les demandes";
		}
		else {
			$soustitre = "pour l'année ".$datefr." à l'état de '".$etat . "'";
		}
		
	}
	
	// Create the grouped bar plot
	$gbplot = new GroupBarPlot(array($b1plot));
	// ...and add it to the graPH
	$graph->Add($gbplot);
	$b1plot->value->Show();
	$b1plot->value->SetFormat('%d');
	$b1plot->value->SetFont(FF_ARIAL,FS_NORMAL,12);
	$b1plot->SetColor(array('#85c1e9', '#f5b7b1', '#edbb99','#52be80','#bb8fce','black'));
	$b1plot->SetFillColor(array('#85c1e9', '#f5b7b1', '#edbb99','#52be80','#bb8fce','black'));
	$todayAnnee = date("Y");
	$graph->title->Set("Nombre de copie par département");
	$graph->title->SetFont(FF_ARIAL,FS_BOLD,20);
	$graph->subtitle->Set($soustitre);
	$graph->subtitle->SetFont(FF_ARIAL,FS_BOLD,20);

	// Display the graph
	$filename = "../img/statistique.png";
	 
	if (file_exists($filename)) {
		unlink($filename);
		$graph->Stroke($filename);
		echo "<center><img src='".$filename."' /><center>";
	}else {
		$graph->Stroke($filename);
		echo "<center><img src='".$filename."' /><center>";
	}
	}
?>