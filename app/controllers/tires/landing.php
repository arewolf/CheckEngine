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
	<a href="/tires/insert"><h2>New Tires</h2></a>
	<a href="/tires/rotate"><h2>Rotate Tires</h2></a>
	<a href="/tires/log"><h2>View Tire Logs</h2></a>
	
</div>
