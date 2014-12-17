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
	<form action="/cars/process_form" method="POST">
		<input type="text" name="make" title="Make" required data-exp-name="name">
		<input type="text" name="model" title="Model" required data-exp-name="name">
		<input type="text" name="year" title="Year" required data-exp-name="number">
		<input type="text" name="car_miles" title="Mileage" required data-exp-name="number">
		<input type="text" name="name" title="Name for Vehicle"required data-exp-name="name">
		
		<button>Add Car</button>
	</form>	
</div>
