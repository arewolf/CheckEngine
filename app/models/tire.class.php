<?php

/**
 * Tire
 */
class Tire extends Model {

	/**
	 * Insert User
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'warranty'=> htmlentities($input['warranty']),
			'rotation_date' => htmlentities($input['rotation_date']),
			'rotation_mileage' => htmlentities($input['rotation_mileage']),
			'purchase_date' => htmlentities($input['purchase_date']),
			'purchase_mileage' => htmlentities($input['purchase_mileage']),
			'car_id' => htmlentities($_SESSION['car_id'])
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values, ['datetime_added']);

		// Insert
		$results = db::insert('tire', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}

	protected function update($input){
		$sql_values = [
		//this allows for us to control what $_POST items get set to sql statements.
			'warranty'=> htmlentities($input['warranty']),
			'rotation_date' => htmlentities($input['rotation_date']),
			'rotation_mileage' => htmlentities($input['rotation_mileage']),
			'purchase_date' => htmlentities($input['purchase_date']),
			'purchase_mileage' => htmlentities($input['purchase_mileage']),
			'car_id' => htmlentities($_SESSION['car_id'])

		];

	// Ensure values are encompassed with quote marks
	$sql_values = db::auto_quote($sql_values);

	// update
	db::update('tire', $sql_values, "WHERE tire_id = {$this->tire_id}");
	
	
	}

	public function remove($tire_id){
		$sql = "DELETE 
				FROM tire
				WHERE tire_id = {$tire_id}";
		$remove = db::execute($sql);
	}
}