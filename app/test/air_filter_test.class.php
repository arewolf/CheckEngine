<?php 

class AirFilterTest extends Test{
	
	protected function get_msg(){
		return "Your tires need rotated in 15 days";
	}

	protected function run_test($user, $car_id){
		$sql = "SELECT max(cabin_change_date) AS cabin_change_date 
				FROM filter
				WHERE car_id = $car_id";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();

		$date1 = new DateTime($row['cabin_change_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;
		
		$subtract_miles = $weeks * $user->mpw;
		$cabin_miles = intval(15000 - $subtract_miles);
		$cabin_days = intval(($cabin_miles/$user->mpw)*7);
		return $cabin_days;
	}
}