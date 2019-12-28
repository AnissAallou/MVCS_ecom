<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByFreelance.php";
	$linkArticles = "../med/graphArticlesPublishedByFreelance.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesPublishedByFreelance.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesPublishedByFreelance.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesPublishedByFreelance.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesPublishedByFreelance.php";


$resultJson = articlesPublishedByFreelance($annee);
$resultsStats = articlesPublishedByFreelanceStats($annee);


	$vCategories= $resultJson["freelance"];
	$vData= $resultJson["nb"];
?>
