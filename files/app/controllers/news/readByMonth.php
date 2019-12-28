<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesReadByMonth.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesReadByMonth.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesReadByMonth.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesReadByMonth.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesReadByMonth.php";


$resultJson = articlesReadByMonth($annee);
$resultsStats = articlesReadByMonthStats($annee);


	$vCategories= $resultJson["month"];
	$vData= $resultJson["nb"];
?>
