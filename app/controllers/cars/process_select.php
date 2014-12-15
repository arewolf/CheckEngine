<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		//Set Session Values:
		$sql="SELECT * 
			  FROM car 
			  WHERE user_id = {$_SESSION['user_id']}
			  AND name = '{$_POST['car_select']}'";
		$results = db::execute($sql);
		$row = $results->fetch_assoc();

		$_SESSION['car_id'] = $row['car_id'];
		$_SESSION['current_car'] = $_POST['car_select'];	
		
		$this->view['redirect'] = '/cars/landing';


	}
}
$controller = new Controller();