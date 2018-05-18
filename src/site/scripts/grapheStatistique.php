<?php // content="text/plain; charset=utf-8"
	require_once ('../jpgraph-4.2.0/src/jpgraph.php');
	require_once ('../jpgraph-4.2.0/src/jpgraph_bar.php');

	include("functions.php");

	$resultatINFO = new_request_graphe("INFO","ALL");
	$dataINFOy=array($resultatINFO);
	$resultatMMI = new_request_graphe("MMI","ALL");
	$dataMMIy=array($resultatMMI);
	$resultatGEII = new_request_graphe("GEII","ALL");
	$dataGEIIy=array($resultatGEII);
	$resultatReprographie = new_request_graphe("Reprographie","ALL");
	$dataRecherchey=array($resultatReprographie);
	$resultatRecherche = new_request_graphe("Recherche","ALL");
	$dataReprographiey=array($resultatRecherche);
	$resultatAutre = new_request_graphe("Autre","ALL");
	$dataAutrey=array($resultatAutre);
	$data1y=array($resultatINFO, $resultatMMI, $resultatGEII, $resultatRecherche, $resultatReprographie, $resultatAutre);

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

	// Create the grouped bar plot
	$gbplot = new GroupBarPlot(array($b1plot));
	// ...and add it to the graPH
	$graph->Add($gbplot);
	$b1plot->value->Show();
	$b1plot->value->SetFormat('%d');
	$b1plot->value->SetFont(FF_ARIAL,FS_NORMAL,12);
	$b1plot->SetColor(array('#85c1e9', '#f5b7b1', '#edbb99','#52be80','#bb8fce','black'));
	$b1plot->SetFillColor(array('#85c1e9', '#f5b7b1', '#edbb99','#52be80','#bb8fce','black'));
	$todayAnnee = date("y");
	$graph->title->Set("Nombre de demande par département en 20".$todayAnnee);
	$graph->title->SetFont(FF_ARIAL,FS_BOLD,20);

	// Display the graph
	$filename = "../img/statistique.png";
	 
	if (file_exists($filename)) {
		unlink($filename);
		$graph->Stroke($filename);
		echo "<center><img src='".$filename."' /><center>";
	} else {
		$graph->Stroke($filename);
		echo "<center><img src='".$filename."' /><center>";
	}
?>