<?php 


class RotateTiresTest extends Test{
	protected function get_msg(){
		return "Your tires need rotated in 15 days";
	}

	protected function run_test($user, $car_id){
		$sql="SELECT rotation_date
			  FROM tire 
			  WHERE car_id = $car_id
			  ORDER BY rotation_date desc 
			  LIMIT 1";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		$date1 = new DateTime($row['rotation_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;

		$subtract_miles = $weeks * $user->mpw;
		$rotation_miles = intval(5000 - $subtract_miles);
		$rotation_days = intval(($rotation_miles/$user->mpw)*7);
		return $rotation_days;
	}
}