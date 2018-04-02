<?php
class Controller_Login extends Controller
{
	
	function action_index()
	{
		$errors = [];
		if(isPost()){
			if(!empty($_POST['login']) && !empty($_POST['password']))
			{
				$login = $_POST['login'];
				$password = $_POST['password'];
				if($login == "admin" && $password == "123")
				{
					$_SESSION['is_admin'] = 1;
					header('Location: ' . base_url('tasks/index'));
				}
				else
				{
					$errors[] = 'Wrong login or password.';
				}
			}
			else
			{
				$errors[] = 'Empty data.';
			}
			
		}
		$this->view->generate('login_view.php', 'template_view.php', [
			'errors' => $errors
		]);
	}
	
	function action_logout(){
		unset($_SESSION['is_admin']);
		redirect(base_url());
	}
}