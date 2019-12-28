<?php
ini_set('display_errors', '1');
include('../lob/include_lib.php');




/* $chaine = '[43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]';
$resultstr = "[";
$resultabscisse = "[";
// affiche dans un tableau les données contenues dans les champs (nb, month, year) demandés dans la requête de la procédure stockée
// appelle la procédure stockée afficher_nb_articles_publies_par_mois()
// retourne un string de la forme '[43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]'
// qui représente le nb d'articles par tag pour une année
function articles($annee) {

		global $resultstr;
		global $resultabscisse;
			//echo "afficher_nb_articles_publies_par_mois() | ";

		// se connecter à la base de données
		$connection = mysqli_connect("localhost", "root", "root", "ecomnews", "3306");

		// créer la requête SQL
		// $sql = 'CALL `ecomnews`.module_get(2)';
		$sql = 'CALL `ecomnews`.articles_publies_mois('.$annee.')';

		// exécuter la procédure stockée
		$result = mysqli_query($connection, $sql) or die("Query fail:" . mysqli_error());

		// loop the result set
		$next = false;
		while ($row = mysqli_fetch_array($result)){
				if ($next) { $resultstr .= ","; $resultabscisse .= ","; }
				else { $next=true; }

			    $resultstr .= $row[0];
					$resultabscisse .= $row[2];

		}

		$resultstr .= "]";

		$resultabscisse .= "]";


		mysqli_close($connection);

} */

// articles();

// echo $resultstr;
// echo $resultabscisse;


function articles($annee) {
	global $token_security;


//Initialize cURL.
$ch = curl_init();

//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, 'http://localhost:81/API_JSON_PHP/stats/articles/published/byMonth.php');

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
$valueJson = json_encode(array('token' => $token_security, 'annee' => $annee));
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $valueJson);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


//Execute the request.
$data = curl_exec($ch);

//Close the cURL handle.
curl_close($ch);
$json =  json_decode($data, true);

// echo $token_security;
// var_dump($json);
// var_dump($value);
// die();


$resultstr = "[";
$resultabscisse = "[";


$next = false;
$i=0;
$count = count($json["results"]); // count compte en plus l'élément tableau (tout ce qu'il y a dedans)
// echo "count :";
// echo count($json["results"]);
// echo '<br>';
		while ($i<$count){
				if ($next) { $resultstr .= ","; $resultabscisse .= ","; }
				else { $next=true; }

			    $resultabscisse.="\"" . $json["results"][$i]["month"] . "\"";
					$resultstr.=$json["results"][$i]["nb"];
				$i++;
		}

		$resultstr .= "]";
		$resultabscisse .= "]";

		return array("nb"=>$resultstr,"month"=>$resultabscisse);

}

function articlesStats($annee) {
	global $token_security;

//Initialize cURL.
$ch = curl_init();

//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, 'http://localhost:81/API_JSON_PHP/stats/articles/published/byMonthStats.php');

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
$valueJson = json_encode(array('token' => $token_security, 'annee' => $annee));
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $valueJson);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));


//Execute the request.
$data = curl_exec($ch);

//Close the cURL handle.
curl_close($ch);
$json =  json_decode($data, true);

return $json;

}

?>
