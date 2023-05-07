<?php

namespace App\PDO;

use PDO;
use PDOException;

class Connexion extends PDO
{

    //Instance unique de la classe
    private static $instance;

    private const USER = 'ariane';
    private const PSWD = 'mysql';
    private const DBNAME = 'application';
    private const DBHOST = 'localhost';

    public function __construct()
    {
        //Construction du DataSourceName
        $dsn = "mysql:dbname=" . self::DBNAME . ";host" . self::DBHOST;

        // Appel au constructeur de PDO
        try {
            parent::__construct($dsn, self::USER, self::PSWD);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function connect(): PDO
    {
        if (self::$instance === null) {

            self::$instance = new self();
        }
        return self::$instance;
    }
}
