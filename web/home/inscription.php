<?php
session_start(); // la session doit être chargée sur toutes les pages . Une fois connecté, l'utilisateur ne peut plus revenir sur la page inscription
include_once('includes.php');

if(isset($_SESSION['pseudo'])){
	header('Location: accueil.php');
	exit;
}

if(!empty($_POST)){ // la méthode POST permet de faire
// le traitement sur la page et de récupérer les données
	extract($_POST); // extraire la valeur et
	// importe les variables dans la table des symboles
	$valid = true; //booléen qui vérifie si la variable
	// contient réellement quelque chose

	$Mail = htmlspecialchars(trim($Mail)); // la fonction trim() supprime les espaces (ou d'autres caractères) en début et fin de chaîne
	$Pseudo = htmlspecialchars(ucfirst(trim($Pseudo)));
	// htmlspecialchars convertit les caractères spéciaux en entités HTML
	$Password = trim($Password);
	$PasswordConfirmation = trim($PasswordConfirmation);

	if(empty($Pseudo)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un pseudo !";
	}

	if(empty($Mail)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un mail !";
	}

	$req = $DB->query('Select mail from user where mail = :mail', array('mail' => $Mail));
	$req = $req->fetch();

	if(!empty($Mail) && $req['mail']){
		$valid = false;
		$_SESSION['flash']['danger'] = "Ce mail existe déjà";

	}
	if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $Mail)){  // preg_match effectue une recherche de correspondance avec une expression rationnelle standard | va nous permettre de rechercher des motifs bien précis au sein d’une chaîne de caractères
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un mail conforme !";
	}

	if(empty($Password)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez renseigner votre mot de passe !";

	}elseif($Password && empty($PasswordConfirmation)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez confirmer votre mot de passe !";

	}elseif(!empty($Password) && !empty($PasswordConfirmation)){
		if($Password != $PasswordConfirmation){

			$valid = false;
			$_SESSION['flash']['danger'] = "La confirmation est différente !";
		}

	}

	if($valid){

		$id_public = uniqid();

		$DB->insert('Insert into user (pseudo, mail, password, idpublic) values (:pseudo, :mail,:password, :idpublic)', array('pseudo' => $Pseudo, 'mail' => $Mail, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'), 'idpublic' => $id_public));


		$_SESSION['flash']['success'] = "Votre inscription a bien été prise en compte, connectez-vous !";
		header('Location: connexion.php');
		exit;

	}
}
?>
<!DOCTYPE html>
<html lang="fr">
	<header>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="assets/bootstrap/js/bootstrap.js"></script>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/css/member.css" rel="stylesheet" type="text/css" media="screen"/>

		<title>Inscription</title>
	</header>

	<body>

			<nav class="navbar navbar-default">
		  <div class="container-fluid">

		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="./">Retour</a>
		    </div>


		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        <li class="active"><a href="inscription.php">Inscription</a></li>
		        <li><a href="connexion.php">Connexion </a></li>
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

		            <h1 class="index-h1">Inscription</h1>

		            <br/>

	                <form method="post" action="inscription.php">

                        <label>Pseudo</label>
                    	<br/>
						<?php
							if(isset($error_pseudo)){
								echo $error_pseudo."<br/>";
							}
						?>
                    	<input class="input" type="text" name="Pseudo" placeholder="Pseudo" value="<?php if (isset($Pseudo)) echo $Pseudo; ?>" maxlength="20" required="required">

						<label>Mail</label>
						<input class="input" type="email" name="Mail" placeholder="Votre mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required">


	                    <label for="Password">Mot de passe</label>

                    	<br/>
						<?php
							if(isset($error_password)){
								echo $error_password."<br/>";
							}
						?>

                        <input class="input" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required="required">


	                    <label>Confirmez votre mot de passe</label>
                    	</br>
						<?php
							if(isset($error_passwordConf)){
								echo $error_passwordConf."<br/>";
							}
						?>

                        <input class="input" type="password" name="PasswordConfirmation" placeholder="Confirmation du mot de passe" required="required">

	                    <div class="row">
	                        <div class="col-xs-0 col-sm-10 col-md-2"></div>
	                        <div class="col-xs-12 col-sm-2 col-md-8">
								<button type="submit" id="submit">S'inscrire</button>
	                        </div>
	                        <div class="col-xs-0 col-sm-1 col-md-2"></div>
	                   </div>

	                </form>


	                <br/>
	                <br/>
	                <!-- <a href="index.php">Retour accueil</a> -->

	            </div>

	            <div class="col-xs-0 col-sm-2 col-md-3"></div>
	        </div>
        </div>
				<footer></footer>

		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
