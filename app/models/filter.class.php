<?php

/**
 * Insurance Class
 */
class Filter extends Model {

	/**
	 * Insert Insurance
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'air_change_date'=> htmlentities($input['air_change_date']),
			'air_mileage' => htmlentities($input['air_mileage']),
			'cabin_change_date' => htmlentities($input['cabin_change_date']),
			'cabin_mileage' => htmlentities($input['cabin_mileage']),
			'car_id' => htmlentities($_SESSION['car_id'])
	
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values, ['datetime_added']);

		// Insert
		$results = db::insert('filter', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;


	
	}

	public function get($user_id){
		$sql= "SELECT * FROM insurance WHERE user_id = {$_SESSION['user_id']}";

		$results = db::execute($sql);
	}


			

}