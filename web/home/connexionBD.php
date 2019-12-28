<?php
/*
 * Description of connexionDB
 *  Connexion à la base de donnée avec des fonctions des requêtes;

 */



class connexionDB {
    private $host; // nom de l'hôte          si on travaille en local ou sur un site hébergé
    private $name='exo'; // nom de la base de données
    private $user="root"; // utilisateur
    private $pass='root'; // mot de passe
    private $connexion;

    function __construct($host=null,$name=null,
	$user=null,$pass=null){ //fonction constructeur     PHP permet aux développeurs de déclarer des constructeurs pour les classes. Les classes qui possèdent une méthode constructeur appellent cette méthode à chaque création d'une nouvelle instance de l'objet, ce qui est intéressant pour toutes les initialisations dont l'objet a besoin avant d'être utilisé.
	if($host != null){
            $this->host = $host;
            $this->name = $name;
            $this->user = $user;
            $this->pass = $pass;
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
?>
