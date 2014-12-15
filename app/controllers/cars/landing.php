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
	<a href="/cars/new"><h2>Add a New Car</h2></a>
	<a href="/cars/select"><h2>Select Vehicle</h2></a>
</div>
