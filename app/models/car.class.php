<?php

/**
 * User
 */
class Car extends Model {

	/**
	 * Insert User
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'make'=> htmlentities($input['make']),
			'model' => htmlentities($input['model']),
			'year' => htmlentities($input['year']),
			'car_miles' => htmlentities($input['car_miles']),
			'name' => htmlentities($input['name']),
			'user_id' => htmlentities($_SESSION['user_id'])
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values, ['datetime_added']);

		// Insert
		$results = db::insert('car', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}

	/**
	 * Update User
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'make'=> $input['make'],
			'model' => $input['model'],
			'year' => $input['year'],
			'car_miles' => $input['car_miles'],
			'name' => $input['name']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		db::update('car', $sql_values, "WHERE user_id = {$this->user_id}");
		
		// Return a new instance of this user as an object
		return new Car($this->user_id);

	}

	public function get_cars($user_id){

		$sql ="
		SELECT * 
		FROM car
		WHERE user_id = {$user_id};
		";
		
		return $results = db::execute($sql);
			
	
	}

}