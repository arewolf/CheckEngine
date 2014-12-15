<?php

// Controller
class Controller extends AppController {
	
	protected function init() {
		
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			//gets user name from post array and sets it to view->user_name
			$this->view->username = $_POST['username'];
			$password = md5($_POST['password']);
			
			if($user_id = Access::login($this->view->username, $password)){
				header('Location: /');
			
			}else{
				ob_start();
				include "app/templates/login_fail.php";
				$this->view->failed = ob_get_conents();
				ob_end_clean();
			}
		
		}


	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div>
	<h1>Welcome to CheckEngine </h1>
	<form action="/process_login" method="POST">
		<input type="text" name="username" title="Username">
		<input type="password" name="password" title="Password">
		<button>Submit</button>
	</form>
	<h3><a href="/create">Create a new Account</a></h3>
</div>

