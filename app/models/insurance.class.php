<?php

/**
 * Insurance Class
 */
class Insurance extends Model {

	/**
	 * Insert Insurance
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'insurance_expiration_date'=> htmlentities($input['insurance_expiration_date']),
			'policy_number' => htmlentities($input['policy_number']),
			'insurer' => htmlentities($input['insurer']),
			'user_id' => htmlentities($_SESSION['user_id'])
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values, ['datetime_added']);

		// Insert
		$results = db::insert('insurance', $sql_values);
		
		// Return the Insert ID
		return $results->insert_id;

	}

	/**
	 * Update Insurance
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'insurance_expiration_date'=> htmlentities($input['insurance_expiration_date']),
			'policy_number' => htmlentities($input['policy_number']),
			'insurer' => htmlentities($input['insurer']),
			'insurance_id' => htmlentities($input['insurance_id'])
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		db::update('insurance', $sql_values, "WHERE insurance_id = {$_POST['insurance_id']}");
		
		// Return a new instance of this user as an object
		return new Insurance($this->insurance_id);

	}

	public function get($user_id){
		$sql= "SELECT * FROM insurance WHERE user_id = {$_SESSION['user_id']}";

		$results = db::execute($sql);
	}

	public function remove($insurance_id){
		$sql = "DELETE 
				FROM insurance
				WHERE insurance_id = {$insurance_id}";
		$remove = db::execute($sql);
	}

			

}