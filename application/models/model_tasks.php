<?php

class Model_Tasks extends Model
{
	
	public static function getTasks($page = 1, $per_page = 3)
	{
		$OFFSET = ($page - 1) * $per_page;

		$sql = <<<SQL
			SELECT * 
			FROM tasks  
			LIMIT {$OFFSET},{$per_page}
SQL;

		//pre($sql,1);
	
		return self::query($sql)->fetchAll(\PDO::FETCH_ASSOC);
	}

	public static function getTasksTotal()
	{
		$sql = <<<SQL
			SELECT COUNT(id)
			FROM tasks  
SQL;
		return self::query($sql)->fetch()[0];
	}

	public static function save($fields)
	{

		pre($fields,1);

		$sql = <<<SQL
			SELECT COUNT(id)
			FROM tasks  
SQL;
		return self::query($sql)->fetch()[0];
	}

}
