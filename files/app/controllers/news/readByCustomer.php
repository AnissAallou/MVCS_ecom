<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesReadByCustomer.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesReadByCustomer.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesReadByCustomer.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesReadByCustomer.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesReadByCustomer.php";


$resultJson = articlesReadByCustomer($annee);
$resultsStats = articlesReadByCustomerStats($annee);


	$vCategories= $resultJson["customer"];
	$vData= $resultJson["nb"];
?>
