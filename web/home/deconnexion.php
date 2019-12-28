<?php
session_start(); 
// vérifier que la session a bien été démarrée 
// car on ne peut pas mettre fin à une session 
// qui n'a jamais existé

session_destroy(); 
// détruire la session qui a été démarrée 
header('Location: connexion.php'); 
// permet la redirection vers l'index de base 
exit;	
?>



