<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByFreelance.php";
	$linkArticles = "../news/graphArticlesPublishedByFreelance.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/med/graphArticlesPublishedByFreelance.php";
	$linkGraphArea = "../../mainGraphArea/med/graphArticlesPublishedByFreelance.php";
	$linkGraphColumn = "../../mainGraphColumn/med/graphArticlesPublishedByFreelance.php";
	$linkGraphInverted = "../../mainGraphInverted/med/graphArticlesPublishedByFreelance.php";



$resultJson = articlesMedPublishedByFreelance($annee);
$resultsStats = articlesMedPublishedByFreelanceStats($annee);


	$vCategories= $resultJson["freelance"];
	$vData= $resultJson["nb"];
?>
