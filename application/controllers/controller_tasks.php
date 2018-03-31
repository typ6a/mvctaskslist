<?php

class Controller_Tasks extends Controller
{

	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		$tasks = Model_Tasks::getTasks();
		$this->view->generate('tasks_view.php', 'template_view.php', [
			'tasks' => $tasks,
			'other_variable' => 'bla bla',
		]);
	}

	function action_add()
	{

		//$this->view->generate('add_view.php', 'template_view.php', $data);
	}

	function action_save()
	{
		//$username = $_POST['username'];
		//$email = $_POST['email'];

		// NEED MOVE CODE BELOW to Model_Tasks save method 						!!!!!!!!!!!!!

		$data = [
			'email' 	  => 'someemail@gmail.com',
			'username' 	  => 'some_username',
			'description' => 'some task description 3',
			'created_at'  => time(),
		];

		$sql = <<<SQL
			INSERT INTO tasks(
				email, 
				username, 
				description, 
				created_at
			) VALUES(
				"{$data['email']}",
				"{$data['username']}",
				"{$data['description']}",
				{$data['created_at']}
			)
SQL;

		//pre($sql,1);

		$res = Model_Tasks::exec($sql);

		pre($res,1);

		// redirect to tasks list

		//$this->view->generate('add_view.php', 'template_view.php', $data);
	}

}
