<?php

/**
 * Oil Class
 */
class Oil extends Model {

	/**
	 * Insert
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'change_date'=> htmlentities($input['change_date']),
			'oil_miles' => htmlentities($input['oil_miles']),
			'car_id' => htmlentities($_SESSION['car_id'])
	
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values, ['datetime_added']);

		// Insert
		$results = db::insert('oil', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;


	
	}

	public function get($user_id){
		$sql= "SELECT * FROM oil WHERE car_id = {$_SESSION['car_id']}";

		$results = db::execute($sql);
	}


			

}