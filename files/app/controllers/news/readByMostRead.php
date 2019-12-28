<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesReadByMostRead.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesReadByMostRead.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesReadByMostRead.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesReadByMostRead.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesReadByMostRead.php";


$resultJson = articlesReadByMostRead($annee);
$resultsStats = articlesReadByMostReadStats($annee);


	$vCategories= $resultJson["title"];
	$vData= $resultJson["nb"];
?>
