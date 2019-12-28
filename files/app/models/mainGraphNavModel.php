<?php
// Modèle générique
// Nous allons définir toutes les variables qui seront utilisées

// ini_set('display_errors', '1');
ini_set('max_execution_time', 300);
ini_set('display_errors','1');
// require('../../../../config.php');
include('../../../../../web/home/includes_session.php');
// include('../../../../../web/home/includes_db.php');

// Gestion de la session
// include_once('../../../../../web/home/includes_session.php');

// Connexion à la base de données
// include_once('../../../../../files/config.php');
// include_once('../../../../../web/home/includes.php');



$vViewMainGraph = true;
$vViewMainGraphArea = true;
$vViewMainGraphColumn = true;
$vViewMainGraphInverted = true;
$linkGraph = '';
$linkGraphArea = '';
$linkGraphColumn = '';
$linkGraphInverted = '';


// Modèle générique
$page= '';
$linkArticles = '';


?>
<script>
var vCategories= [];
var vData= [];
var vTitle = '';
var yTitle = '';
var vSerieName = '';
</script>
