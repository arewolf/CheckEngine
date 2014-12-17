<?php

// Controller
class Controller extends AppController {
	protected function init() {
	


		


	
		$sql = "SELECT  max(change_date) as last_change_date
			    FROM oil
			    WHERE car_id = $car_id;";
		$results = db::execute($sql);
		$row = $results->fetch_assoc();

		$date1 = new DateTime($row['last_change_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;

		$subtract_miles = $weeks * $user->mpw;
		$oil_miles = intval(5000 - $subtract_miles);
		$oil_days = intval(($oil_miles/$user->mpw)*7);
		echo $oil_days;
	}

	
	
}

$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- Notice this welcome variable was created above and passed into the view -->



	
