<?php 
class OilChangeTest extends Test{
	protected function get_msg(){
		return "Your oil needs changed within 15 days.";
	}

	protected function run_test($user, $car_id){
		$sql = "SELECT  max(change_date) as last_change_date
			    FROM oil
			    WHERE car_id = $car_id";
		
		$results = db::execute($sql);
		$row = $results->fetch_assoc();

		$date1 = new DateTime($row['last_change_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;

		$subtract_miles = $weeks * $user->mpw;
		$oil_miles = intval(5000 - $subtract_miles);
		$oil_days = intval(($oil_miles/$user->mpw)*7);
		return $oil_days;
	}
}