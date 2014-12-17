<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		// Update Car
		if ($_POST['car_id']){
			$car = new Car($_POST['car_id']);
			$car->update($_POST);
		//New Car
		}else{
			$car = new Car($_POST);
		}
		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/cars/landing';
		



	}
}
$controller = new Controller();

