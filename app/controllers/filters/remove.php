<?php
 
// Controller
class Controller extends AppController {
	protected function init() {
	
		$filter_id = $_GET['filter_id'];

		$filter = new Filter();

		$filter->remove($filter_id);

		header('Location: /filters/log');
		die();



	}
}
$controller = new Controller();

