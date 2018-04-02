<?php

class Model_Tasks extends Model
{
	
	public static function getTasks($page = 1, $per_page = 3, $sortby = 'username', $sortdir = 'asc')
	{


		//self::query('DELETE FROM tasks');
		//self::query('ALTER TABLE tasks ADD COLUMN filename TEXT');
		//exit;

		$OFFSET = ($page - 1) * $per_page;

		$sql = <<<SQL
			SELECT * 
			FROM tasks
			ORDER BY {$sortby} {$sortdir}
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
		$email = $fields['email'];
		$username = $fields['username'];
		$description = $fields['description'];
		$created_at = $fields['created_at'];
		$filename = $fields['filename'];

		$sql = <<<SQL
			INSERT INTO tasks(email, username, description, created_at, filename) VALUES('$email','$username','$description','$created_at', '$filename')
SQL;
		if(self::query($sql)){	
			return self::pdo()->lastInsertId();
		} return false;
	}

	public static function update($fields)
	{
		$sql = <<<SQL
			UPDATE tasks
			SET description = "{$fields['description']}", status = {$fields['status']}
			WHERE id = {$fields['id']}
SQL;
		return self::exec($sql);
	}

}
