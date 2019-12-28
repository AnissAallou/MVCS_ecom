<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesReadByFreelance.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesReadByFreelance.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesReadByFreelance.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesReadByFreelance.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesReadByFreelance.php";


$resultJson = articlesReadByFreelance($annee);
$resultsStats = articlesReadByFreelanceStats($annee);


	$vCategories= $resultJson["freelance"];
	$vData= $resultJson["nb"];
?>
