<?php 
class CabinFilterTest extends Test{
	
	protected function get_msg(){
		return "Your cabin filter needs changed in 15 days";
	}

	protected function run_test($user, $car_id){
		$sql = "SELECT max(air_change_date) AS air_change_date 
				FROM filter
				WHERE car_id = $car_id";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();

		$date1 = new DateTime($row['air_change_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;
		
		$subtract_miles = $weeks * $user->mpw;
		$air_miles = intval(30000 - $subtract_miles);
		$air_days = intval(($air_miles/$user->mpw)*7);
		return $air_days;
	}



}