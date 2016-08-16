<?php
namespace App\DB;
use \PDO;

/**
 * Class DAO
 * @package App\DB
 */

/*on instancie la connexion à la base -> toutes les autres classes descendront de celle-ci. toutes les requêtes pourront être écrites dans les classes enfants*/

class DAO
{

    /*Si un attribut ou une méthode est public, alors on pourra y avoir accès depuis n'importe où, depuis l'intérieur de l'objet (dans les méthodes qu'on a créées), comme depuis l'extérieur. Le second, private, impose quelques restrictions. On n'aura accès aux attributs et méthodes seulement depuis l'intérieur de la classe, c'est-à-dire que seul le code voulant accéder à un attribut privé ou une méthode privée écrit(e) à l'intérieur de la classe fonctionnera. Chaque attribut private est précédé d'un underscore (« _ »). Ceci est une notation qu'il est préférable de respecter (il s'agit de la notation PEAR) qui dit que chaque nom d'élément privé (ici il s'agit d'attributs, mais nous verrons plus tard qu'il peut aussi s'agir de méthodes) doit être précédé d'un underscore.*/

    protected static $conn;

	//SINGLETON !
    public function __construct()
    {
        if (!isset(self::$conn)) { //se connecte une seule fois - "si pas de connexion au niveau de la classe" (self)
            try {
                self::$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME , DB_USER , DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                die($msg);
            }

        }
    }

	public function __destruct()
	{
		self::$conn = null;//ferme la connexion
	}

	/**
     * @param $sql
     * @param array $data
     * @return array
     * description : exécute une requête préparée et retourne un tableau de données
     */
    public function query($sql, $data = []) //on récupère la requête et le tableau de données
    {

        $sql = trim($sql); //trim — Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
        $stmt = self::$conn->prepare($sql); //PDO::prepare — Prépare une requête à l'exécution et retourne un objet
        foreach ($data as $name => $value) { //pour chaque ligne du tableau de données...
            $stmt->bindValue(':' . $name, $value, PDO::PARAM_STR);
            //PDOStatement::bindValue — Associe une valeur à un paramètre
            //ici : le ': ' + clé du tableau est associé à sa valeur
            //ex :
            //PDO::PARAM_STR — Représente les types de données CHAR, VARCHAR ou les autres types de données sous forme de chaîne de caractères SQL.
        }
	    $stmt->execute(); //PDOStatement::execute — Exécute une requête préparée
	    $type = strtoupper(substr(trim($stmt->queryString), 0, 6));
	    if($type=='SELECT') return $stmt->fetchAll(PDO::FETCH_ASSOC); 		// SELECT => renvoie les donnees
	    if($type=='INSERT') return self::$conn->lastInsertId();			// INSERT => renvoie le nouvel id
	    return($stmt->rowCount());										// DELETE/UPDATE => renvoie le nb d'enrgistrements affectés
//        PDOStatement::fetchAll — Retourne un tableau contenant toutes les lignes du jeu d'enregistrements
//        PDO::FETCH_ASSOC: retourne un tableau indexé par le nom de la colonne comme retourné dans le jeu de résultats
    }

    public function toArray($datas) {
        $array = [];
        foreach ($datas as $k => $v){
            if($v === '') $v = NULL;
            $array[$k] = $v;
        }
        return $array;
    }
}