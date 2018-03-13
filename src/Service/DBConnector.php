<?php

namespace Service;

class DBConnector
{
    
    private static $config;
    
    private static $connection;
  
    public static function setConfig(array $config)
    {
        self::$config = $config;
    }
    
    private static function createconnection()
    {
        $dsn = sprintf('%:host=%s;dbname=%s', self::$config['driver'], self::$config['host'], self::$config['dbname']);
    }
 
    public static function getConnection()
    {
        if (! self::$connection) {
            self::createConnection();
        }
        return self::$connection;
    }
}