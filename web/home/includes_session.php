<?php
session_start();
// echo $_SESSION['id'];

if(!isset($_SESSION['id'])){ // la variable $_SESSION que l'on peut appeler partout
						// du moment qu'on a le session_start() présent sur la même page && le point d'exclamation est un signe contraire à l'existence légitime de la variable $_SESSION. On vérifie donc que la variable n'existe pas pour afficher la phrase suivante à l'aide du echo
					       echo "Vous n'êtes pas connecté !" . '</br>' . "Veuillez vous reconnecter pour consulter les statistiques.";
						   die();
						     }
						// else{ //sinon si je suis connecté
					    	// echo $_SESSION['pseudo'];

				       	// }
?>
