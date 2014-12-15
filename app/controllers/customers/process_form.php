<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		// Update Customer
		if ($_POST['customer_id']){
			$customer = new Customer($_POST['customer_id']);
			$customer->update($_POST);
		//New Customer
		}else{
			$customer = new Customer($_POST);
		}
		
		//Send Message Back via AJAX
		$this->view['redirect'] = '/customers';
		//$this->view['msg'] = "Your Customer was created";



	}
}
$controller = new Controller();

