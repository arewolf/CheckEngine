<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		// Insert New Customer
		$customer = new Customer($_POST);
		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/customers';
		//$this->view['msg'] = "Your Customer was created";



	}
}
$controller = new Controller();

