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
	<h1>Enter Oil Change Data</h1>
	<form action="/oil/process_form" method="POST">
		<input type="text" name="oil_miles" title="Mileage @ Last Change" required data-exp-name="number">
		<input type="date" name="change_date" title="Date of Change">
		<button>Submit</button>
	</form>
</div>
