<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByTag.php";
	$linkArticles = "../med/graphArticlesPublishedByRegion.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesPublishedByTag.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesPublishedByTag.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesPublishedByTag.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesPublishedByTag.php";


$resultJson = articlesPublishedByTag($annee);
$resultsStats = articlesPublishedByTagStats($annee);



	$vCategories= $resultJson["tag"];
	$vData= $resultJson["nb"];
?>
