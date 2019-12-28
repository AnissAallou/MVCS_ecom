<?php
ini_set('display_errors', '1');
include('../common.php');


function getLogin($user, $password) {
	global $token_security;


//Initialize cURL.
$ch = curl_init();

//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, 'http://localhost:81/API_JSON_PHP/auth/login.php');

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
$valueJson = json_encode(array('token' => $token_security, 'user' => $user, 'password' => $password));
//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, array('token' => $token_security, 'annee' => $annee));
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
