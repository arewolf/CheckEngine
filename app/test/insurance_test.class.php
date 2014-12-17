<?php 
class InsuranceTest extends Test{

	protected function get_msg(){
		return "Your insurance policy expires in 15 days";
	}

	protected function run_test($user, $car_id){

		$sql = "SELECT insurance_expiration_date FROM insurance WHERE user_id = '{$user->user_id}' LIMIT 1";
		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		$db_insurance_date = $row['insurance_expiration_date'];

		$date1 = new DateTime($db_insurance_date);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date1->diff($date2);
		$itl = $interval->days . " days ";		
	}
}