<?php
ini_set('display_errors', '1');
include('../../files/config.php');
include('includes_session.php');
include_once('includes_db.php');

?>
<!DOCTYPE html>
<html lang="fr">
	<header>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Graphes</title>
		<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<!-- <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript"/></script> -->
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="assets/css/index.css">
		<link rel="stylesheet" type="text/css" href="assets/css/boutondiv.css">
		<link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
		<link rel="stylesheet" type="text/css" href="assets/css/carousel.css">
		<link rel="stylesheet" type="text/css" href="assets/css/img.css">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

	</header>

	<body>

		<nav class="navbar navbar-default" id="navbar">
		<!-- <nav class="navbar navbar-default" style="background: linear-gradient(to right, mediumvioletred, blue 200px, goldenrod);"> -->
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" id="navbarbrand" href="https://ecomnews.fr/" onclick="window.open(this.href); return false;"><img src="assets/img/ecomnews.png"></a>
		      <a class="navbar-brand" id="navbarbrand2" href="http://ecomnewsmed.com/" onclick="window.open(this.href); return false;"><img src="assets/img/ecomnewsmed.png"></a>
		    <button class="btn_green" onclick="self.location.href='http://localhost:81/API-master_second-du-nom/API-master/twitterAPI/'">vers API Twitter</button>
				<!-- <button class="btn_green" onclick="self.location.href='deconnexion.php'" <!-style="margin-left: 1800px; margin-top:20px;"-->
				<!-- Déconnexion</button> -->
			<button class="btn_green" onclick="self.location.href='accueil.php'">Retour</button>
			<button class="btn_green" onclick="self.location.href='deconnexion.php'">Déconnexion</button>
			</div>


		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right" id="nav">
		        <li><button id="Bouton">Ecomnews stats<img src="assets/img/ecomnews.png"></button></li>
						<li><button id="ecn" onclick='function();'>Ecomnews stats carousel<img src="assets/img/ecomnews.png"></button></li>
		        <!-- <li><button id="Bouton" style="background: linear-gradient(to right, mediumvioletred, blue 200px);">Ecomnews stats</button></li> -->
		        <li><button id="Bouton2">Ecomnews Med stats<img src="assets/img/ecomnewsmed.png"></button></li>
				<li><button id="ecnmed" onclick='function();'>Ecomnews Med stats carousel<img src="assets/img/ecomnewsmed.png"></button></li>
		        <!-- <li><button id="Bouton2" style="background: linear-gradient(to right, blue, goldenrod 120px);">Ecomnews Med stats</button></li> -->
		        <!-- <li><a href="connexion.php">Connexion</a></li> -->
		      </ul>
		    </div>
		  </div>
		</nav>


<div id="ex2">
		<div class="center">
    	<h1>Statistiques ECN</h1>
	</div>

	<p>Consultez les statistiques d'Ecomnews et d'Ecomnews Med en temps réel.</p>


		<div class="container-fluid jump">



<div id="tonDiv">

	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByMonth.php"><h7>Articles publiés par mois (Ecomnews)</h7><img src="assets/img/ecomnews.png"></a>
	</ol>

	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesReadByMonth.php"><h7>Articles lus par mois (Ecomnews)</h7><img src="assets/img/ecomnews.png"></a>
	</ol>

	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesReadByMostRead.php"><h7>Articles les plus lus (Ecomnews)</h7><img src="assets/img/ecomnews.png"></a>
	</ol>
<br>
	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByCustomer.php"><h7>Articles publiés par client (Ecomnews)</h7><img src="assets/img/ecomnews.png"></a>
	</ol>

	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesReadByCustomer.php"><h7>Articles lus par client (Ecomnews)</h7><img src="assets/img/ecomnews.png"></a>
	</ol>

	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByTag.php"><h7>Articles publiés par tag (Ecomnews)</h7><img src="assets/img/ecomnews.png"></a>
	</ol>
