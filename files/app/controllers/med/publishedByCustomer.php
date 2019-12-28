<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesPublishedByCustomer.php";
	$linkArticles = "../news/graphArticlesPublishedByCustomer.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/med/graphArticlesPublishedByCustomer.php";
	$linkGraphArea = "../../mainGraphArea/med/graphArticlesPublishedByCustomer.php";
	$linkGraphColumn = "../../mainGraphColumn/med/graphArticlesPublishedByCustomer.php";
	$linkGraphInverted = "../../mainGraphInverted/med/graphArticlesPublishedByCustomer.php";


$resultJson = articlesMedPublishedByCustomer($annee);
$resultsStats = articlesMedPublishedByCustomerStats($annee);


	$vCategories= $resultJson["customer"];
	$vData= $resultJson["nb"];
?>
