<?php

class Controller_Tasks extends Controller
{

	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		$page = get_data($_GET, 'page', 1) ? : null;

		$limit = 3;

		$total_tasks = Model_Tasks::getTasksTotal();

		$total_pages = ceil($total_tasks/$limit);

		$tasks = Model_Tasks::getTasks($page, $limit);
		$this->view->generate('tasks_view.php', 'template_view.php', [
			'tasks' => $tasks,
			'other_variable' => 'bla bla',
			'total_pages' => $total_pages,
			'limit' => $limit,
		]);
	}

	function action_add()
	{
		$data =[];
		$this->view->generate('add_view.php', 'template_view.php', $data);
	}

	function action_save()
	{
		$fields = [];

		$errors = []; 

		if(!$errors){

			// pre('wawds',1);

			$fields = [
				'email' 	  => 'someemail@gmail.com',
				'username' 	  => 'some_username',
				'description' => 'some task description 3',
				'created_at'  => time(),
			];

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
