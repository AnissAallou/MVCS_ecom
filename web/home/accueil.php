<?php
session_start();
include_once('includes.php');
	// echo $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="fr">
	<header>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<!-- <link href="bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/> -->
		<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>

		<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/css/member.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/css/bouton.css" rel="stylesheet" type="text/css" media="screen"/>
		<!-- <link href="assets/css/index.css" rel="stylesheet" type="text/css" media="screen"/> -->

		<title>Accueil</title>
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
					<button class="btn_green" onclick="self.location.href='deconnexion.php'">Déconnexion</button>
					<button class="btn_green" onclick="self.location.href='modifier.php'">Modifier votre profil</button>
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


		<?php
		    if(isset($_SESSION['flash'])){
		        foreach($_SESSION['flash'] as $type => $message): ?>
				<div id="alert" class="alert alert-<?= $type; ?> infoMessage"><a class="close">X</span></a>
					<?= $message; ?>
				</div>

			<?php
			    endforeach;
			    unset($_SESSION['flash']);
			}
		?>


		<div class="container-fluid">

	        <div class="row">

		       	<div class="col-xs-1 col-sm-2 col-md-3"></div>
		       	<div class="col-xs-10 col-sm-8 col-md-6">

			       	<h1 class="index-h1">Accueil</h1>

			       	<p>Bonjour <?php
				       // pour vérifier que la session est bien chargée
				    	if(!isset($_SESSION['id'])){ // la variable $_SESSION que l'on peut appeler partout
						// du moment qu'on a le session_start() présent sur la même page
						// && le point d'exclamation est un signe contraire à l'existence légitime de la variable $_SESSION.
						// On vérifie donc que la variable n'existe pas pour afficher la phrase suivante à l'aide du echo
					       echo "vous n'êtes pas connecté !";
						   die();
				    	}else{ //sinon si je suis connecté
					    	echo $_SESSION['pseudo'];

				       	}
				       	?>

				    </p>

			       	<!-- <a href="connexion.php">Retour à la page login</a> <br/ > <br/ > -->

			       	<!-- <a href="modifier.php">Modifier votre profil</a> <br/ > -->
			       	<br/>
			       	<!-- <a href="deconnexion.php">Déconnexion</a> -->
					</br></br></br></br>
					<!-- <a href="stats.php">Accès aux statistiques</a> -->
					<div class="col-xs-6 col-sm-6 col-md-6">
					<button id="insc" class="insc" type="button" onclick="self.location.href='stats.php'">Accès aux statistiques</button>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<button id="conn" class="conn" type="button" onclick="self.location.href='minichat.php'">Discussion en ligne</button>
					</div>
					<!-- <a href="stats.php">Accès aux statistiques</a> -->
					</br></br></br></br>
					<!-- <a href="minichat.php">Discussion en ligne</a> -->
		       	</div>
	            <div class="col-xs-1 col-sm-2 col-md-3"></div>
	        </div>
        </div>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