<br>
	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesReadByTag.php"><h7>Articles lus par tag (Ecomnews)</h7><img src="assets/img/ecomnews.png"</a>
	</ol>

	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByFreelance.php"><h8>Articles publiés par pigiste (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
	</ol>

	<ol class="nav">
		<a href="../../files/app/views/mainGraph/news/graphArticlesReadByFreelance.php"><h7>Articles lus par pigiste (Ecomnews)</h7><img src="assets/img/ecomnews.png"></a>
	</ol>



</div>



<div id="tonDiv2">

	<ol class="nav" id="navbis">
		<a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByMonth.php"><h7>Articles publiés par mois (EcomnewsMed)</h7><img src="assets/img/ecomnewsmed.png"></a>
	</ol>

    <ol class="nav" id="navbis">
		<a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByRegion.php"><h7>Articles publiés par région (EcomnewsMed)</h7><img src="assets/img/ecomnewsmed.png"></a>
	</ol>
<br>
	<ol class="nav" id="navbis">
	<a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByCustomer.php"><h7>Articles publiés par client (EcomnewsMed)</h7><img src="assets/img/ecomnewsmed.png"></a>
	</ol>

	<!-- <div id="mdr" style="margin-left:20px; margin-top:20px;"> -->

	<ol class="nav" id="navbis">
		<a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByFreelance.php"><h7>Articles publiés par pigiste (EcomnewsMed)</h7><img src="assets/img/ecomnewsmed.png"></a>
	</ol>

<!-- </div> -->
</div>



<script src="assets/js/boutondiv.js"></script>
<script src="assets/js/container.js"></script>
<script src="assets/js/container2.js"></script>


