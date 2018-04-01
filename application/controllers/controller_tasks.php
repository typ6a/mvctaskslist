<?php

class Controller_Tasks extends Controller
{

	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{ 
		// pre(__DIR__,1);
		$page = get_data($_GET, 'page', 1) ? : null;

		$limit = 3;

		$total_tasks = Model_Tasks::getTasksTotal();

		$total_pages = ceil($total_tasks/$limit);

		$tasks = Model_Tasks::getTasks($page, $limit);
		$this->view->generate('tasks_view.php', 'template_view.php', [
			'tasks' => $tasks,
			'total_pages' => $total_pages,
			'limit' => $limit,
		]);
	}

	function action_add()
	{
		$data =[];
		$this->view->generate('add_view.php', 'template_view.php', $data);
	}

	function action_preview()
	{
		$fields = [];
		$fields = [
				'email' 	  => $_POST['email'],
				'username' 	  => $_POST['username'],
				'description' => $_POST['description'],
				'created_at'  => time(),
			];
		$this->view->generate('preview_view.php', 'template_view.php', $fields);
	}

	function action_save()
	{
		$fields = [];

		$errors = []; 

		if(!$errors){

			// pre($_POST,1);

			$fields = [
				'email' 	  => $_POST['email'],
				'username' 	  => $_POST['username'],
				'description' => $_POST['description'],
				'created_at'  => time(),
			];
			pre($fields,1);

			// $fields = [
			// 	'email' 	  => 'someemail@gmail.com',
			// 	'username' 	  => 'some_username',
			// 	'description' => 'some task description 3',
			// 	'created_at'  => time(),
			// ];

			$mt = new Model_Tasks();
			$mt->save();
			Model_Tasks::save($fields);

		} else {
			$this->view->generate('add_view.php', 'template_view.php', [
				'errors' => $errors,
			]);

		}		
	}

}
