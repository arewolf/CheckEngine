<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		// Update Customer
		if ($_POST['user_id']){
			$car = new Car($_POST['user_id']);
			$car->update($_POST);
		//New Customer
		}else{
			$car = new Car($_POST);
		}
		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/cars/landing';
		//$this->view['msg'] = "Your Customer was created";



	}
}
$controller = new Controller();