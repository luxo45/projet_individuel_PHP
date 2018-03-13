<?php

class database
{

    private static $dbname = "infos";

    private static $dbhost = "localhost";

    private static $dbUsername = "root";

    private static $dbUserpassword = "root";

    private static $cont = null;

    public function _construct()
    {
        die('Init function is not allowed');
    }

    public static function connect()
    {
        if (null == self::$cont) {
            try {
                self::$cont = new PDO("mysql:host=" . self::$dbhost . ";" . "dbname=" . self::$dbname, self::$dbUsername, self::$dbUserpassword);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}

?>