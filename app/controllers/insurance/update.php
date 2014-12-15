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
	<h1>Update Insurance Information</h1>
	<form action="/insurance/process_form" method="POST">
		<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
		<input type="text" name="insurer" title="Policy Provider">
		<input type="text" name="policy_number" title="Policy Number">
		<input type="date" name="insurance_expiration_date" title="Policy Expiration Date">
		<button>Submit</button>
	</form>
</div>
