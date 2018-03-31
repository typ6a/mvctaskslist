<?php

class Controller_Tasks extends Controller
{

	function __construct()
	{
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = Model_Tasks::getTasks();
		// pre($data,1);
		$this->view->generate('tasks_view.php', 'template_view.php', $data);
	}

	function action_add()
	{
		$data = Model_Tasks::getTasks();
		// pre($data,1);
		$this->view->generate('add_view.php', 'template_view.php', $data);
	}

}
