<?php

// Controller
class Controller extends AppController {
	protected function init() {
		if ($user_id = Access::check()) {

		}else{
			header('Location: /login');
		}

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div>
	<a href="/insurance/insert"><h2>New Insurance Policy</h2></a>
	<a href="/insurance/update?user_id=<?php echo $_SESSION['user_id']?>"><h2>Update Insurance Policy</h2></a>
	<a href="/insurance/log"><h2>View Insurance Logs</h2></a>
	
</div>
