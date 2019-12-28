<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByCustomer.php";
	$linkArticles = "../med/graphArticlesPublishedByCustomer.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesPublishedByCustomer.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesPublishedByCustomer.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesPublishedByCustomer.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesPublishedByCustomer.php";


$resultJson = articlesPublishedByCustomer($annee);
$resultsStats = articlesPublishedByCustomerStats($annee);


	$vCategories= $resultJson["customer"];
	$vData= $resultJson["nb"];
?>
