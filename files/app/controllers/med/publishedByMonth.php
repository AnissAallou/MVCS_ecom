<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByMonth.php";
	$linkArticles = "../news/graphArticlesPublishedByMonth.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/med/graphArticlesPublishedByMonth.php";
	$linkGraphArea = "../../mainGraphArea/med/graphArticlesPublishedByMonth.php";
	$linkGraphColumn = "../../mainGraphColumn/med/graphArticlesPublishedByMonth.php";
	$linkGraphInverted = "../../mainGraphInverted/med/graphArticlesPublishedByMonth.php";



$resultJson = articlesMedPublishedByMonth($annee);
$resultsStats = articlesMedPublishedByMonthStats($annee);

	$vCategories= $resultJson["month"];
	$vData= $resultJson["nb"];
?>
