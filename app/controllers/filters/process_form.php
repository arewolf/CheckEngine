<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
	
		//New Customer
	
		$filter = new Filter($_POST);

		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/filters/landing';
		//$this->view['msg'] = "Your Customer was created";



	}
}
$controller = new Controller();

