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
	<h1>Changed Cabin Filters</h1>
	<form action="/filters/process_form" method="POST">
		<input type="date" name="cabin_change_date" title="Change Date">
		<input type="text" name="cabin_mileage" title="Change Mileage" required data-exp-name="number">
		<button>Submit</button>
	</form>
</div>
