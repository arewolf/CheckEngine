<?php
 
// Controller
class Controller extends AppController {
	protected function init() {
	
		$tire_id = $_GET['tire_id'];

		$tire = new Tire();

		$tire->remove($tire_id);

		header('Location: /tires/log');
		die();



	}
}
$controller = new Controller();

