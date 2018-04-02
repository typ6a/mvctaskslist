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
		$sortby = get_data($_GET, 'sortby', 'username');
		$sortdir = get_data($_GET, 'sortdir', 'asc');

		$limit = 3;

		$total_tasks = Model_Tasks::getTasksTotal();
		$total_pages = ceil($total_tasks/$limit);

		$tasks = Model_Tasks::getTasks($page, $limit, $sortby, $sortdir);

		// pre($tasks,1);

		$this->view->generate('tasks_view.php', 'template_view.php', [
			'tasks' => $tasks,
			'total_pages' => $total_pages,
			'limit' => $limit,
			'current_page' => $page,
			'sortby' => $sortby,
			'sortdir' => $sortdir,
		]);
	}

	function action_add()
	{
		$data =[];
		$this->view->generate('add_view.php', 'template_view.php', $data);
	}

	function action_update()
	{
		$fields =[];
			// pre($_POST,1);

		
		if (isPost()) {
			# code...
			$fields = [
				'id' => $_POST['id'],
				'description' => $_POST['description'],
				'status' => !empty($_POST['status']) ? 1 : 0,
			];

			Model_Tasks::update($fields);
			redirect(base_url());
		}
		else {
			redirect(base_url());
		}
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
			pre($fields,1);
		$this->view->generate('preview_view.php', 'template_view.php', $fields);
	}

	function action_save()
	{
		$fields = [];

		$errors = []; 
		if(!$errors){
			$filename = $this->uploadFile();

			//pre($filename,1);

			$fields = [
				'email' 	  => $_POST['email'],
				'username' 	  => $_POST['username'],
				'description' => $_POST['description'],
				'filename'	  => $filename,
				'created_at'  => time(),
			];

			$new_id = Model_Tasks::save($fields);

			if($new_id){
				redirect(base_url('tasks/index'));
			}else{
				$errors[] = 'Task was not added.';
			}
		} else {
			$this->view->generate('add_view.php', 'template_view.php', [
				'errors' => $errors,
			]);

		}	
		// $this->view->generate('add_view.php', 'template_view.php', $data);
	}

	protected function uploadFile()
	{
		$images_dir = BASE_DIR . 'images/';

		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
		$file = $images_dir . md5(time()) . '.' . $imageFileType;

		$check = getimagesize($_FILES["image"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {

			$fileinfo = getimagesize($_FILES["image"]["tmp_name"]);


			$image = new \claviska\SimpleImage();
			$image
				->fromFile($_FILES["image"]["tmp_name"])
			    ->bestFit(320, 240)
			    ->toFile($file, $fileinfo['mime']);
			    
			// pre($image,1);

		    if (file_exists($file)) {
		        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
		        return basename($file);
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		}
	}

}
