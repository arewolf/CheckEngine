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
	<a href="/filters/cabin"><h2>Change Cabin Filter</h2></a>
	<a href="/filters/air"><h2>Change Engine Air Filter</h2></a>
	<a href="/filters/log"><h2>View Filter Logs</h2></a>
	
</div>
