<?php
namespace Core\DAO;
use \PDO;

/**
 * Class DAO
 * @package Core\DAO
 * Instantiates database connexion
 */

class DAO
{
    /**
     * @var PDO
     */
    protected static $conn;

    /**
     * DAO constructor
     */
    public function __construct()
    {
        if (!isset(self::$conn)) { //connect once (check if no other connexion with self)
            try {
                self::$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME , DB_USER , DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
                die($msg);
            }

        }
    }

    /**
     * DAO destruct - close the connexion
     */
	public function __destruct()
	{
		self::$conn = null;
	}

    /**
     * @param $sql
     * @param array $data
     * @return array|int|string
     * execute a prepared query and return a datas array
     */
    public function query($sql, $data = [])
    {
        $stmt = self::$conn->prepare($sql);
        foreach ($data as $name => $value) {
            $stmt->bindValue(':' . $name, $value, PDO::PARAM_STR);
        }
	    $stmt->execute();

	    $type = strtoupper(substr(trim($stmt->queryString), 0, 6));
	    if($type=='SELECT') return $stmt->fetchAll(PDO::FETCH_ASSOC); 		// SELECT => returns datas
	    if($type=='INSERT') return self::$conn->lastInsertId();			// INSERT => returns the new id
	    return($stmt->rowCount());										// DELETE/UPDATE => returns the number of records
    }

    /**
     * function toArray
     * @param $datas
     * @return array
     * transform an array of objects in an array that can be read by SQL
     */
    public function toArray($datas) {
        $array = [];
        foreach ($datas as $k => $v){
            //if empty, replace by NULL for SQL
            if($v === '') $v = NULL;
            $array[$k] = $v;
        }
        return $array;
    }
}