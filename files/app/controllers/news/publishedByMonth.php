<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByMonth.php";
	$linkArticles = "../med/graphArticlesPublishedByMonth.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesPublishedByMonth.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesPublishedByMonth.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesPublishedByMonth.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesPublishedByMonth.php";


$resultJson = articlesPublishedByMonth($annee);
$resultsStats = articlesPublishedByMonthStats($annee);

	$vCategories= $resultJson["month"];
	$vData= $resultJson["nb"];
?>
