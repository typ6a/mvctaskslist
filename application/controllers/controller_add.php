<?php

class Controller_Add extends Controller
{

	function __construct()
	{
		$this->view = new View();
	}
	

	function action_add()
	{
		pre($data,1);
		$data = Model_Tasks::getTasks();
		$this->view->generate('add_view.php', 'template_view.php', $data);
	}
}
