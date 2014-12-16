<?php
 
// Controller
class Controller extends AppController {
	protected function init() {
	
		$insurance_id = $_GET['insurance_id'];

		$insurance = new Insurance();

		$insurance->remove($insurance_id);

		header('Location: /insurance/log');
		die();



	}
}
$controller = new Controller();

