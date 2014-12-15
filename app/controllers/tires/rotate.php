<?php

// Controller
class Controller extends AppController {
	protected function init() {

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div>
	<h1>Tire Rotation</h1>
	<form action="/tires/process_form" method="POST">
		<input type="date" name="rotation_date" title="Rotate Date">
		<input type="text" name="rotation_mileage" title="Rotate Mileage" required data-exp-name="number">
		<button>Submit</button>
	</form>
</div>
