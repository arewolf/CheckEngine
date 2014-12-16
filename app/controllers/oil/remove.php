<?php
 
// Controller
class Controller extends AppController {
	protected function init() {
	
		$oil_id = $_GET['oil_id'];

		$oil = new Oil();

		$oil->remove($oil_id);

		header('Location: /oil/log');
		die();



	}
}
$controller = new Controller();

