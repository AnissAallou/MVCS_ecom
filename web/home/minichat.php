<?php
include('includes_session.php');
include('includes_db.php');

?>
<!DOCTYPE html>
<html>
    <header>
			<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mini-chat</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
		<!-- <link href="../bootstrap/js/bootstrap.js" rel="stylesheet" type="text/css"/> -->
		<script src="assets/bootstrap/js/bootstrap.js"></script>
		<link href="assets/css/style.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/css/minichat.css" rel="stylesheet" type="text/css" media="screen"/>
		<link href="assets/css/label.css" rel="stylesheet" type="text/css" media="screen"/>


    </header>

    <body>
    	<div class="center">
				<button class="btn_green" onclick="self.location.href='deconnexion.php'">Déconnexion</button>
			</div>
		</br>
		</br>
		<div class="center">
				<button class="btn_green" id="retour" onclick="self.location.href='accueil.php'">Retour</button>
		</div>
    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo']; ?>" /><br />
        <label for="message" class="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>


    </body>
</html>

<?php

// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $user, $pass);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor(); // ferme le curseur, permettant à la requête d'être de nouveau exécutée

?>
