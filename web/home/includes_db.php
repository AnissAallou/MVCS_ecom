<?php
// include('../../files/config.php');
/*
 * Description of connexionDB
 *  Connexion à la base de donnée avec des fonctions des requêtes;

 */


ini_set('display_errors', '1');

include_once('../../files/config.php');

class connexionDB {
    private $host; // nom de l'hôte          si on travaille en local ou sur un site hébergé
    private $name; // nom de la base de données
    private $user; // utilisateur
    private $pass; // mot de passe
    private $connexion;

    function __construct($pHost=null,$pName=null,
	$pUser=null,$pPass=null){ //fonction constructeur     PHP permet aux développeurs de déclarer des constructeurs pour les classes. Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé.
global $name;
$this->name = $name;
global $user;
$this->user = $user;
global $pass;
$this->pass = $pass;
  if($pHost != null){
            $this->host = $pHost;
            $this->name = $pName;
            $this->user = $pUser;
            $this->pass = $pPass;
	}
	try{
            $this->connexion = new PDO('mysql:host='.$this->host.';dbname='.$this->name,
            $this->user,$this->pass,array(
		PDO::MYSQL_ATTR_INIT_COMMAND =>'SET NAMES UTF8',
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
		));
	}catch (PDOException $e){
            echo 'Erreur : Impossible de se connecter  à la BDD !';die();
	}
    }

    public function query($sql, $data=array()){                               // fonction query c'est une fonction d'interrogation donc elle renvoie des messages
	$req = $this->connexion->prepare($sql);
	$req->execute($data);
        return $req;
    }

    public function insert($sql, $data=array()) {      // fonction insert pour insérer des données modifier/supprimer des données
        $req=$this->connexion->prepare($sql);
        $req->execute($data);
    }
}
$DB = new connexionDB();
try // tentative de connexion :
// on crée un objet de la classe PDO
{
	$bdd = new PDO('mysql:host='.$host.';dbname='.$name.';charset=utf8', $user, $pass);
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
