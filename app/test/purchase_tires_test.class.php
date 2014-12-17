<?php 
class PurchaseTiresTest extends Test{
	
	protected function get_msg(){
		return "You need new tires in 15 days";
	}

	protected function run_test($user, $car_id){
		$sql="SELECT purchase_date, warranty 
			  FROM tire 
			  WHERE car_id = $car_id 
			  AND
			  purchase_date IS NOT NULL
			  ORDER BY purchase_date desc 
			  LIMIT 1";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		
		if(isset($row['warranty'])){
			$warranty = $row['warranty'];
		}else{
			$warranty = 10000;
		}
		
		$date1 = new DateTime($row['purchase_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;

		$subtract_miles = $weeks * $user->mpw;
		$tire_change_miles = intval($warranty - $subtract_miles);
		$tire_change_days = intval(($tire_change_miles/$user->mpw)*7);
		return $tire_change_days;
	}
}