<?php
include_once('../../../../files/config.php');
include('connexionBD.php');
$DB = new connexionDB();
try // tentative de connexion :
// on crée un objet de la classe PDO
{
	$bdd = new PDO('mysql:host='.$DBhost.';dbname='.$DBname.';charset=utf8', $DBlogin, $DBpassword);
	// Lorsque la connexion à la base de données a réussi, une instance de
	// la classe PDO est retournée à notre script.
	// La connexion est active tant que l'objet PDO l'est.

}
catch(Exception $e) // Pour qu'il puisse être attrapé, l'objet lancé doit être une instance de la classe Exception
{
        die('Erreur : '.$e->getMessage()); // s'il y a des erreurs de connexion,
		// un objet Exception est lancé, on peut attraper cette exception
		// si on veut gérer cette erreur
}
?>
