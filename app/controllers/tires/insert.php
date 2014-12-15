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
	<h1>Enter New Tires</h1>
	<form action="/tires/process_form" method="POST">
		<input type="date" name="purchase_date" title="Purchase Date">
		<input type="text" name="purchase_mileage" title="Purchase Mileage" required data-exp-name="number">
		<input type="text" name="warranty" title="Tire's Warranty Mileage" required data-exp-name="number">
		<button>Submit</button>
	</form>
</div>
