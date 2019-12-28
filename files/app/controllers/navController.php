<?php
// L'utilisateur doit tomber sur la page avec l'année la plus récente
// qui est concernée dans le cadre de l'étude des statistiques
if(isset($_POST['annee'])) { // si le formulaire est utilisé
	// isset($data['annee'])
	 $annee = $_POST['annee'];
	 // $annee = $data['annee'];
} else {
	$annee = 	date('Y');
}
// $sMessage = $annee;

?>
