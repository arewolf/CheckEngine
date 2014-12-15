<?php
 
// Controller
class Controller extends AppController {
	protected function init() {
	
		$customer_id = $_GET['customer_id'];

		$customer = new Customer($customer_id);

		$this->view->customer = $customer;



	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view -->


<form action="/customer/process_form">
	<input type="hidden" value="<?=$customer->customer_id?>" name="customer_id" >
	<input value="<?=$customer->firstname?>" type="text" title="First Name" name="firstname">
	<input value="<?=$customer->lastname?>" type="text" title="Last Name" name="lastname">
	<input value="<?=$customer->gender?>" type="text" title="Gender" name="gender">
	<input value="<?=$customer->age?>"type="text" title="Age" name="age">
	<button type ="submit">Submit</button>
	
</form>

