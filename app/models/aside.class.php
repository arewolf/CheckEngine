<?php

/**
 * Aside
 */
class Aside extends Model {


	public static function get_mpw($user){

		$sql_mpw ="SELECT mpw
				   FROM user 
				   WHERE user_id = '{$user->user_id}'";
		$results_mpw = db::execute($sql_mpw);
		$row_mpw = $results_mpw->fetch_assoc();
		$mpw = $row_mpw['mpw'];
		return $mpw;
	

	}


	/**
	*get_car_id by current_car
	*/

	public static function get_car_id() {

		$sql= "SELECT car_id FROM car WHERE name= '{$_SESSION['current_car']}';";
		$results = db::execute($sql);
		$row=$results->fetch_assoc();
		return $car_id=$row['car_id'];

	}

	/**
	*get_max_miles
	**/

	public static function get_max_miles(){
		$sql = "SELECT max(car_miles), max(cabin_mileage), max(air_mileage), max(oil_miles), max(purchase_mileage), max(rotation_mileage)
				FROM car
				NATURAL JOIN filter
				NATURAL JOIN oil
				NATURAL JOIN tire
				WHERE car_id = '{$_SESSION['car_id']}'";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		$_SESSION['max_miles']= max($row);
	}

	/**
	*Insurance Time Left
	**/

	public static function insurance_time_left(){
		$sql = "SELECT insurance_expiration_date FROM insurance WHERE user_id = '{$_SESSION['user_id']}' LIMIT 1";
		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		$db_insurance_date = $row['insurance_expiration_date'];

		$date1 = new DateTime($db_insurance_date);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date1->diff($date2);
		$_SESSION['insurance_time_left'] = $interval->days . " days ";
	
	}

	/**
	*Next Oil Change
	**/

	public static function next_oil_change(){
		$sql = "SELECT max(oil_miles) as last_oil_mileage, 
					   max(change_date) as last_change_date
			    FROM oil
			    WHERE car_id = '{$_SESSION['car_id']}';";
		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		$last_oil_date = $row['last_change_date'];
		$last_oil_mileage = $row['last_oil_mileage'];

		$date1 = new DateTime($row['last_change_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;

		$sql_mpw ="SELECT mpw
				   FROM user 
				   WHERE user_id = {$_SESSION['user_id']}";
		$results_mpw = db::execute($sql_mpw);
		$row_mpw = $results_mpw->fetch_assoc();
		$subtract_miles = $weeks * $row_mpw['mpw'];
		$_SESSION['oil_miles'] = intval(5000 - $subtract_miles);
		$_SESSION['oil_days'] = intval(($_SESSION['oil_miles']/$row_mpw['mpw'])*7);

	}
	
	public static function next_air_change(){
		$sql = "SELECT max(air_mileage) AS air_mileage, max(air_change_date) AS air_change_date 
				FROM filter
				WHERE car_id = {$_SESSION['car_id']}";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();

		$date1 = new DateTime($row['air_change_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;
	

		$sql_mpw ="SELECT mpw
				   FROM user 
				   WHERE user_id = {$_SESSION['user_id']}";
		$results_mpw = db::execute($sql_mpw);
		$row_mpw = $results_mpw->fetch_assoc();
		$subtract_miles = $weeks * $row_mpw['mpw'];
		$_SESSION['air_miles'] = intval(30000 - $subtract_miles);
		$_SESSION['air_days'] = intval(($_SESSION['air_miles']/$row_mpw['mpw'])*7);
	}

	public static function next_cabin_change(){
		$sql = "SELECT max(cabin_mileage) AS cabin_mileage, max(cabin_change_date) AS cabin_change_date 
				FROM filter
				WHERE car_id = {$_SESSION['car_id']}";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();

		$date1 = new DateTime($row['cabin_change_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;
		

		$sql_mpw ="SELECT mpw
				   FROM user 
				   WHERE user_id = {$_SESSION['user_id']}";
		$results_mpw = db::execute($sql_mpw);
		$row_mpw = $results_mpw->fetch_assoc();
		$subtract_miles = $weeks * $row_mpw['mpw'];
		$_SESSION['cabin_miles'] = intval(15000 - $subtract_miles);
		$_SESSION['cabin_days'] = intval(($_SESSION['cabin_miles']/$row_mpw['mpw'])*7);
	}

	public static function next_tire_purchase(){
		$sql="SELECT purchase_date, purchase_mileage, warranty 
			  FROM tire 
			  WHERE car_id = {$_SESSION['car_id']} 
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
		$_SESSION['interval']= $weeks;

		$sql_mpw ="SELECT mpw
				   FROM user 
				   WHERE user_id = {$_SESSION['user_id']}";
		$results_mpw = db::execute($sql_mpw);
		$row_mpw = $results_mpw->fetch_assoc();
		$subtract_miles = $weeks * $row_mpw['mpw'];
		$_SESSION['tire_change_miles'] = intval($warranty - $subtract_miles);
		$_SESSION['tire_change_days'] = intval(($_SESSION['tire_change_miles']/$row_mpw['mpw'])*7);
	}

	public static function next_tire_rotation(){
		$sql="SELECT rotation_date
			  FROM tire 
			  WHERE car_id = {$_SESSION['car_id']} 
			  ORDER BY rotation_date desc 
			  LIMIT 1";

		$results = db::execute($sql);
		$row = $results->fetch_assoc();
		$date1 = new DateTime($row['rotation_date']);
		$date2 = new DateTime(date("Y-m-d"));
		$interval = $date2->diff($date1);
		$interval = $interval->days;
		$weeks = $interval/7;

		$sql_mpw ="SELECT mpw
				   FROM user 
				   WHERE user_id = {$_SESSION['user_id']}";
		$results_mpw = db::execute($sql_mpw);
		$row_mpw = $results_mpw->fetch_assoc();
		$subtract_miles = $weeks * $row_mpw['mpw'];
		$_SESSION['rotation_miles'] = intval(5000 - $subtract_miles);
		$_SESSION['rotation_days'] = intval(($_SESSION['rotation_miles']/$row_mpw['mpw'])*7);

	}

	
}