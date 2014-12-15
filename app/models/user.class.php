<?php

/**
 * User
 */
class User extends Model {

	/**
	 * Insert User
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'username'=> htmlentities($input['username']),
			'first_name' => htmlentities($input['first_name']),
			'last_name' => htmlentities($input['last_name']),
			'email' => htmlentities($input['email']),
			'password' => htmlentities(md5($input['password'])),
			'phone' => htmlentities($input['phone']),
			'mpw'=> htmlentities($input['mpw']),
			'carrier'=>htmlentities($input['carrier'])
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values, ['datetime_added']);

		// Insert
		$results = db::insert('user', $sql_values);
		
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
			
			'first_name' => htmlentities($input['first_name']),
			'last_name' => htmlentities($input['last_name']),
			'email' => htmlentities($input['email']),
			'phone' => htmlentities($input['phone']),
			'mpw'=> htmlentities($input['mpw']),
			'carrier'=>htmlentities($input['carrier']),
			'user_id'=>htmlentities($input['user_id'])
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		db::update('user', $sql_values, "WHERE user_id = {$_POST['user_id']}");
		
		// Return a new instance of this user as an object
		return new User($this->user_id);

	}

	/**
	*get-user
	*/

	public static function get_user($username, $password) {

		$sql = "SELECT * FROM user WHERE username = '{$username}' AND password = '{$password}';";
		
		if(!$results = db::execute($sql)) {
			throw new Exception('Error processing request...');
		} else {
			return $results;
			echo "got user";
		}

	}

}