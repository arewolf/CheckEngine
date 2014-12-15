<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
	
		//New Tire
	
		$tire = new Tire($_POST);

		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/tires/landing';
		//$this->view['msg'] = "Your Customer was created";



	}
}
$controller = new Controller();

