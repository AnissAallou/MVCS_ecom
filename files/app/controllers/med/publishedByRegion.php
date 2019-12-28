<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByRegion.php";
	$linkArticles = "../news/graphArticlesPublishedByTag.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/med/graphArticlesPublishedByRegion.php";
	$linkGraphArea = "../../mainGraphArea/med/graphArticlesPublishedByRegion.php";
	$linkGraphColumn = "../../mainGraphColumn/med/graphArticlesPublishedByRegion.php";
	$linkGraphInverted = "../../mainGraphInverted/med/graphArticlesPublishedByRegion.php";



$resultJson = articlesMedPublishedByRegion($annee);
$resultsStats = articlesMedPublishedByRegionStats($annee);


	$vCategories= $resultJson["region"];
	$vData= $resultJson["nb"];
?>
