<?php

namespace Scripts\Lib;

use PDO;
use PDOException;

class Db
{
    public static $conndb;
    public static function connectDB($confDb)
    {
        try {
            self::$conndb = new PDO("mysql:host=127.0.0.1;dbname=" . $confDb['database'], $confDb['user'], $confDb['password']);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public static function checkConnection($confDb)
    {
        if (empty(self::$conndb)) {
            self::connectDB($confDb);
        }
    }

    public static function closeConnection()
    {
        if (!empty(self::$conndb)) {
            self::$conndb = null;
        }
    }
}