<?php 
Class Validator {

	protected static $regs = [
	//customer login validation
		'first_name' => '/^[A-Za-z0-9\s\.]{1,20}+$/',
		'last_name' => '/^[A-Za-z0-9\s\.]{1,20}+$/',
		'username' => '/[a-zA-Z0-9]{6,20}/',
		'password' => '/[a-zA-Z0-9]{6,20}/',
		'email' => '/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/i',
		'user_id' => '/[0-9]{1,2}/',
		'car_id' => '/[0-9]{1,2}/',
		'phone' => '/[0-9]/',
		'mpw' => '/(^[0-9]*[1-9]+[0-9]*\.[0-9]*$)|(^[0-9]*\.[0-9]*[1-9]+[0-9]*$)|(^[0-9]*[1-9]+[0-9]*$)/',
		'carrier' => '/[A-Za-z]/',
		'user_id' => '/\s*/'


	];

	public static function validate($fields) {
		// print_r($fields);
		// die();
		$valid = [];
		$errors = [];

		foreach ($fields as $key => $value) {
			if (preg_match(self::$regs[$key], $value)) {
				$valid[$key] = $value;
			} else {
				$errors['ERROR'] = $key . ' ' . $value;
				$errors[$key] = $value; 
			}
		}

		if (empty($errors)) {
			return $valid;
		} else {
			return $errors;
		}
	}
	

} 
?>