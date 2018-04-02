<?php

class Model
{
	protected static $pdo = null;

    const PATH_TO_SQLITE_FILE = 'application/models/tasks.db';

	public function get_data()
	{
		
	}

    public static function connect()
    {
        if (self::$pdo === null) {
            self::$pdo = new \PDO("sqlite:" . self::PATH_TO_SQLITE_FILE);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        return self::$pdo;
    }

    public static function pdo()
    {
        return self::connect();
    }


    public static function query($query)
    {
        return self::pdo()->query($query);
    }

    public static function exec($query)
    {
        return self::pdo()->exec($query);
    }

}