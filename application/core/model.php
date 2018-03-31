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
        } return self::$pdo;
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

    public static function fixtures()
    {
        $time = time();

        $sql = <<<SQL
            CREATE TABLE IF NOT EXISTS tasks (
                id INTEGER PRIMARY KEY, 
                email TEXT,
                username TEXT,
                description TEXT, 
                status INTEGER DEFAULT 0,
                created_at INTEGER
            )

            -- INSERT INTO tasks(email, username, description, created_at) VALUES('kapver@gmail.com', 'kapver', 'some task description', {$time}),
            -- INSERT INTO tasks(email, username, description, created_at) VALUES('dmitryznak@gmail.com', 'dznak', 'some task description 2', {$time})
SQL;

        Model_Tasks::exec($sql);
    }

}