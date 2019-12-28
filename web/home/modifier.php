<?php
session_start(); // si on n'est pas connecté, on ne peut rien modifier
include_once('includes_db.php'); // permet d'inclure notre base de données

if(!isset($_SESSION['pseudo'])){
	header('Location: accueil.php');
	exit;
}

if(!empty($_POST)){ // si la méthode POST contient bien des données,
// on va pouvoir les extraire et ainsi les traiter
	extract($_POST); // Importe les variables dans la table des symboles
// vérifie chaque clé afin de contrôler si elle a un nom de variable valide.
// extract() vérifie également les collisions avec des variables existantes
// dans la table des symboles.
// Il ne faut pas utiliser pas extract() sur des données non sûres comme
// les entrées utilisateur comme avec la méthode "GET".
	$valid = true;

	if($modifier == "form"){
		$Pseudo = htmlspecialchars(trim($Pseudo)); // htmlspecialchars
												//c'est pour convertir les caractères spéciaux en HTML
		// le trim sert à supprimer les espaces
		// (ou d'autres caractères invisibles) en début et fin de chaîne

		if(empty($Pseudo)){
			$valid = false;
			$_SESSION['flash']['danger'] = "Veuillez mettre un pseudo !";

		}

		$req = $DB->query("Select pseudo from user where idpublic = :id", array('id' => $_SESSION['id']));
		$req = $req->fetch();

		if($Pseudo == $_SESSION['pseudo']){
			$valid = false;
			$_SESSION['flash']['info'] = "Votre pseudo est le même"; // message d'information s'affiche

		}

		if($valid){ // mise à jour des données (prenom, nom, mail) dans la table user

			$DB->insert("UPDATE user SET pseudo = :newpseudo where idpublic = :id ", array('id' => $_SESSION['id'], 'newpseudo' => $Pseudo)); // la donnée à changer ici est le pseudo

			$_SESSION['pseudo'] = $Pseudo;
			$_SESSION['flash']['success'] = "Votre pseudo a bien été modifié !"; // message de validation s'affiche
			header('Location: modifier.php');
			exit;
		}

	}elseif($modifier == "mdp"){

		$Password = trim($Password); // la fonction trim() supprime les espaces en début et fin de chaîne
		$PasswordConfirmation =trim($PasswordConfirmation);
		$NewPassword = trim($NewPassword);

		$req = $DB->query("Select * from user where idpublic = :id", array('id' => $_SESSION['id'])); // on vérifie si le pseudo existe bien dans la base de données
		$req = $req->fetch();

		if(empty($Password)){ // vérifier si le mot de passe est vide
			$valid = false; // $valid est une variable booléenne à laquelle on affecte false pour cette condition
			$_SESSION['flash']['warning'] = "Veuillez mettre votre mot de passe !";

		}elseif($Password && empty($PasswordConfirmation)){ // la fonction empty() détermine si une variable est considérée comme vide
		// une variable est considérée comme vide si elle n'existe pas, ou si sa valeur équivaut à false
		// la fonction empty() ne génère pas d'alerte si la variable n'existe pas
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez confirmer votre mot de passe";

		}elseif($Password != $PasswordConfirmation){
			$valid = false;
			$_SESSION['flash']['danger'] = "Votre mot de passe ne correspond pas au mot de passe !";

		}else if($req['password'] != (crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'))){ // crypt -> Hachage à sens unique (indéchiffrable) plus la clé est longue, mieux c'est
			$valid = false;
			$_SESSION['flash']['danger'] = "Votre mot de passe n'est pas le bon !";

		}else if(empty($NewPassword)){ //si le mot de passe est vide
			$valid = false;
			$_SESSION['flash']['warning'] = "Veuillez mettre un nouveau mot de passe !";

		}else if($valid){

			$DB->insert("UPDATE user SET password = :newpassword where idpublic = :id", array('id' => $_SESSION['id'], 'newpassword' => (crypt($NewPassword, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'))));
			// la fonction crypt() sert au hachage à sens unique (indéchiffrable)
			$_SESSION['flash']['success'] = "Votre nouveau mot de passe a été enregistrée !";
			header('Location: modifier.php');
			exit;

		}
	}
}
?>
<!DOCTYPE html>
<html lang="fr">
	<header>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<!-- <link href="bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/> -->
		<script src="assets/bootstrap/js/bootstrap.js"></script>

		<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>

		<title>Modifier profil</title>
	</header>

	<body>

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

			       <h1 class="index-h1">Modifier votre profil</h1>

			       <br/>

	                <form method="post" action="modifier.php">
					<!-- La méthode "post" permet le traitement des données sur la même page
					Le formulaire peut ainsi récupérer les données -->

                        <label>Pseudo</label>

                    	<input class="input" type="text" name="Pseudo" placeholder="Pseudo"
						value="<?= $_SESSION['pseudo'];  ?>" maxlength="20" required="required">
						<!-- la donnée Pseudo conditionne notre session -->
						<br/>
						<br/>

	                    <div class="row">
	                        <div class="col-xs-0 col-sm-10 col-md-2"></div>
	                        <div class="col-xs-12 col-sm-2 col-md-8">
		                        <input type="hidden" value="form" name="modifier"/> <!-- value form -->
								<button type="submit">Modifier</button>
	                        </div>
	                        <div class="col-xs-0 col-sm-1 col-md-2"></div>
	                   </div>

	                </form>

	                <br/>
	                <br/>

	                <form method="post" action="modifier.php">

	                    <label>Mot de passe</label>

                        <input class="input" type="password"
						name="Password" value="<?php if(isset($Password)) { echo $Password; }?>"  placeholder="Mot de passe" required="required"/>

						<br/>

	                    <label>Confirmez votre mot de passe</label>

                        <input class="input" type="password"
						name="PasswordConfirmation"
						value="<?php if(isset($PasswordConfirmation)){ echo $PasswordConfirmation; }?>" placeholder="Confirmation du mot de passe" required="required"/>

	                    <br/>

	                    <label>Nouveau mot de passe</label>
                        <input class="input" type="password" name="NewPassword" placeholder="Nouveau mot de passe" required="required"/>

						<br/><br/>

	                    <div class="row">
	                        <div class="col-xs-0 col-sm-10 col-md-2"></div>
	                        <div class="col-xs-12 col-sm-2 col-md-8">
		                        <input type="hidden" value="mdp"
								name="modifier"/>          <!-- value mdp -->
								<button type="submit">Modifier</button>
	                        </div>
	                        <div class="col-xs-0 col-sm-1 col-md-2"></div>
	                   </div>

	                </form>

					<br/>
					<a href="accueil.php">Retour accueil</a>
<!-- 2 formulaires pour Pseudo et mot de passe avec une value différente pour chacun -->
		       	</div>
	            <div class="col-xs-1 col-sm-2 col-md-3"></div>
	        </div>
        </div>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
