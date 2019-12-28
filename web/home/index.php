<?php


session_start(); // on n'autorise plus la personne à venir sur la première page
// car il y aura répétition si il se reconnecte une deuxième fois
// et provoque un conflit entre deux sessions identiques

include_once('includes.php');

if(isset($_SESSION['pseudo'])){
	header('Location: accueil.php');
	exit;
}

if(!empty($_POST)){
	extract($_POST); // la fonction extract() importe les variables dans la table des symboles
	// vérifie chaque clé afin de contrôler si elle a un nom de variable valide
	// vérifie également les collisions avec des variables existantes dans la table des symboles
	// importe les variables dans la table des symboles
	// une table de symboles est une centralisation des informations rattachées aux identificateurs d'un programme informatique
	// C'est une fonction accélératrice de compilation, dont l'efficacité dépend de la conception
	// Dans une table des symboles, on retrouve des informations comme : le type, l'emplacement mémoire, la portée, la visibilité, etc.

	$valid = true;


	// if($valid){


	// }

}
?>
<!DOCTYPE html>
<html lang="fr">
	<header>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Index</title>

		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<!-- <link href="../../bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/> -->


		<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/css/member.css" rel="stylesheet" type="text/css" media="screen"/>


	</header>

	<body>

		<nav class="navbar navbar-default">
		  <div class="container-fluid">

		    <div class="navbar-header" >
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" id="navbarbrand" title="L'Histoire des statistiques" href="https://www.math93.com/index.php/histoire-des-maths/les-developpements/564-histoire-des-statistiques"><img src="assets/img/stats.jpg"></a>
		    </div>


		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
			  <li><a href="https://ecomnews.fr/" onclick="window.open(this.href); return false;" id="ecn"><img src="assets/img/ecomnews.png"><br><br></a></li>
		      <li><a href="http://ecomnewsmed.com/" onclick="window.open(this.href); return false;" id="ecnmed"><img src="assets/img/ecomnewsmed.png"></a></li>
		        <!-- <li><a href="inscription.php">Inscription</a></li> -->
		        <!-- <li><a href="connexion.php">Connexion</a></li> -->
		      </ul>
		    </div>
		  </div>
		</nav>

		<h1 class="index-h1">Les statistiques d'Ecomnews</h1>

		<div class="container-fluid jump">

			<div class="col-xs-6 col-sm-6 col-md-6">
				<button class="insc" type="button" onclick="self.location.href='inscription.php'">Inscription</button>

			</div>
			<div class="col-xs-6 col-sm-6 col-md-6">
				<button class="conn" type="button" onclick="self.location.href='connexion.php'">Connexion</button>
			</div>





		</div>

		<footer></footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.js"></script>
	</body>

</html>
