<?php
// ini_set('display_errors', '1');
// include('../../../app/models/mainGraphNavModel.php');
// include('../../../app/services/callApiArticlesRead.php');
// include('../../../app/controllers/articlesReadByCustomer.php');
// Inclusion des modèles, services et contrôleurs
// include('../models/form.php');
// include('../controllers/articlesReadByCustomer.php');
// include('../controllers/navArticlesReadByCustomer.php');
// include('../mainHeader.html');
// include('../../../app/models/navGeneric.php');
// include('../views/php/formulaire/generic.php');
// include('../views/php/stats/stats.php');
//<script src="../models/mainGraphModel.js"></script>
// include('../mainGraph.html');
// include('../../../app/controllers/graphObjectsReadByCustomer.php');
// include('../../../app/models/graphObjects.php');
// <script src="../models/graphArticlesReadByCustomer.js"></script>
// include('../mainFooter.html');
include('../../../../app/models/mainGraphNavModel.php');
include('../../../../app/services/news/callApiArticlesReadByCustomer.php');
include('../../../../app/controllers/navController.php');
include('../../../../app/controllers/news/readByCustomer.php');
include('../../mainHeader.html');
include('../../../../app/models/navGeneric.php');
include('../../../../app/models/yearGeneric.php');
include('../../mainGraph.html');
include('../../../../app/controllers/news/graphObjectsReadByCustomer.php');
include('../../../../app/models/graphObjects.php');
include('../../mainFooter.html');
?>
