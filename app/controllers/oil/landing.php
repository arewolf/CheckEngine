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
	<a href="/oil/insert"><h2>New Oil Change</h2></a>
	<a href="/oil/log"><h2>View Oil Change Logs</h2></a>
	
</div>
