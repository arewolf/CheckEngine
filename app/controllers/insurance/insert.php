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
	<h1>Enter Insurance Information</h1>
	<form action="/insurance/process_form" method="POST">
		<input type="text" name="insurer" title="Policy Provider" required data-exp-name="name">
		<input type="text" name="policy_number" title="Policy Number" required data-exp-name="number">
		<input type="date" name="insurance_expiration_date" title="Policy Expiration Date">
		<button>Submit</button>
	</form>
</div>
