<?php
/* Objet de connexion, pour ouvrir une connexion : 

db = Database::getConnection()

PDO referme ensuite automatiquement la connexion
*/


class Database {

    private static $db;
    private $connection;

    private function __construct()
    {
        $this->connection = new PDO('mysql:host=localhost;charset=utf8', 'root', '');
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    function __destruct() 
    {
    }

    public static function getConnection()
    {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }
}