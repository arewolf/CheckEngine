<?php
 
// Controller
class Controller extends AppController {
	protected function init() {
	
		$customer_id = $_GET['customer_id'];

		$customer = new Customer($customer_id);

		$customer->remove();

		header('Location: /customers');
		die();



	}
}
$controller = new Controller();

