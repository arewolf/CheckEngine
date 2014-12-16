<?php

// Controller
class Controller extends AppController {
	protected function init() {

		$insurance_id= $_GET['insurance_id'];

		$insurance = new Insurance($insurance_id);

		$this->view->insurance=$insurance;

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view:-->
<div>
	<?php if ($_GET['insurance_id']): ?>
	<h1>Update Insurance Information</h1>
	<?php else: ?>
	<h1>Enter Insurance Information</h1>
	<?php endif ?>
		
	<form action="/insurance/process_form" method="POST">
		<input value="<?=$insurance->insurer?>"type="text" name="insurer" title="Policy Provider" required data-exp-name="name">
		<input value="<?=$insurance->policy_number?>"type="text" name="policy_number" title="Policy Number" required data-exp-name="number">
		<input value="<?=$insurance->insurance_expiration_date?>"type="date" name="insurance_expiration_date" title="Policy Expiration Date">
		<input value="<?=$insurance->insurance_id?>"type="hidden" name="insurance_id">
		<button>Submit</button>
	</form>
</div>