<div id="container">


  <div id="myCarousel" class="carousel slide">
		    <!-- Indicators -->
     <ol class="carousel-indicators">
       <li class="item1 active" height="800"></li>
       <li class="item2"></li>
       <li class="item3"></li>
       <li class="item4"></li>
       <li class="item5"></li>
       <li class="item6"></li>
       <li class="item7"></li>
       <li class="item8"></li>
       <li class="item9"></li>
     </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" width="5">

      <div class="item active" width="10" height="400">
				<ol class="nav">
					<a><h8>Articles publiés par mois (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByMonth.php">Graphe basique</a></li>
			  	<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesPublishedByMonth.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesPublishedByMonth.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesPublishedByMonth.php">Graphe ordonné</a></li>
				</ol>
      </div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles lus par mois (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesReadByMonth.php">Graphe basique</a></li>
					<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesReadByMonth.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesReadByMonth.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesReadByMonth.php">Graphe ordonné</a></li>
				</ol>
			</div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles les plus plus (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesReadByMostRead.php">Graphe basique</a></li>
					<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesReadByMostRead.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesReadByMostRead.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesReadByMostRead.php">Graphe ordonné</a></li>
				</ol>
			</div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles publiés par client (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByCustomer.php">Graphe basique</a></li>
			  	<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesPublishedByCustomer.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesPublishedByCustomer.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesPublishedByCustomer.php">Graphe ordonné</a></li>
				</ol>
			</div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles plus par client (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesReadByCustomer.php">Graphe basique</a></li>
					<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesReadByCustomer.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesReadByCustomer.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesReadByCustomer.php">Graphe ordonné</a></li>
				</ol>
			</div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles publiés par tag (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByTag.php">Graphe basique</a></li>
					<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesPublishedByTag.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesPublishedByTag.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesPublishedByTag.php">Graphe ordonné</a></li>
				</ol>
			</div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles lus par tag (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesReadByTag.php">Graphe basique</a></li>
			  	<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesReadByTag.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesReadByTag.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesReadByTag.php">Graphe ordonné</a></li>
				</ol>
			</div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles publiés par pigiste (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesPublishedByFreelance.php">Graphe basique</a></li>
					<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesPublishedByFreelance.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesPublishedByFreelance.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesPublishedByFreelance.php">Graphe ordonné</a></li>
				</ol>
			</div>
			<div class="item">
				<ol class="nav">
					<a><h8>Articles lus par pigiste (Ecomnews)</h8><img src="assets/img/ecomnews.png"></a>
					<li><a href="../../files/app/views/mainGraph/news/graphArticlesReadByFreelance.php">Graphe basique</a></li>
			  	<li><a href="../../files/app/views/mainGraphColumn/news/graphArticlesReadByFreelance.php">Graphe en bâtonnets</a></li>
					<li><a href="../../files/app/views/mainGraphArea/news/graphArticlesReadByFreelance.php">Aire Graphique</a></li>
					<li><a href="../../files/app/views/mainGraphInverted/news/graphArticlesReadByFreelance.php">Graphe ordonné</a></li>
				</ol>
			</div>

    </div>

     <!-- Left and right controls -->
     <a class="left carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div id="container2">

  <div id="myCarousel2" class="carousel slide">
		    <!-- Indicators -->
     <ol class="carousel-indicators">
       <li class="item1 active" height="800"></li>
       <li class="item2"></li>
       <li class="item3"></li>
       <li class="item4"></li>
     </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" width="5">


  <div class="item active" width="10" height="400">
	<ol class="nav" id="navbis">
		<a><h8>Articles publiés par mois (EcomnewsMed)</h8><img src="assets/img/ecomnewsmed.png"></a>
		<li><a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByMonth.php">Graphe basique</a></li>
  	<li><a href="../../files/app/views/mainGraphColumn/med/graphArticlesPublishedByMonth.php">Graphe en bâtonnets</a></li>
		<li><a href="../../files/app/views/mainGraphArea/med/graphArticlesPublishedByMonth.php">Aire Graphique</a></li>
		<li><a href="../../files/app/views/mainGraphInverted/med/graphArticlesPublishedByMonth.php">Graphe ordonné</a></li>
	</ol>
	</div>




      <div class="item">
			    <ol class="nav" id="navbis">
						<a><h8>Articles publiés par région (EcomnewsMed)</h8><img src="assets/img/ecomnewsmed.png"></a>
						<li><a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByRegion.php">Graphe basique</a></li>
				  	<li><a href="../../files/app/views/mainGraphColumn/med/graphArticlesPublishedByRegion.php">Graphe en bâtonnets</a></li>
						<li><a href="../../files/app/views/mainGraphArea/med/graphArticlesPublishedByRegion.php">Aire Graphique</a></li>
						<li><a href="../../files/app/views/mainGraphInverted/med/graphArticlesPublishedByRegion.php">Graphe ordonné</a></li>
					</ol>
      </div>


	<div class="item">
	<ol class="nav" id="navbis">
	<a><h8>Articles publiés par client (EcomnewsMed)</h8><img src="assets/img/ecomnewsmed.png"></a>
	<li><a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByCustomer.php">Graphe basique</a></li>
		<li><a href="../../files/app/views/mainGraphColumn/med/graphArticlesPublishedByCustomer.php">Graphe en bâtonnets</a></li>
		<li><a href="../../files/app/views/mainGraphArea/med/graphArticlesPublishedByCustomer.php">Aire Graphique</a></li>
		<li><a href="../../files/app/views/mainGraphInverted/med/graphArticlesPublishedByCustomer.php">Graphe ordonné</a></li>
	</ol>
  </div>

	<div class="item">
	<ol class="nav" id="navbis">
		<a><h8>Articles publiés par pigiste (EcomnewsMed)</h8><img src="assets/img/ecomnewsmed.png"></a>
		<li><a href="../../files/app/views/mainGraph/med/graphArticlesPublishedByFreelance.php">Graphe basique</a></li>
		<li><a href="../../files/app/views/mainGraphColumn/med/graphArticlesPublishedByFreelance.php">Graphe en bâtonnets</a></li>
		<li><a href="../../files/app/views/mainGraphArea/med/graphArticlesPublishedByFreelance.php">Aire Graphique</a></li>
		<li><a href="../../files/app/views/mainGraphInverted/med/graphArticlesPublishedByFreelance.php">Graphe ordonné</a></li>
	</ol>
	</div>

</div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel2" role="button">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" role="button">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


</div>

</body>

		<footer></footer>



</html>
