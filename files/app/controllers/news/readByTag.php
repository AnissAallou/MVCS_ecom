<?php

	// Ici, on rempli nos variables pour l'exemple.
	// Ensuite, ces variables seront remplies par appel à une API.

	$autoLaunch = false;

	$page = "graphArticlesReadByTag.php";

	$vViewMainGraph = true;
	$vViewMainGraphArea = true;
	$vViewMainGraphColumn = true;
	$vViewMainGraphInverted = true;
	$autoLaunch = false;
	$linkGraph = "../../mainGraph/news/graphArticlesReadByTag.php";
	$linkGraphArea = "../../mainGraphArea/news/graphArticlesReadByTag.php";
	$linkGraphColumn = "../../mainGraphColumn/news/graphArticlesReadByTag.php";
	$linkGraphInverted = "../../mainGraphInverted/news/graphArticlesReadByTag.php";


$resultJson = articlesReadByTag($annee);
$resultsStats = articlesReadByTagStats($annee);


	$vCategories= $resultJson["tag"];
	$vData= $resultJson["nb"];
?>
